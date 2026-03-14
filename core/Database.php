<?php

namespace Core;

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

    public function __construct($config)
    {
        $this->pdo = new PDO(
            self::buildDsn($config),
            $config['user'],
            $config['password'],
            self::pdoOptions(),
        );
    }

    public function query($query, $params = [])
    {
        $this->statement = $this->pdo->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function all()
    {
        return $this->statement->fetchAll();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if ($result === false) {
            abort();
        }

        return $result;
    }

    private static function buildDsn($config)
    {
        return sprintf(
            'mysql:host=%s;port=%s;dbname=%s;charset=%s',
            $config['host'],
            $config['port'],
            $config['name'],
            $config['charset'],
        );
    }

    private static function pdoOptions()
    {
        return [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
    }
}
