<?php
require_once 'logique/response.php';
require_once 'logique/display.php';

session_start();

$username = null;
$password=null;

if(!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

}


if($username && $password){

    require_once("logique/requetes.php");

    $user = getUserByUsername($username);

    if(!$user){

        redirect("user/signin", [
                "message" => "Username not found",
        ]);
    }

  if(!password_verify($password, $user['password']))
  {
      redirect("user/signin", [
          "message" => "wrong password",
      ]);
  }

  //le mdp est bon
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];



    redirect("index", [
            "message" => "welcome back ".$username,
    ]);

}

render("user/signin", []);
