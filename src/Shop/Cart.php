<?php

namespace Dp\Webshop\Shop;

class Cart{
    protected Database $db;

    public function __construct(Database $db){
        $this->db = $db;
    }

    public function fetch(string $id): array{
        $sql = "SELCT * FROM cart WHERE ID = :id";
        return $this->db->sql_execute($sql, ['id' => $id])->fetch();
    }
    public function fetchCartItem(string $user_uuid, string $articlenum):array|false{
        $sql = "SELECT * FROM cart WHERE user_uuid = :user_uuid AND articlenum = :articlenum";
        return $this->db->sql_execute($sql, ['user_uuid' => $user_uuid, 'articlenum' => $articlenum])->fetch();
    }
    
    public function fetchAllByUserId(string $uuid): array {
        $sql = "SELECT * FROM cart WHERE user_uuid = :user_uuid";
        return $this->db->sql_execute($sql, ['user_uuid' => $uuid])->fetchAll();
    }

    public function push(string $user_uuid, string $articlenum, int $anzahl = 1){
        var_dump($user_uuid);
        $sql = 'INSERT INTO cart (user_uuid, articlenum, anzahl) 
                VALUES (:user_uuid, :articlenum, :anzahl)';
        return $this->db->sql_execute($sql,[
            'user_uuid'     => $user_uuid,
            'articlenum'    => $articlenum,
            'anzahl'        => $anzahl
        ]);
    }
    public function update(array $data){
        var_dump($data);
        $sql = "UPDATE cart SET user_uuid = :user_uuid, articlenum = :articlenum, anzahl = :anzahl 
                WHERE user_uuid = :user_uuid_where AND articlenum = :articlenum_where";
        $this->db->sql_execute($sql, [
            'user_uuid' => $data['user_uuid'],
            'articlenum' => $data['articlenum'],
            'anzahl' => $data['anzahl'],
            'user_uuid_where' => $data['user_uuid'],
            'articlenum_where' => $data['articlenum']
        ]);
    }

    public function delete(string $id){
        $sql = 'DELETE FROM cart WHERE ID = :id';
        $this->db->sql_execute($sql, ['id' => $id]);
    }

    public function deleteAllbyUserId(string $user_id){
        $sql = "DELETE FROM cart WHERE user_id = :user_id";
        $this->db->sql_execute($sql, ['user_id' => $user_id]);
    }
}