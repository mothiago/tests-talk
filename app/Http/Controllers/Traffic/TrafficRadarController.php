<?php

namespace App\Http\Controllers\Traffic;

use App\Http\Controllers\Controller;
use App\Packages\Traffic\Domain\Model\TrafficRadarFines;
use App\Packages\Traffic\Facade\TrafficRadarFacade;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TrafficRadarController extends Controller
{
    public function __construct(private TrafficRadarFacade $trafficRadarFacade)
    {
    }

    public function vehicleBehaviourAnalysis(Request $request): JsonResponse
    {
        try {
            $radarResult = $this->trafficRadarFacade->vehicleBehaviourAnalysis(
                $request->get('licensePlateNumber'),
                $request->get('velocity'),
                $request->get('trafficLightColor'),
            );
            $vehicle = $radarResult->getVehicle();
            $response = [
                'protocol' => $radarResult->getProtocol(),
                'vehicle' => [
                    'id' => $vehicle->getId(),
                    'model' => $vehicle->getModel(),
                ],
                'fines' => $radarResult->getTrafficRadarFines()->map(
                    fn(TrafficRadarFines $trafficRadarFine) => [
                        'name' => $trafficRadarFine->getFine()->getName(),
                        'amount' => $trafficRadarFine->getFine()->getAmount(),
                        'when' => $trafficRadarFine->getTrafficRadarResult()->getCreatedAt()->format(DATE_ATOM)
                    ]
                )->toArray()
            ];
            return response()->json($response);
        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage(), 'code' => $exception->getCode()], 400);
        }
    }
}
