<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;

class RegisterTest extends TestCase
{
    use DatabaseMigrations;
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
    public function  test_email_register(){
        $credentials = [
            "email" => null,
            "password" => "secret"
        ];

        $response = $this->from('api/register')->post('api/register', $credentials);
        $response->assertRedirect('api/register')->assertSessionHasErrors([
            'email' => 'The email field is required.',
        ]);

    }
    /** @test */
    public function test_post_register(){
        
        $this->json('POST', 'api/register')
        ->assertStatus(422)
        ->assertJson([
            "message" => "The given data was invalid.",
            "errors" => [
                
                'name' => ["The name field is required."],
                'email' => ["The email field is required."],
                'password' => ["The password field is required."],
            ]
        ]);
    }
}
