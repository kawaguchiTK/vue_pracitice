<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\CalcPointService;

class CalcPointServiceTest extends TestCase
{
    /**
     * @test
     */
    public function calcPoint_購入金額が0ならポイントは0()
    {
        $result = CalcPointService::calcPoint(0);
        $this->assertSame(0, $result);
    }

    /**
     * @test
     */
    public function calcPoint_購入金額が1000ならポイントは10()
    {
        $result = CalcPointService::calcPoint(1000);
        $this->assertSame(10, $result);
    }

    /**
     * データプロバイダ
     * 同じテストに対して異なるパラメータを与えることができる
     */

     public function dataProvidor_for_calcPoint(): array{
        return [
            '購入金額が0なら0ポイント'             => [0, 0],
            '購入金額が999なら0ポイント'         => [0, 999],
            '購入金額が1000なら10ポイント'     => [10, 1000],
            '購入金額が9999なら99ポイント'     => [99, 9999],
            '購入金額が10000なら200ポイント' => [200, 10000],
        ];
     }

    /**
     * @test
     * @dataProvider dataProvidor_for_calcPoint
     * @param int $expected
     * @param int $amount
     */
     public function calcPoint($expected, $amount) {
         $result = CalcPointService::calcPoint($amount);
         $this->assertSame($expected,$result);
     }
}