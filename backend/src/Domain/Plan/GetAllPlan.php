<?php

namespace SRC\Domain\Plan;

class GetAllPlan
{
    private GetPlan $repository;

    /**
     * GetAllPlan constructor.
     * @param GetPlan $repository
     */
    public function __construct(GetPlan $repository)
    {
        $this->repository = $repository;
    }

    public function findAll()
    {
        return $this->repository->findAll();
    }
}