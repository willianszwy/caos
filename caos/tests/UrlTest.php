<?php

use Laravel\Lumen\Testing\DatabaseMigrations;

class UrlTest extends TestCase
{

   public function testUrlController(){

     $user = factory('App\User')->create();
     $url = factory('App\Url')->make();
     $user->urls()->save($url);

     //redirecionado com sucesso
     $this->get('/api/v1/url/'.$url->id)
          ->assertResponseStatus(301);

     //testa se o registro existe e se houve incremento no hits
     $this->seeInDatabase('urls', ['id' => $url->id,'hits' => $url->hits + 1]);

     //nova chamada
     $this->get('/api/v1/url/'.$url->id)
          ->assertResponseStatus(301);

     //hits incrementou?
     $this->seeInDatabase('urls', ['id' => $url->id,'hits' => $url->hits + 2]);

     //testa a criacao de uma nova url
     $this->post('api/v1/user/'.$user->id.'/urls',['url' => $url->url])
         ->seeJson(['url' => $url->url,'hits'=>0])
         ->assertResponseStatus(201);

     //testo o delete
     $response = $this->call('DELETE','api/v1/url/' . $url->id);
     $this->assertEquals(204, $response->status());

     $user->delete();

   }

}
