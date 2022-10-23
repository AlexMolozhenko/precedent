<?php

namespace Model;

use Core\ModelAbstract\AbstractModel;

class DecisionModel extends AbstractModel
{
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

}