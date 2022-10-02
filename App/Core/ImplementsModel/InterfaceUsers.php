<?php

namespace Core\ImplementsModel;

interface InterfaceUsers
{
    /**
     * @param $login
     * @return mixed
     */
    public function getUser($login);

}