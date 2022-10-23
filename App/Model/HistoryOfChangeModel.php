<?php

namespace Model;

use Core\ModelAbstract\AbstractModel;

class HistoryOfChangeModel extends AbstractModel
{
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