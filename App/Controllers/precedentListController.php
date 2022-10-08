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
        $this->view->render();
//        session_start();
//        if(empty($_SESSION['login'])){
//            $this->view->render('login');
//        }else{
//            $precedentDoc = $this->precedentService->getListPrecedentDocument();
//
//            $this->view->render('precedentList',['precedentDoc'=>$precedentDoc]);
//
//        }
    }

    public function  mainPage(){
//        $this->view->testP('editDocument');

                session_start();
        if(empty($_SESSION['login'])){
            $this->view->includePage('login');
        }else{
            $precedentDoc = $this->precedentService->getListPrecedentDocument();

            $this->view->includePage('precedentList',['precedentDoc'=>$precedentDoc]);

        }



    }

    public function editDocument(){

        $a_id = filter_input(INPUT_POST,'a_id');
//        echo'get document==TODO</br>';
//        echo"$a_id";
        $this->view->includePage('editDocument',['a_id'=>$a_id]);
    }


}