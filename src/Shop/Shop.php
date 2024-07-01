<?php

namespace Dp\Webshop\Shop;

use Dp\Webshop\Shop\Database;

class Shop{
    protected Database $db;
    protected Product $product;

    public function __construct(string $dsn, string $user, string $password){
        $this->db = new Database($dsn, $user, $password);
        echo 'hello shop';
    }

    public function getProduct() {
        if(!$this->product) {
            $this->product = new Product($this->db);
        }
        return $this->product;
    }

    
}