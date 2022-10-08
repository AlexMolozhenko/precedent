<?php

namespace Service;

use Core\ServiceAbstract\AbstractService;

class PrecedentService extends AbstractService
{
    public function getListPrecedentDocument(){
       $precedentDoc =  $this->precedentModel->getAllDocument();
//       krsort($precedentDoc['a_id']);

       return $precedentDoc;
    }

}