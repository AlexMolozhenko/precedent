<?php

namespace Service;

use Core\ServiceAbstract\AbstractService;

class PrecedentService extends AbstractService
{
    public function getListPrecedentDocument(){
       $listOfDocument =  $this->precedentModel->getAllDocument();

       return $listOfDocument;
    }

    public function getDocumentByID($id){
        $document = $this->precedentModel->getDocumentById($id);
        return $document;
    }

    public function getDecision($id){
        $decision = $this->precedentModel->getDecision($id);
        return $decision['decision'];
    }
    public function getAllDecision_id(){
        $allDecision = $this->precedentModel->getAllDecision_id();
        return $allDecision;
    }
    public function getAllJustice_id(){
        $allJustice = $this->precedentModel->getAllJustice_id();
        return $allJustice;
    }
    public function getAllCourts_id(){
        $allCourts = $this->precedentModel->getAllCourts_id();
        return $allCourts;
    }

    public function updateDocument($a_id,$num_decision,$url_doc,$decision_id,$justice_id,$court_id,$checkmark_id,$comments,$num_litigation,$name_of_record,$doc_header,$p_year,$p_month,$p_day,$decision){

      $result = $this->precedentModel->updateDocument($a_id,$num_decision,$url_doc,$decision_id,$justice_id,$court_id,$checkmark_id,$comments,$num_litigation,$name_of_record,$doc_header,$p_year,$p_month,$p_day,$decision);

        return $result;
    }
    public function deleteDocument($a_id){
        $result = $this->precedentModel->deleteDocument($a_id);
        return $result;
    }

}