<?php declare(strict_types=1);

namespace resist\Logger;

use DB\SQL;
use DB\SQL\Mapper;
use RuntimeException;

/**
 * @property int $id
 * @property string $level
 * @property string $message
 * @property string $context
 * @property string $user_ip
 * @property int $user_id
 * @property string $user_name
 * @property string $created_at
 */
class LogMapper extends Mapper
{
    private const TABLE = 'log';

    public function __construct(SQL $db, ?string $table = null)
    {
        parent::__construct($db, $this->validateTable($table));
    }

    public function eraseLogTable(): void
    {
        $query = 'DELETE FROM '.self::TABLE.' WHERE 1';
        $this->db->exec($query);
    }

    private function validateTable(?string $table = null): string
    {
        if ($table !== null && !preg_match('/^\w+$/D', $table)) {
            throw new RuntimeException('Invalid log table name: '.$table);
        }

        if ($table === null) {
            $table = self::TABLE;
        }

        return $table;
    }
}
