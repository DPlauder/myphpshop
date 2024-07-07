<?php

namespace Dp\Webshop\Shop;

class Category{
    protected Database $db;

    public function __construct(Database $db){
        $this->db = $db;
    }

    public function fetch(string $id){
        $sql = "SELECT * FROM categories WHERE (id = :id)";

        return $this->db->sql_execute($sql,['id' => $id]);
    }
    public function fetchAll() : array{
        $sql = "SELECT * FROM categories";
        return $this->db->sql_execute($sql)->fetchAll();
    }

    public function push(array $data){
        $name           = $data['name'];
        $description    = $data['description'];
        $sql =  "INSERT INTO categories(name, description)
                VALUES (:name, :description)";
        $this->db->sql_execute($sql,['name' => $name, 'description' => $description ]);
    }

    public function update(array $data){
        $id = $data['cat_id'];
        $name = $data['name'];
        $description = $data['description'];
        $sql = 'UPDATE categories SET (name = :name, description = :description) WHERE id = :cat_id';
        $this->db->sql_execute($sql, [
            'name'          => $name,
            'description'   => $description,
            'id'        => $id,
        ]);
    }

    public function delete(string $id){
        $sql = 'DELETE FROM categories WHERE (id = :id)';
        $this->db->sql_execute($sql, ['id' => $id]);
    }
}