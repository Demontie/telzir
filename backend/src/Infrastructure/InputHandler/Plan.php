<?php

namespace SRC\Infrastructure\InputHandler;

use SRC\Application\Controller\PlanFindAll;
use SRC\Infrastructure\Database\Connection;

class Plan
{
    public function findAll()
    {
        $controller = new PlanFindAll();
        $controller->findAll(new Connection());
    }
}