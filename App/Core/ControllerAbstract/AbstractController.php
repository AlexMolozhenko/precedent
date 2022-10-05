<?php

namespace Core\ControllerAbstract;

use Core\View;
use Service\PrecedentService;
use Service\UsersService;

abstract class AbstractController
{
    protected $view;

    protected $usersService;

    protected $precedentService;

    public function __construct($template){
        $this->view = new View($template);
        $this->usersService = new UsersService();
        $this->precedentService = new PrecedentService();

    }

    abstract function index();


}