<?php

namespace SRC\Domain\Plan;

class GetPlanDataById
{
    private GetPlanById $repository;

    /**
     * GetAllPlanData constructor.
     * @param GetPlanById $repository
     */
    public function __construct(GetPlanById $repository)
    {
        $this->repository = $repository;
    }

    public function find(int $id)
    {
        return $this->repository->find($id);
    }
}