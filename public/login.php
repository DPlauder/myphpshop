<?php

require dirname(__DIR__) . "/src/bootstrap.php";

use Dp\Webshop\Helper\Renderer;
use function Dp\Webshop\Helper\redirect;

$output = 'Login';
$email = '';
$errors = [];

Renderer::render(ROOT_PATH . '/public/views/login.view.php',[
    'navigation' => $navigation,
    "output" => $output
]);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');


    if(!$email){
        $errors['email'] = 'Please enter a valid address';
    }
    //TODO Validate password
    $problems = implode($errors);
    if(empty($problems)){
        $user = $shop->getUser()->login($email, $password);
        if($user and $user['role'] == 'disabled'){
            $errors['login'] = 'Your account is disabled';
        }
        elseif($user){
            $shop->getSession()->createSession($user);
            redirect('index.php', ['uuid' => $user['uuid']]);
        }
        else{
            $errors['login'] = 'Login faileds';
        }
    }
    
/* 
    Renderer::render(ROOT_PATH . '/public/views/index.view.php',[
        "navigation" => $navigation,
        "output" => $output,
        "user" => $user
    ]);
     */
}