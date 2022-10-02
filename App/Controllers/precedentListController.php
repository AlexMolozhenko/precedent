<?php

namespace Controllers;

use Core\ControllerAbstract\AbstractController;

class precedentListController extends AbstractController
{
    public function __construct()
    {
        parent::__construct('main');
    }

    public function index()
    {
        if(empty($_SESSION['login'])){
            $this->view->render('login');
        }else{
            $this->view->render('precedentList');
        }

    }


}