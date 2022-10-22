<?php

namespace Service;

use Core\ServiceAbstract\AbstractService;

class PrecedentService extends AbstractService
{
    /**
     * getting an array of all documents
     * @return array
     * @throws \Exception
     */
    public function getListPrecedentDocument(){
       $listOfDocument =  $this->precedentModel->getAllDocument();

       return $listOfDocument;
    }

    /**
     * get number of pages of documents
     * @param $precedentDoc
     * @param $array_length
     * @return false|float
     */
    public function pagesQuantity($precedentDoc,$array_length){
        $pagesQuantity = ceil (count($precedentDoc)/$array_length) ;
        return $pagesQuantity;
    }

    /**
     * get specific page number
     * @param $slicePrecedentDoc
     * @param $array_length
     * @return false|float
     */
    public function numberPage($slicePrecedentDoc,$array_length){

        $numslice = array_key_last($slicePrecedentDoc)+1;
        $numberPage =  ceil($numslice/$array_length);

        return $numberPage;
    }

    /**
     * the method returns a sorted array with documents for a specific page number
     * @param $actionPage
     * @param $first_key
     * @param $last_key
     * @param $array_length
     * @param $precedentDoc
     * @return array
     */
    public function pageListDocument($actionPage,$first_key,$last_key,$array_length,$precedentDoc){

        if($actionPage === 'last'){
            $num_key = $first_key - $array_length;
            $offSet= $num_key < $array_length ? 0: $num_key;
            $slicePrecedentDoc =  array_slice($precedentDoc,$offSet,$array_length,true) ;
            return $slicePrecedentDoc;
        }elseif($last_key >= array_key_last($precedentDoc)){
            $offSet = empty($last_key) ? 0 : $first_key;
            $slicePrecedentDoc =  array_slice($precedentDoc,$offSet,$array_length,true) ;
            return $slicePrecedentDoc;
        }elseif($actionPage === 'next'){
            $offSet = empty($last_key) ? 0 : ++$last_key;
            $slicePrecedentDoc =  array_slice($precedentDoc,$offSet,$array_length,true) ;
            return $slicePrecedentDoc;
        }else{
            $offSet=0;
            $slicePrecedentDoc =  array_slice($precedentDoc,$offSet,$array_length,true) ;
            return $slicePrecedentDoc;
        }

    }


    /**
     *the method iterates over the array, checking if the values match; if a match is found, then an array of a certain size with these values is returned
     * @param $precedentDoc
     * @param $search_document
     * @return array|void
     */
    public function searchDocument($precedentDoc,$search_document){
        $item_search=[];
        foreach($precedentDoc as $key=>$document){
            if($document['num_decision']== $search_document || $document['num_litigation'] == $search_document  ){
                $item_search['a_id']= $document['a_id'];
                $item_search['key']= $key;
            }
        }
        $array_length = 25;
        for($i=0,$offSet = 0;$i <= count($precedentDoc);$i++,$offSet +=25){

            $slicePrecedentDoc = array_slice($precedentDoc,$offSet,$array_length,true) ;
            if(array_key_exists($item_search['key'], $slicePrecedentDoc)) {
                $item_search['slicePrecedentDoc']=$slicePrecedentDoc;
                return $item_search;
            }

        }
    }

    /**
     * the method gets the document by id
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function getDocumentByID($id){
        $document = $this->precedentModel->getDocumentById($id);
        return $document;
    }

    /**
     * the method gets the Decision by id
     * @param $id
     * @return mixed
     * @throws \Exception
     */
    public function getDecision($id){
        $decision = $this->precedentModel->getDecision($id);
        return $decision['decision'];
    }

    /**
     * method gets all Decision types
     * @return mixed
     * @throws \Exception
     */
    public function getAllDecision_id(){
        $allDecision = $this->precedentModel->getAllDecision_id();
        return $allDecision;
    }

    /**
     * method gets all Justice types
     * @return mixed
     * @throws \Exception
     */
    public function getAllJustice_id(){
        $allJustice = $this->precedentModel->getAllJustice_id();
        return $allJustice;
    }

    /**
     * method gets all Courts types
     * @return mixed
     * @throws \Exception
     */
    public function getAllCourts_id(){
        $allCourts = $this->precedentModel->getAllCourts_id();
        return $allCourts;
    }

    /**
     * the method sends data to the database to be updated and data to record the update history in the database
     * @param $a_id
     * @param $num_decision
     * @param $url_doc
     * @param $decision_id
     * @param $justice_id
     * @param $court_id
     * @param $checkmark_id
     * @param $comments
     * @param $num_litigation
     * @param $name_of_record
     * @param $doc_header
     * @param $p_year
     * @param $p_month
     * @param $p_day
     * @param $decision
     * @return bool|\mysqli_result
     * @throws \Exception
     */
    public function updateDocument($a_id,$num_decision,$url_doc,$decision_id,$justice_id,$court_id,$checkmark_id,$comments,$num_litigation,$name_of_record,$doc_header,$p_year,$p_month,$p_day,$decision){

      $result = $this->precedentModel->updateDocument($a_id,$num_decision,$url_doc,$decision_id,$justice_id,$court_id,$checkmark_id,$comments,$num_litigation,$name_of_record,$doc_header,$p_year,$p_month,$p_day,$decision);
      session_start();
      $user_id = $_SESSION['id'];
      $this->precedentModel->history_of_changes($num_litigation,$user_id,'update');

        return $result;
    }

    /**
     * the method sends a request to delete the document from the database and save information about the change
     * @param $a_id
     * @param $num_litigation
     * @return bool|\mysqli_result
     * @throws \Exception
     */
    public function deleteDocument($a_id,$num_litigation){
        $result = $this->precedentModel->deleteDocument($a_id);
        session_start();
        $user_id = $_SESSION['id'];
        $this->precedentModel->history_of_changes($num_litigation,$user_id,'delete');
        return $result;
    }

}