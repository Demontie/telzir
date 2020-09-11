<?php

namespace SRC\Domain\Plan;

class GetPlanDataById
{
    private GetPlanById $repository;

    /**
     * GetAllPlan constructor.
     * @param GetPlanById $repository
     */
    public function __construct(GetPlanById $repository)
    {
        $this->repository = $repository;
    }

    public function findAll(int $id)
    {
        return $this->repository->find($id);
    }
}