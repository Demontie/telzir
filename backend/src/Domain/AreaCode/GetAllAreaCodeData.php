<?php

namespace SRC\Domain\AreaCode;

class GetAllAreaCodeData
{
    private GetAllAreaCode $repository;

    /**
     * GetAllAreaCode constructor.
     * @param GetAllAreaCode $repository
     */
    public function __construct(GetAllAreaCode $repository)
    {
        $this->repository = $repository;
    }

    public function findAll()
    {
        return $this->repository->findAll();
    }
}