<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTest extends TestCase
{

    /**
     * testa a munipulacao de usuarios.
     * @return void
     */
    public function testCreateResponse(){

      $this->json('POST','/api/v1/user', ['id' => 'wills'])
           ->seeJsonEquals([
              'id' => 'wills'
           ])
           ->assertResponseStatus(201);
    }

    public function testDataBaseCheck(){
      $this->seeInDatabase('users', ['id' => 'wills']);
    }

    public function testCreateUrl() {
      $this->post('/api/v1/user/wills/urls',['url' => 'http://www.google.com.br'])
         ->seeJson([
           'hits' => 0,
           'url' => 'http://www.google.com.br'])
         ->assertResponseStatus(201);
    }

    public function testDeletion(){
      $response = $this->call('DELETE','api/v1/user/wills');
      $this->assertEquals(204, $response->status());
    }


}
