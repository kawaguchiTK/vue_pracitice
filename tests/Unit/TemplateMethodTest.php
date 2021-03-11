<?php

declare(strict_types=1);

namespace Tests\Unit;

use Tests\TestCase;


/**
 * テストを実行する上で前処理と後処理を行う必要がある
 * テスト実行前にDB登録や実行後に変更された値を戻したり
 * 
 */
class TemplateMethodTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        echo __METHOD__, PHP_EOL;
    }

    protected function setUp(): void
    {
        parent::setUp();

        echo __METHOD__, PHP_EOL;
    }

    /**
     * @test
     */
    public function テストメソッド1()
    {
        echo __METHOD__, PHP_EOL;
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function テストメソッド2()
    {
        echo __METHOD__, PHP_EOL;
        $this->assertTrue(true);
    }

    protected function tearDown() :void
    {
        parent::tearDown();

        echo __METHOD__, PHP_EOL;
    }

    public static function tearDownAfterClass() :void
    {
        parent::tearDownAfterClass();

        echo __METHOD__, PHP_EOL;
    }
}
