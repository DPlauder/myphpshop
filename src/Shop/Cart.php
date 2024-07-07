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
    
    public function fetchAllByUserId(string $id): array {
        $sql = "SELECT * FROM cart WHERE user_id = :id";
        return $this->db->sql_execute($sql, ['id' => $id])->fetchAll();
    }

    public function push(array $data){
        $user_id = $data['user_id'];
        $product_id = $data['product_id'];
        $anzahl = $data['anzahl'];
        $sql = "INSERT INTO cart(user_id, product_id, anzahl) 
                VALUE (:user_id, :product_id, :anzahl)";
        $this->db->sql_execute($sql, [
            'user_id'       => $user_id,
            'product_id'    => $product_id,
            'anzahl'        => $anzahl
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