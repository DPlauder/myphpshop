<?php

namespace Dp\Webshop\Shop;

use Dp\Webshop\Shop\Database;
use Exception;

class CartHandler{
    protected $db;

    public function __construct(Database $db){
        $this->db = $db;
    }

    public function pushToCart(string $user_uuid, string $articlenum, int $anzahl ){
        $sql = 'INSERT INTO cart user_uuid, articlenum, anzahl VALUES :user_uuid, :articlenum, :anzahl';
        return $this->db->sql_execute($sql,[
            'user_uuid'     => $user_uuid,
            'articlenum'    => $articlenum,
            'anzahl'        => $anzahl
        ]);
    }
    public function fetch(string $user_uuid, string $articlenum): array|bool{
        $sql = 'SELECT * FROM cart WHERE user_uuid = :user_uuid AND articlenum = :articlenum';
        try{
            return $this->db->sql_execute($sql,['user_uuid' => $user_uuid, 'articlenum' => $articlenum])->fetch();
        }
        catch(Exception $e){
            $in_cart = false;
        }
        return $in_cart;
    }
    public function fetchByUuid(string $user_uuid): array{
        $sql = 'SELECT * FROM cart WHERE user_uuid = :user_uuid';
        return $this->db->sql_execute($sql,['user_uuid' => $user_uuid])->fetchAll();
    }
}
