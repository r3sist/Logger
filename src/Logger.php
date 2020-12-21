<?php declare(strict_types=1);

namespace resist\Logger;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use function in_array;

class Logger implements LoggerInterface
{
    private LoggerService $service;

    private const CRITICAL_LEVELS = [LogLevel::CRITICAL, LogLevel::EMERGENCY];

    public function __construct(LoggerService $service)
    {
        $this->service = $service;
    }

    public function log($level, $message, array $context = []): void
    {
        if (in_array($level, self::CRITICAL_LEVELS, true)) {
            $this->service->logToFile($level, $message, $context);
        }

        $this->service->create($level, $message, $context);
    }

    public function critical($message, array $context = [], ?string $table = null): void
    {
        $this->log(LogLevel::CRITICAL, $message, $context);
    }

    public function alert($message, array $context = [], ?string $table = null): void
    {
        $this->log(LogLevel::ALERT, $message, $context);
    }

    public function warning($message, array $context = [], ?string $table = null): void
    {
        $this->log(LogLevel::WARNING, $message, $context);
    }

    public function emergency($message, array $context = [], ?string $table = null): void
    {
        $this->log(LogLevel::EMERGENCY, $message, $context);
    }

    public function error($message, array $context = [], ?string $table = null): void
    {
        $this->log(LogLevel::ERROR, $message, $context);
    }

    public function info($message, array $context = [], ?string $table = null): void
    {
        $this->log(LogLevel::INFO, $message, $context);
    }

    public function notice($message, array $context = [], ?string $table = null): void
    {
        $this->log(LogLevel::NOTICE, $message, $context);
    }

    public function debug($message, array $context = [], ?string $table = null): void
    {
        $this->log(LogLevel::DEBUG, $message, $context);
    }
}
