<?php

namespace Dp\Webshop\Shop;

class Cart{
    protected Database $db;

    public function __construct(Database $db){
        $this->db = $db;
    }
    public function push(array $data){
        $user_id = $data['user_id'];
        $product_id = $data['product_id'];
        $anzahl = $data['anzahl'];
        $sql = "INSERT INTO cart(user_id, product_id, anzahl) 
                VALUE (:user_id, :product_id, :anzahl)";
                
    }
}