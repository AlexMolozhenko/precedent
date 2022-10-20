<?php
namespace Core\ServiceAbstract;

use Model\PrecedentModel;
use Model\UsersModel;

abstract class AbstractService
{
    protected $usersModel;

    protected $precedentModel;

    /**
     * connection of all necessary classes for working with the database for further inheritance
     */
    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->precedentModel = new PrecedentModel();
    }

}