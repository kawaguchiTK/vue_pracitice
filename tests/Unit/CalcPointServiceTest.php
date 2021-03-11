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

    public function dataProvidor_for_calcPoint(): array
    {
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
    public function calcPoint($expected, $amount)
    {
        $result = CalcPointService::calcPoint($amount);
        $this->assertSame($expected, $result);
    }


    /**
     * @test
     * 例外のテスト
     * try catch を使うやり方
     */
    public function exception_try_catch()
    {
        try {
            throw new \InvalidArgumentException('message', 200);
            $this->fail();
        } catch (\Throwable $e) {
            $this->assertInstanceOf(\InvalidArgumentException::class, $e);
            // エラー内容も検証している
            $this->assertSame(200, $e->getCode());
            $this->assertSame('message', $e->getMessage());
        }
    }

    /**
     * @test
     *expectExceptionを使った場合
     */
    public function exception_expectedException_method()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionCode(200);
        $this->expectExceptionMessage('message');

        throw new \InvalidArgumentException('message', 200);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionCode 200
     * @expectedExceptionMessage  message
     * アノテーションを使う場合(ver9では削除)
     */
    // public function exception_expectedException_annotation()
    // {
    //     throw new \InvalidArgumentException('message', 400);
    // }


    /**
     * @test
     */
    public function calcPoint_購入金額が負の数なら例外をスロー()
    {
        $this->expectException(\App\Exceptions\PreConditionException::class);
        $this->expectExceptionMessage('購入金額が負の数');

        CalcPointService::calcPoint(-1);
    }
}
