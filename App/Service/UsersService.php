<?php

namespace Service;

use Core\ServiceAbstract\AbstractService;

class UsersService extends AbstractService
{


    protected function verifyPassword($pass,$hash){

        $passVerify = password_verify($pass,$hash);
        return $passVerify;

    }

    public function login($login,$password){

        $userPassHash = $this->usersModel->getPassword($login);

        if($this->verifyPassword($password,$userPassHash['password'])){
            $user = $this->usersModel->getUser($login);
            session_start();
            $_SESSION['id']=$user['id'];
            $_SESSION['login']=$user['login'];
            $_SESSION['role']=$user['role'];

            return true;
        }else{
            return false;
        }

    }

}