<?php
namespace Core\ServiceAbstract;

use Model\UsersModel;

abstract class AbstractService
{
    protected $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
    }

}