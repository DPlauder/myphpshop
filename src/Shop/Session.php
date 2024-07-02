<?php

namespace Dp\Webshop\Shop;

class Session{
    public int $id;
    public string $forename;
    public string $role;

    public function __construct(){
        session_start();
        $this->id       = $_SESSION['id'] ?? 0;
        $this->forename = $_SESSION['forename'] ?? 0;
        $this->role     = $_SESSION['role'] ?? 'guest';
    }

    public function createSession(array $user) : void{
        session_regenerate_id(true);
        $_SESSION['id']         = $user['id'];
        $_SESSION['forename']   = $user['forename'];
        $_SESSION['role']       = $user['role'];
    }
}

//TODO Session createn und update func