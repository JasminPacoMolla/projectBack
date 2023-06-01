<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
   /* public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }*/
    /*public function testIndexReturnsDataInValidFormat() {

        $this->json('get', 'api/user')
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure(
                [
                        '*' => [
                            'id',
                            'name',
                            'email',
                            'photo',
                            'phoneNumber',
                            'address',
                            'country',
                            'user_type',
                            'termsAcceptation',
                            'email_verified_at',
                            'password'
                        ]
                    ]

            );
    }*/
    public function testBasicExample()
    {
        $testUser = [
            'name'=>'jasmin',
            'email'=>'admin1@gmail.com',
            'password'=>'123456789'
        ];
        $this->json('POST', '/api/signup', $testUser)
            ->assertJson(["message"=>"User well created!!", "User"=>$testUser ]);
    }

}
