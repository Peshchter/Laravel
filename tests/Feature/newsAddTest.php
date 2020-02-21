<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class newsAddTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->withSession(['result'=>'success'])->get('/news/add');
        $response->assertSeeText('Сохранено!');
        $response->assertStatus(200);
        $response->assertViewIs('news.add');
    }
}
