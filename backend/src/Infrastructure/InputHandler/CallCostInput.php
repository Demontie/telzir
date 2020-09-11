<?php

namespace SRC\Infrastructure\InputHandler;

use PlugRoute\Http\Request;
use SRC\Application\Controller\CalculateCallCost;
use SRC\Infrastructure\Database\Connection;

class CallCostInput
{
    public function calculate(Request $request)
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