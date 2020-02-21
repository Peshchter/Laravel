<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class newsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/news');

        $response->assertStatus(200);
        $response->assertSeeText('Список');


    }

    public function testDownload()
    {
        $response = $this->get('/news/get');
        $response->assertStatus(200);
        $response->assertHeader('Content-Disposition', 'attachment; filename = "news.json"');
    }
}
