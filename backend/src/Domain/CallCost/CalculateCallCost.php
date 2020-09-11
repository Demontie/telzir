<?php

namespace SRC\Domain\CallCost;

class CalculateCallCost
{
    private GetCallDataValue $repository;

    public function __construct(
        GetCallDataValue $getCallDataValue
    )
    {
        $this->repository = $getCallDataValue;
    }

    public function calculate(InputCallData $inputCallData)
    {
        $from = $this->repository->getAreaCodeById($inputCallData->getFrom());
        $to = $this->repository->getAreaCodeById($inputCallData->getTo());

        $cost = $this->repository->getRateByOriginAndDestinyArea(
            $inputCallData->getFrom(), $inputCallData->getTo()
        );

        $plan = $this->repository->getPlanDataByPlanId($inputCallData->getPlan());
        $response = [
            'from' => $from,
            'to'   => $to,
            'plan' => $plan['name'],
            'withPlan' => '-',
            'withoutPlan' => '-'
        ];

        if ($cost) {
            $withPlan = 0;
            $withoutPlan = $cost * $inputCallData->getDuration();

            if ($plan['duration'] < $inputCallData->getDuration()) {
                $withPlan = $inputCallData->getDuration() - $plan['duration'];
                $withPlan = $withPlan * ($cost + ($cost / 10));
            }

            $response['withPlan'] = $withPlan;
            $response['withoutPlan'] = $withoutPlan;
        }

        return $response;
    }
}