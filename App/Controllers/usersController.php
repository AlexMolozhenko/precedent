<?php

namespace Controllers;

use Core\ControllerAbstract\AbstractController;

class usersController extends AbstractController
{
    public function __construct()
    {
        parent::__construct('main');
    }

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function login(){

        $login = filter_input(INPUT_POST,'login');
        $password = filter_input(INPUT_POST,'password');

      echo  $this->usersService->login($login,$password)?'true' : 'false';

    }

    public function logout(){
        echo  $this->usersService->logout()?'true':'false';
    }
}