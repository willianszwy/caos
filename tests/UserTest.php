<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTest extends TestCase
{

    public function testUserController(){

      $user = factory('App\User')->make();

      $this->json('POST','/api/v1/user', ['id' => $user->id])
           ->seeJsonEquals([
              'id' => $user->id
           ])
           ->assertResponseStatus(201);

      $this->seeInDatabase('users', ['id' => $user->id]);

      $response = $this->call('DELETE','api/v1/user/' .$user->id);
      $this->assertEquals(204, $response->status());
    }


}
