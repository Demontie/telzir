<?php

namespace SRC\Domain\Plan;

class GetAllPlanData
{
    private GetPlan $repository;

    /**
     * GetAllPlanData constructor.
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