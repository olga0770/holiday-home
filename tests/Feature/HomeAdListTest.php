<?php


namespace Tests\Feature;


use Tests\TestCase;

class HomeAdListTest extends TestCase
{


    /** @test */
    public function can_see_list_of_ads_as_guest()
    {
        $response = $this->get('/home-ads');

        $response->assertStatus(200);
        $response->assertSee('Holiday');
        $response->assertDontSee('Laravel');
    }



}
