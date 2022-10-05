<?php
namespace Core\ServiceAbstract;

use Model\PrecedentModel;
use Model\UsersModel;

abstract class AbstractService
{
    protected $usersModel;

    protected $precedentModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->precedentModel = new PrecedentModel();
    }

}