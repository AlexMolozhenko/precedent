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
    }

    public function  mainPage(){
                session_start();
        if(empty($_SESSION['login'])){
            $this->view->includePage('login');
        }else{
            $precedentDoc = $this->precedentService->getListPrecedentDocument();

            $actionPage = $_POST['action'];
            $last_key = $_POST['last_key'];
            $first_key = $_POST['first_key'];
            $numberLastElement = $last_key + 1;
            $array_length = 25;

            $pagesQuantity = $this->precedentService->pagesQuantity($precedentDoc,$array_length);

            $slicePrecedentDoc = $this->precedentService->pageListDocument($actionPage,$first_key,$last_key,$array_length,$precedentDoc);

            $numberPage = $this->precedentService->numberPage($slicePrecedentDoc,$array_length);

            $this->view->includePage('precedentList',['precedentDoc'=>$slicePrecedentDoc,
                'pagesQuantity'=>$pagesQuantity,
                'numberPage'=>$numberPage,
                ]);
        }
    }

    public function editDocument(){

        $a_id = filter_input(INPUT_POST,'a_id');
        $document = $this->precedentService->getDocumentByID($a_id);
        $allDecision = $this->precedentService->getAllDecision_id() ;
        $allJustice = $this->precedentService->getAllJustice_id();
        $allCourts = $this->precedentService->getAllCourts_id();
        session_start();
        $role = $_SESSION['role'];
        $this->view->includePage('editDocument',['a_id'=>$a_id,
            'document'=>$document,
            'allDecision'=>$allDecision,
            'allJustice'=>$allJustice,
            'allCourts'=>$allCourts,
            'role'=>$role,
            ]);
    }

    public function getDecision(){
        $a_id = filter_input(INPUT_POST,'a_id');

        $docText = $this->precedentService->getDecision($a_id);
        die(json_encode(array(
            'docText' => $docText,
        )));
    }

    public function updateDocument(){
        $a_id= $_POST['a_id'];
        $num_decision= $_POST['num_decision'];
        $num_litigation= $_POST['num_litigation'];
        $decision_id= $_POST['decision_id'];
        $justice_id= $_POST['justice_id'];
        $court_id= $_POST['court_id'];
        $checkmark_id= $_POST['checkmark_id'];
        $comments= $_POST['comments'];
        $name_of_record= $_POST['name_of_record'];
        $doc_header= $_POST['doc_header'];
        $p_year= $_POST['p_year'];
        $p_month= $_POST['p_month'];
        $p_day= $_POST['p_day'];
        $url_doc= $_POST['url_doc'];
        $decision= $_POST['decision'];

        $result = $this->precedentService->updateDocument($a_id,$num_decision,$url_doc,$decision_id,$justice_id,$court_id,$checkmark_id,$comments,$num_litigation,$name_of_record,$doc_header,$p_year,$p_month,$p_day,$decision);
       exit(json_encode(array(
          'result' => $result,
       )));

    }

    public function deleteDocument(){
        $a_id = $_POST['a_id'];
        $num_litigation= $_POST['num_litigation'];
        $result = $this->precedentService->deleteDocument($a_id,$num_litigation);
        exit(json_encode(array(
            'result' => $result,
        )));
    }


}