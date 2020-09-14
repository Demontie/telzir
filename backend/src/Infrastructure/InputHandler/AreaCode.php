<?php

namespace SRC\Infrastructure\InputHandler;

use SRC\Application\Controller\AreaCodeFindAll;
use SRC\Infrastructure\Database\Connection;

class AreaCode
{
    public function findAll()
    {
        $controller = new AreaCodeFindAll();
        $controller->findAll(new Connection());
    }
}