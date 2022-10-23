<?php
namespace Core\ServiceAbstract;

use Model\CourtsModel;
use Model\DecisionModel;
use Model\HistoryOfChangeModel;
use Model\JusticeModel;
use Model\PrecedentModel;
use Model\UsersModel;

abstract class AbstractService
{
    protected $usersModel;

    protected $precedentModel;

    protected $decisionModel;

    protected $justiceModel;

    protected $courtsModel;

    protected $historyOfChangeModel;

    /**
     * connection of all necessary classes for working with the database for further inheritance
     */
    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->precedentModel = new PrecedentModel();
        $this->decisionModel = new DecisionModel();
        $this->justiceModel = new JusticeModel();
        $this->courtsModel = new CourtsModel();
        $this->historyOfChangeModel = new HistoryOfChangeModel();
    }

}