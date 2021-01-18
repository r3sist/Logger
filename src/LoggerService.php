<?php declare(strict_types=1);

namespace resist\Logger;

use Base;
use DB\SQL;
use JsonException;
use Log;
use Psr\Log\LogLevel;
use RuntimeException;
use function in_array;

class LoggerService
{
    private const FILE = 'error.log';

    private Base $f3;
    private SQL $db;

    public function __construct(Base $f3, SQL $db)
    {
        $this->f3 = $f3;
        $this->db = $db;
    }

    public function create(string $level, string $message, array $context = [], ?string $table = null): void
    {
        $mapper = $this->getMapper($table);

        $mapper->reset();
        $mapper->level = $this->validateLevel($level);
        $mapper->message = $message;
        $mapper->context = $this->getJsonContext($context);
        $mapper->user_ip = $this->f3->get('IP');

        if (isset($context['uid'])) {
            $mapper->user_id = $context['uid'];
        }
        if ($this->f3->exists('uid')) {
            $mapper->user_id = $this->f3->get('uid');
        }

        if (isset($context['uname'])) {
            $mapper->user_name = $context['uname'];
        }

        if ($this->f3->exists('user') && $this->f3->get('user')->username !== null) {
            $mapper->user_name = $this->f3->get('user')->username;
        }

        $mapper->save();
    }

    public function getMapper(?string $table = null): LogMapper
    {
        try {
            return new LogMapper($this->db, $table);
        } catch (RuntimeException $e) {
            $errorMessage = 'Could not get log mappper, probably got invalid log table name.';
            $this->logToFile(LogLevel::CRITICAL, $errorMessage);
            throw new RuntimeException($errorMessage);
        }
    }

    public function logToFile(string $level, string $message, array $context = []): void
    {
        $logger = new Log(self::FILE);
        $logger->write(strtoupper($this->validateLevel($level)).': '.$message.' '.$this->getJsonContext($context));
    }

    private function getJsonContext(array $context): string
    {
        $context = $this->injectContext($context);

        if (empty($context)) {
            return '';
        }

        try {
            return json_encode($context, JSON_THROW_ON_ERROR|JSON_UNESCAPED_UNICODE);
        } catch (JsonException $e) {
            $this->logToFile(LogLevel::ALERT, 'Original log context lost.');
        }

        return '';
    }

    private function validateLevel(string $level): string
    {
        $levels = [LogLevel::CRITICAL, LogLevel::ALERT, LogLevel::WARNING, LogLevel::EMERGENCY, LogLevel::ERROR, LogLevel::INFO,LogLevel::NOTICE, LogLevel::DEBUG];

        if (!in_array($level, $levels, true)) {
            $level = LogLevel::ALERT;
            $this->create($level, 'Invalid log level. Save log on level '.$level);
        }

        return $level;
    }

    private function injectContext(array $context): array
    {
        if ($this->f3->exists('ALIAS')) {
            $context['ALIAS'] = $this->f3->get('ALIAS');
        }

        return $context;
    }
}
