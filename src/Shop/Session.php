<?php

namespace Dp\Webshop\Shop;

class Session{
    public string $id;
    public string $firstname;
    public string $role;
    public array $cart;

    public function __construct(){
        session_start();
        $this->id           = $_SESSION['id'] ?? 0;
        $this->firstname    = $_SESSION['firstname'] ?? 0;
        $this->role         = $_SESSION['role'] ?? 'guest';
        $this->cart         = $_SESSION['cart'] ?? [];
    }

    public function createSession(array $user) : void{
        session_regenerate_id(true);
        $_SESSION['id']         = $user['uuid'];
        $_SESSION['firstname']  = $user['firstname'];
        $_SESSION['role']       = $user['role'];
        $_SESSION['cart']       = [];

    }

    public function updateSession(array $user) : void {
        $this->createSession($user);
    }
    public function destroySession() : void {
        $_SESSION = [];
        $cookie_data = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $cookie_data['path'], $cookie_data['domain'], $cookie_data['secure'], $cookie_data['httponly']);
        session_destroy();
    }
}
