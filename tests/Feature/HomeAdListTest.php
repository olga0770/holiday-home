<?php


namespace Tests\Feature;


use Tests\TestCase;

class HomeAdListTest extends TestCase
{


    public function testBasicTest()
    {
        $response = $this->get('/home-ads');

        $response->assertStatus(200);
        $response->assertSee('Holiday');
        $response->assertDontSee('Laravel');
    }



}
