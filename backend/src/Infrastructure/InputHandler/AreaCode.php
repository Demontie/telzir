<?php

namespace SRC\Infrastructure\InputHandler;

use SRC\Infrastructure\Database\Connection;

class AreaCode
{
    public function findAll()
    {
        $controller = new Are(new Connection());
        $controller->calculate(
            $request->input('from'),
            $request->input('to'),
            $request->input('plan'),
            $request->input('duration')
        );
    }
}