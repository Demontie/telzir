<?php

namespace SRC\Domain\AreaCode;

class GetAreaCodeDataById implements GetAreaCodeById
{
    private GetAreaCodeById $repository;

    /**
     * GetAreaCodeDataById constructor.
     * @param GetAreaCodeById $repository
     */
    public function __construct(GetAreaCodeById $repository)
    {
        $this->repository = $repository;
    }

    public function find(int $id): string
    {
        return $this->repository->find($id);
    }
}