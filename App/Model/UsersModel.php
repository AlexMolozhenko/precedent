<?php

namespace Model;

use Core\ImplementsModel\InterfaceUsers;

use Core\ModelAbstract\AbstractModel;


class UsersModel extends AbstractModel implements InterfaceUsers
{
    /**
     * get user password for verify
     * @param $login
     * @return mixed
     * @throws \Exception
     */
    public function getPassword($login){
        $sql="SELECT password FROM `users` WHERE login = '$login';";
        $result = $this->db->query($sql);
        if($this->db->errno !==0 ){
            throw new \Exception($this->db->errno);
        }
        return $result->fetch_array(MYSQLI_ASSOC);

    }
    /**
     * get user
     * @param $login
     * @return mixed
     * @throws \Exception
     */
    public function getUser($login)
    {
        $sql="SELECT id, login ,role FROM `users` WHERE login = '$login';";
        $result = $this->db->query($sql);
        if($this->db->errno !==0 ){
            throw new \Exception($this->db->errno);
        }
        return $result->fetch_array(MYSQLI_ASSOC);
    }

}