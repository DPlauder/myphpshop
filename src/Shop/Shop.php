<?php

namespace Dp\Webshop\Shop;

use Dp\Webshop\Shop\Database;

class Shop{
    protected Database $db;
    protected Product $product;
    protected Category $category;
    protected User $user;
    protected Session $session;
    protected Cart $cart;

    public function __construct(string $dsn, string $user, string $password){
        $this->db = new Database($dsn, $user, $password);
    }

    public function getProduct(): Product{
        if( ! isset($this->product)) {
            $this->product = new Product($this->db);
        }
        return $this->product;
    }
    public function getCategory(): Category{
        if(! isset($this->category)){
            $this->category = new Category($this->db);
        }
        return $this->category;
    }
    public function getUser(): User{
        if(! isset($this->user)){
            $this->user = new User($this->db);
        }
        return $this->user;
    }
    public function getSession(): Session{
        if(! isset($this->session)){
            $this->session = new Session();
        }
        return $this->session;
    }
    public function getCart(): Cart{
        if(! isset($this->cart)){
            $this->cart = new Cart($this->db);
        }
        return $this->cart;
    }

    
}