<?php

namespace SRC\Application\Boundery;

class InputCallData implements \SRC\Domain\CallCost\InputCallData
{
    private $from;

    private $to;

    private $plan;

    private $duration;

    /**
     * InputCallData constructor.
     * @param $from
     * @param $to
     * @param $plan
     * @param $duration
     */
    public function __construct($from, $to, $plan, $duration)
    {
        $this->from = $from;
        $this->to = $to;
        $this->plan = $plan;
        $this->duration = $duration;
    }

    public function getFrom(): int
    {
        return $this->from;
    }

    public function getTo(): int
    {
        return $this->to;
    }

    public function getPlan(): int
    {
        return $this->plan;
    }

    public function getDuration(): int
    {
        return $this->duration;
    }
}