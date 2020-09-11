<?php

namespace SRC\Infrastructure\InputHandler;

use PlugRoute\Http\Request;
use SRC\Application\Controller\CalculateCallCost;
use SRC\Infrastructure\Database\Connection;

class Plan
{
    public function findAll(Request $request)
    {
        $controller = new CalculateCallCost(new Connection());
        $controller->calculate(
            $request->input('from'),
            $request->input('to'),
            $request->input('plan'),
            $request->input('duration')
        );
    }
}