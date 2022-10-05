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
        session_start();
        if(empty($_SESSION['login'])){
            $this->view->render('login');
        }else{
            $precedentDoc = $this->precedentService->getListPrecedentDocument();

            $this->view->render('precedentList',['precedentDoc'=>$precedentDoc]);

        }


    }


}