<?php

namespace Dp\Webshop\Shop;

use function Dp\Webshop\Helper\guidv4;
use function Dp\Webshop\Helper\hashPassword;

class User{
    protected Database $db;

    public function __construct(Database $db){
        $this->db = $db;
    }
    
    public function fetch(string $id){
        $sql = "SELECT * FROM users WHERE (id = :id)";
        return $this->db->sql_execute($sql, ['id' => $id])->fetch();
    }
    public function fetchAll(): array {
        $sql = 'SELECT * FROM users';
        return $this->db->sql_execute($sql)->fetchAll();
    }
    public function push(array $data){
        $uuid       = guidv4();
        $firstname  = $data['firstname'];
        $lastname   = $data['lastname'];
        $email      = $data['email'];
        $password   = hashPassword($data['password']);
        $role       = $data['role'];
        $created_at = date('Y-m-d');

        $sql = "INSERT INTO users(uuid, firstname, lastname, email, password, role, created_at)
                VALUES (:uuid, :firstname, :lastname, :email, :password, :role, :created_at)";
        $this->db->sql_execute($sql,[
            'uuid'          => $uuid,
            'firstname'     => $firstname,
            'lastname'      => $lastname,
            'email'         => $email,
            'password'      => $password,
            'role'          => $role,
            'created_at'    => $created_at,
        ]);
    }
    public function update(array $data)
    {
        $uuid       = $data['uuid'];
        $firstname  = $data['firstname'];
        $lastname   = $data['lastname'];
        $role       = $data['role'];
        $sql = "UPDATAE users SET firstname = :firstname, lastname = :lastname, role = :role WHERE uuid = :uuid";
        $this->db->sql_execute($sql, [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'role' => $role,
            'uuid' => $uuid,
        ]);
    }

    public function delete(string $uuid){
        $sql = "DELETE FROM users WHERE uuid = :uuid";
        $this->db->sql_execute($sql,['uuid' => $uuid]);
    }

    public function login(string $email, string $password): false|array{
        $sql = "SELECT uuid, firstname, lastname, created_at, email, password, role
                FROM users
                WHERE email = :email;";
        $user = $this->db->sql_execute($sql, ['email' => $email])->fetch();
        if( !$user){
            return false;
        }
        if(password_verify($password, $user['password'])){
            return $user;
        }
        else{
            return false;
        }
    }
}