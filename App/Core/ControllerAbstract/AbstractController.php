<?php

namespace Core\ControllerAbstract;

use Core\View;
use Service\UsersService;

abstract class AbstractController
{
    protected $view;

    protected $usersService;

    public function __construct($template){
        $this->view = new View($template);
        $this->usersService = new UsersService();

    }

    abstract function index();


}