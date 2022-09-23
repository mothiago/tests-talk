<?php
namespace App\Packages\Traffic\Tests\Unit\Domain\Model;

use App\Packages\Traffic\Domain\Model\TrafficRadarResult;
use App\Packages\Vehicle\Domain\Model\Vehicle;
use Tests\TestCase;

class TrafficRadarResultTest extends TestCase
{
    public function testItCanGenerateAProtocolPropperly()
    {
        // given
        $vehicleStub = $this->createStub(Vehicle::class);

        // when
        $radarTrafficResult = new TrafficRadarResult($vehicleStub);


        // then
        $this->assertIsString($radarTrafficResult->getProtocol());
        $this->assertSame(7, strlen($radarTrafficResult->getProtocol()));
    }
}
