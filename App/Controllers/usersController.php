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

//        function consoleLog($msg) {
//            echo '<script type="text/javascript">' .
//                'console.log(' . $msg . ');</script><br/>';
//        }
//        consoleLog($login);
//        consoleLog($password);
//        consoleLog($res);



    }
    public function logout(){

        $result = $this->usersService->logout();
        echo $result;

    }
}