<?php

namespace SRC\Domain\AreaCode;

class GetRate
{
    private GetRateByOriginAndDestiny $repository;

    /**
     * GetAreaCode constructor.
     * @param GetRateByOriginAndDestiny $repository
     */
    public function __construct(GetRateByOriginAndDestiny $repository)
    {
        $this->repository = $repository;
    }

    public function find(int $from, int $to)
    {
        return $this->repository->find($from, $to);
    }
}