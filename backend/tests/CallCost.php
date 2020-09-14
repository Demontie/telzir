<?php

namespace SRC\Test;

use PHPUnit\Framework\TestCase;
use SRC\Application\Boundery\InputCallData;
use SRC\Domain\CallCost\CalculateCallCost;

class CallCost extends TestCase
{
    private $domain;

    protected function setUp(): void
    {
        $this->domain = new CalculateCallCost(
            new AreaCodeRepository(),
            new PlanRepository(),
            new GetRateRepository()
        );
    }

    public function testCalculatePlan30()
    {
        $input = new InputCallData(1, 2, 1, 20);
        $current = $this->domain->calculate($input);
        $expected = [
            'from' => '011',
            'to'   => '016',
            'duration' => 20,
            'plan' => 'FaleMais 30',
            'withPlan' => 0,
            'withoutPlan' => 38
        ];
        $this->assertEquals($expected, $current);
    }

    public function testCalculatePlan60()
    {
        $input = new InputCallData(1, 3, 2, 80);
        $current = $this->domain->calculate($input);
        $expected = [
            'from' => '011',
            'to'   => '017',
            'duration' => 80,
            'plan' => 'FaleMais 60',
            'withPlan' => 37.40,
            'withoutPlan' => 136
        ];
        $this->assertEquals($expected, $current);
    }

    public function testCalculatePlan120()
    {
        $input = new InputCallData(4, 1, 3, 200);
        $current = $this->domain->calculate($input);
        $expected = [
            'from' => '018',
            'to'   => '011',
            'duration' => 200,
            'plan' => 'FaleMais 120',
            'withPlan' => 167.20,
            'withoutPlan' => 380
        ];
        $this->assertEquals($expected, $current);
    }

    public function testCalculateEmptyCall()
    {
        $input = new InputCallData(4, 3, 1, 100);
        $current = $this->domain->calculate($input);
        $expected = [
            'from' => '018',
            'to'   => '017',
            'duration' => 100,
            'plan' => 'FaleMais 30',
            'withPlan' => '-',
            'withoutPlan' => '-'
        ];
        $this->assertEquals($expected, $current);
    }
}