<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }
    /** @test */
    public function  test_login(){
        $response = $this->get('/api/register');
        $response->assertStatus(200);
        $response->assertSee("Hola");

    }
}
