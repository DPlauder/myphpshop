<?php

namespace Dp\Webshop\Shop;

use Dp\Webshop\Shop\Database;

class Shop{
    protected Database $db;
    protected Product $product;
    protected Category $category;
    protected User $user;

    public function __construct(string $dsn, string $user, string $password){
        $this->db = new Database($dsn, $user, $password);
    }

    public function getProduct() {
        if( ! isset($this->product)) {
            $this->product = new Product($this->db);
        }
        return $this->product;
    }
    public function getCategory(){
        if (! isset($this->category)){
            $this->category = new Category($this->db);
        }
        return $this->category;
    }
    public function getUser(){
        if (! isset($this->user)){
            $this->user = new User($this->db);
        }
        return $this->user;
    }

    
}