<?php


namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeAdListTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function can_see_list_of_ads_as_guest()
    {
        $response = $this->get('/home-ads');

        $response->assertStatus(200);
        $response->assertSee('Holiday');
        $response->assertDontSee('Laravel');
    }



}
