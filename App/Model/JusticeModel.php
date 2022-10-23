<?php

namespace Model;

use Core\ModelAbstract\AbstractModel;

class JusticeModel extends AbstractModel
{
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

}