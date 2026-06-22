<?php

declare(strict_types=1);

namespace Core\Database;

use PDO;
use PDOStatement;

// I think for now I can just stick with ->query
// But in the future I need to implement Model superclass
// Laravel uses magic methods, e.g. __callStatic, under the hood
// But I'd want to keep things simple and not to overcomplicate the code too much

class Database
{
    private PDO $pdo;
    private PDOStatement $statement;

    /**
     * @param  array<string, string>  $config
     */
    public function __construct(array $config)
    {
        $this->pdo = new PDO(
            self::buildDsn($config),
            $config['user'],
            $config['password'],
            self::pdoOptions(),
        );
    }

    /**
     * @param  array<int|string, mixed>  $params
     */
    public function query(string $query, array $params = []): self
    {
        $this->statement = $this->pdo->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    /**
     * @return array<string, mixed>|false
     */
    public function find(): array|false
    {
        return $this->statement->fetch();
    }

    /**
     * @return list<array<string, mixed>>
     */
    public function all(): array
    {
        return $this->statement->fetchAll();
    }

    /**
     * @return array<string, mixed>
     */
    public function findOrFail(): array
    {
        $result = $this->find();

        if ($result === false) {
            abort();
        }

        return $result;
    }

    /**
     * @param  array{
     *     host: string,
     *     port: string,
     *     name: string,
     *     charset: string
     * }  $config
     */
    private static function buildDsn(array $config): string
    {
        return sprintf(
            'mysql:host=%s;port=%s;dbname=%s;charset=%s',
            $config['host'],
            $config['port'],
            $config['name'],
            $config['charset'],
        );
    }

    /**
     * @return array<int, mixed>
     */
    private static function pdoOptions(): array
    {
        return [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
    }
}
