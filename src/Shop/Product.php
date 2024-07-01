<?php

namespace Dp\Webshop\Shop;

class Product{
    protected $db;

    public function __construct(Database $db){
        $this->db = $db;
    }

    public function fetchProducts(){
        $sql = "SELETCT * FROM products";
        echo 'hello fetch';
        return $this->db->sql_excecute($sql)->fetchAll();
    }
}