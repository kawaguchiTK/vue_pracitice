<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();
        $this->artisan('db:seed', ['--class' => 'TasksTableSeeder']);
    }
    /**
     * @test
     *
     *  一つのテストメソッドに検証は1つ
     */
    public function api_orderにGETメソッドでアクセスできる()
    {
        $response = $this->get('api/order');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function api_orderにGETメソッドにアクセスするとJSONが返却される()
    {
        $response = $this->get('api/order');
        $this->assertThat($response->content(), $this->isJson());
    }

    /**
     * @test
     */
    public function api_orderにGETメソッドで取得できるtaskは要件通り()
    {
        $response = $this->get('api/order');
        $tasks = $response->json();
        $task = $tasks[0];
        $this->assertSame(['id', 'title', 'content'], array_keys($task));
    }

    /**
     * @test
     */
    public function api_orderにGETメソッドで取得できるtaskは2件()
    {
        $response = $this->get('api/order');
        $response->assertJsonCount(2);
    }

    /**
     * @test
     */
    public function testpostにPOSTするとテーブルに保存される()
    {
        $params = [
            'title' => 'test',
            'content' => 'test content',
            'person_in_charge' => 'test',
        ];
        $this->postJson('api/testpost', $params);
        $this->assertDatabaseHas('tasks', $params);
    }
}
