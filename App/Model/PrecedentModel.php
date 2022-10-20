<?php

namespace Model;

use Core\ImplementsModel\InterfacePrecedent;
use core\ModelAbstract\AbstractModel;

class PrecedentModel extends AbstractModel implements InterfacePrecedent
{
    /**
     * get list of all document
     * @return array
     * @throws \Exception
     */
    public function getAllDocument()
    {
        $sql = "SELECT a_id,name_of_record,num_decision,num_litigation,url_doc FROM `t_precedent` ORDER BY a_id DESC;";
        $result = $this->db->query($sql);
        if($this->db->errno !==0 ){
            throw new \Exception($this->db->errno);
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * get all information about a document by a_id
     * @param $a_id
     * @return mixed
     * @throws \Exception
     */
    public function getDocumentById($a_id)
    {

        $sql = "SELECT `t_precedent`.`a_id`, `t_precedent`.`num_decision`, `t_precedent`.`url_doc`, `t_precedent`.`decision_id`,`t_decisions`.`type_of_document`as`decision_type_of_document`, `t_precedent`.`justice_id`,`t_justices`.`litigation`as`justices_litigation`, `t_precedent`.`court_id`,`t_courts`.`name_court`as`courts_name_court`, `t_precedent`.`checkmark_id`, `t_precedent`.`comment_type`, `t_precedent`.`comments`, `t_precedent`.`num_litigation`, `t_precedent`.`name_of_record`, `t_precedent`.`doc_header`, `t_precedent`.`articles`, `t_precedent`.`a_created`, `t_precedent`.`a_status`, `t_precedent`.`a_year`, `t_precedent`.`a_month`, `t_precedent`.`a_day`, `t_precedent`.`p_year`, `t_precedent`.`p_month`, `t_precedent`.`p_day`, `t_precedent`.`decision` FROM `t_precedent`,`t_decisions`,`t_justices`,`t_courts` WHERE `t_precedent`.`a_id` = '$a_id'and `t_precedent`.`decision_id`=`t_decisions`.`a_id` and `t_precedent`.`justice_id` = `t_justices`.`a_id` and `t_precedent`.`court_id` = `t_courts`.`a_id`;";
        $result = $this->db->query($sql);
        if($this->db->errno !==0 ){
            throw new \Exception($this->db->errno);
        }
        return $result->fetch_array(MYSQLI_ASSOC);

    }

    /**
     * get Decision document by $a_id
     * @param $a_id
     * @return mixed
     * @throws \Exception
     */
    public function getDecision($a_id){
        $sql ="SELECT `decision` FROM `t_precedent` WHERE `a_id` = '$a_id';";
        $result = $this->db->query($sql);
        if($this->db->errno !==0 ){
            throw new \Exception($this->db->errno);
        }
        return $result->fetch_array(MYSQLI_ASSOC);
    }

    /**
     * get a list of all kinds of Decision
     * @return mixed
     * @throws \Exception
     */
    public function getAllDecision_id(){
        $sql ="SELECT * FROM `t_decisions` ;";
        $result = $this->db->query($sql);
        if($this->db->errno !==0 ){
            throw new \Exception($this->db->errno);
        }
        return $result->fetch_all(MYSQLI_ASSOC);

    }

    /**
     * get a list of all kinds of Justice
     * @return mixed
     * @throws \Exception
     */
    public function getAllJustice_id(){
        $sql ="SELECT * FROM `t_justices` ;";
        $result = $this->db->query($sql);
        if($this->db->errno !==0 ){
            throw new \Exception($this->db->errno);
        }
        return $result->fetch_all(MYSQLI_ASSOC);

    }

    /**
     * get a list of all kinds of Courts
     * @return mixed
     * @throws \Exception
     */
    public function getAllCourts_id(){
        $sql ="SELECT * FROM `t_courts` ;";
        $result = $this->db->query($sql);
        if($this->db->errno !==0 ){
            throw new \Exception($this->db->errno);
        }
        return $result->fetch_all(MYSQLI_ASSOC);

    }

    /**
     * document update
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
        $decision = addslashes($decision);
        $doc_header = addslashes($doc_header);
        $sql ="UPDATE `t_precedent` SET num_decision ='$num_decision', url_doc = '$url_doc',decision_id='$decision_id',justice_id='$justice_id',court_id='$court_id',checkmark_id='$checkmark_id',comments='$comments',num_litigation='$num_litigation',name_of_record='$name_of_record',doc_header='$doc_header',p_year='$p_year',p_month='$p_month',p_day='$p_day',decision='$decision' WHERE a_id = '$a_id';";


        $result = $this->db->query($sql);
        if($this->db->errno !==0 ) {
            throw new \Exception($this->db->errno);
        }

        return $result;

    }

    /**
     * delete document by id
     * @param $a_id
     * @return bool|\mysqli_result
     * @throws \Exception
     */
    public function deleteDocument($a_id){
       $sql="DELETE FROM `t_precedent` WHERE `a_id` ='$a_id';";
        $result = $this->db->query($sql);
        if($this->db->errno !==0 ) {
            throw new \Exception($this->db->errno);
        }

        return  $result;
    }

    /**
     * save history of changes
     * @param $num_litigation
     * @param $user_id
     * @param $action
     * @throws \Exception
     */
    public function history_of_changes($num_litigation,$user_id,$action){
        $sql="INSERT INTO `history_of_changes` (num_litigation,user_id,action) VALUES ('$num_litigation','$user_id','$action');";
        $this->db->query($sql);
        if($this->db->errno !==0 ) {
            throw new \Exception($this->db->errno);
        }
    }

}