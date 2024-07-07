<?php

namespace Dp\Webshop\Shop;
use PDO;
use PDOStatement;

class Database extends PDO{
    public function __construct(string $dsn, string $username, string $password, array $options = []){
        $default = [
            PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION
        ];
        parent::__construct($dsn, $username, $password, array_replace($default, $options ));
    }

    public function sql_execute($sql, $bindings = []): PDOStatement{
        if(!$bindings) {
            return self::query($sql);
        }
        $stmt = self::prepare($sql);
        $stmt->execute($bindings);
        return $stmt;
    }

}
