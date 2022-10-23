<?php

namespace Model;

use Core\ModelAbstract\AbstractModel;

class CourtsModel extends AbstractModel
{
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

}