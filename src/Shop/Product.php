<?php

namespace Dp\Webshop\Shop;

use function Dp\Webshop\Helper\guidv4;

class Product{
    protected $db;

    public function __construct(Database $db){
        $this->db = $db;
    }
    //TODO add JOINTS
    public function fetchAll(){
        $sql = "SELECT * FROM products";
        return $this->db->sql_execute($sql)->fetchAll();
    }

    public function fetchProductByArticlenum(string $article_num){
        $sql = "SELECT * FROM products WHERE 'articlenum = :article_num";
        return $this->db->sql_execute($sql, ['article_num' => $article_num])->fetch();
    }
    
    public function fetchProductsByUser(string $id): array{
        $sql = "SELECT * FROM products WHERE creator = :id";
        return $this->db->sql_execute($sql, ['id' => $id])->fetchAll();
    }


    public function push(array $data) {
        $articlenum     = guidv4();
        $title          = $data['title'];
        $description    = $data['description'];
        $price          = $data['price'];
        $category       = $data['category'];
        $creator        = $data['creator'];

        $sql = "INSERT INTO products (articlenum, title, description, price, category, creator)
                VALUES (:articlenum, :title, :description, :price, :category, :creator)";
        $this->db->sql_execute($sql,[
            'articlenum'    => $articlenum,
            'title'         => $title,
            'description'   => $description ,
            'price'         => $price,
            'category'      => $category,
            'creator'       => $creator
        ]);
        return true;
    }
    public function update(array $data){
        $articlenum     = $data['$articlenum'];
        $title          = $data['title'];
        $description    = $data['description'];
        $price          = $data['price'];
        $category       = $data['category'];
        $creator        = $data['creator'];

        $sql = "UPDATE products SET (title = :title, description = :description, price = :price, category = :category, creator = :creator) WHERE articlenum = :articlenum";
        $this->db->sql_execute($sql, [
            'title'         => $title,
            'description'   => $description,
            'price'         => $price,
            'category'      => $category,
            'creator'       => $creator,
            'articlenum'    => $articlenum,
        ]);
    }

    public function delete(string $article_num){
        $sql = "DELETE FROM products WHERE articlenum = :article_num";
        $this->db->sql_execute($sql,["articlenum" => $article_num]);
    }
}