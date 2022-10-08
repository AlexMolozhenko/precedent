<?php

namespace Model;

use Core\ImplementsModel\InterfacePrecedent;
use core\ModelAbstract\AbstractModel;

class PrecedentModel extends AbstractModel implements InterfacePrecedent
{
    public function getAllDocument()
    {
//        $sql = "SELECT * FROM `t_precedent`;";
        $sql = "SELECT a_id,name_of_record,num_decision,num_litigation,url_doc FROM `t_precedent` ORDER BY a_id DESC;";
        $result = $this->db->query($sql);
        if($this->db->errno !==0 ){
            throw new \Exception($this->db->errno);
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }

}