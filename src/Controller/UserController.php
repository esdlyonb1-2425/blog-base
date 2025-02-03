<?php

namespace Controller;

use App\Repository\UserRepository;
use Core\Response\Response;
use Core\View\View;

class UserController
{



    public function signInAction()
    {

        $username = null;
        $password=null;

        if(!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

        }


        if($username && $password){

            $userRepository = new UserRepository();
            $user = $userRepository->findUserByUsername($username);

            if(!$user){

               $message = "User does not exist";
                Response::redirect("signIn", [
                    "message" => $message,
                ]);
            }

            if(!password_verify($password, $user['password']))
            {
                  $message = "Wrong password";
                  Response::redirect("signIn", [
                "message" => $message,
            ]);
            }

            //le mdp est bon
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];



            Response::redirect("index", [
                "message" => "welcome back ".$username,
            ]);

        }

        View::render("user/signin", []);
    }


}