<?php

namespace Tests\Feature;

use App\Models\Country;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LocationTest extends TestCase
{
    /**
     * Fetch all countries accordingly.
     *
     * @return void
     */
    public function test_if_all_countries_can_be_fetched()
    {
        $response = $this->json('GET', '/api/countries');

        $response->assertStatus(200)
                ->assertJson([
                    'success' => true,
                    'data' => []
                ])
        ;
    }

    // public function test_if_all_states_can_be_fetched_by_country()
    // {
    //     $country = Country::factory()->create(5);

    //     $getCountry = Country::first();

    //     $response = $this->json('GET', '/api/states'.$getCountry->id);

    //     $response->assertStatus(200)
    //             ->assertJson([
    //                 'success' => true,
    //                 'data' => []
    //             ])
    //     ;
    // }
}
