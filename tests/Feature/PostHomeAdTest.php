<?php


namespace Tests\Feature;


use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class PostHomeAdTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function cant_reach_home_ad_form_as_guest()
    {
        $response = $this->get('/home-ads/create');

        $response->assertRedirect('/login');
    }

    /** @test */
    public function can_reach_home_ad_form_when_authenticated_as_tester()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/home-ads/create');

        $response->assertOk();
        $response->assertSee('City');
        $response->assertSee('Country');
    }

    /** @test */
    public function post_fails_when_not_authenticated()
    {
        $response = $this->post('/home-ads', ['city'=>'Copenhagen', 'country' => 'Sweden']);

        $response->assertRedirect('/login');
    }

    /** @test */
    public function post_works_when_authenticated_as_tester()
    {
        $this->assertDatabaseMissing('home_ads',['city' => 'Copenhagen', 'country' => 'Sweden']);
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->post('/home-ads', ['city'=>'Copenhagen', 'country' => 'Sweden']);

        $response->assertOk();
        $this->assertDatabaseHas('home_ads',['city' => 'Copenhagen', 'country' => 'Sweden']);
    }

}
