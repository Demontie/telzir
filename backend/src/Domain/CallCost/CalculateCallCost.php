<?php

namespace SRC\Domain\CallCost;

class CalculateCallCost
{
    private GetAreaCodeDataById $areaCodeService;

    private GetPlanDataById $planService;

    private GetRateByOriginAndDestiny $cost;
    
    private array $response;

    public function __construct(
        GetAreaCodeDataById $areaCodeDataById,
        GetPlanDataById $planById,
        GetRateByOriginAndDestiny $cost
    )
    {
        $this->areaCodeService = $areaCodeDataById;
        $this->planService = $planById;
        $this->cost = $cost;
    }

    /**
     * Calculate call cost with plan and without plan.
     *
     * @param InputCallData $inputCallData
     *
     * @see mountDefaultResponse
     * @see calculateCallValuesIfHasRate
     *
     * @return array
     */
    public function calculate(InputCallData $inputCallData)
    {
        $from   = $this->areaCodeService->findCodeById($inputCallData->getFrom());
        $to     = $this->areaCodeService->findCodeById($inputCallData->getTo());
        $plan   = $this->planService->find($inputCallData->getPlan());

        $costValue = $this->cost->find(
            $inputCallData->getFrom(),
            $inputCallData->getTo()
        );

        $this->mountDefaultResponse($from, $to, $plan['name'], $inputCallData->getDuration());

        $this->calculateCallValuesIfHasRate(
            $costValue,
            $plan['duration'],
            $inputCallData->getDuration()
        );

        return $this->response;
    }

    private function mountDefaultResponse($from, $to, $planName, $duration)
    {
        $this->response = [
            'from' => $from,
            'to'   => $to,
            'duration' => $duration,
            'plan' => $planName,
            'withPlan' => '-',
            'withoutPlan' => '-'
        ];
    }

    private function calculateCallValuesIfHasRate($rate, $planDuration, $duration)
    {
        if ($rate) {
            $withPlan = 0;
            $withoutPlan = $rate * $duration;

            if ($this->checkIfHasTimeOut($duration, $planDuration)) {
                $withPlan = $this->calculatePlanCall(
                    $duration,
                    $planDuration,
                    $rate
                );
            }

            $this->updatePlanValues($withPlan, $withoutPlan);
        }
    }

    /**
     * Check if call duration is bigger than plan duration.
     *
     * @param $duration
     * @param $planDuration
     * @return bool
     */
    private function checkIfHasTimeOut($duration, $planDuration)
    {
        return $planDuration < $duration;
    }

    /**
     * Calculate call cost.
     *
     * @param $callDuration
     * @param $planDuration
     * @param $cost
     * @return float|int
     */
    private function calculatePlanCall($callDuration, $planDuration, $cost)
    {
        $timeOut = $callDuration - $planDuration;

        return $timeOut * ($cost + ($cost / 10));
    }

    private function updatePlanValues($planValue, $withoutPlanValue)
    {
        $this->response['withPlan'] = $planValue;
        $this->response['withoutPlan'] = $withoutPlanValue;
    }
}