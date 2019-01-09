<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class StatsTest extends TestCase
{
   public function testStatsController(){



    $user = factory('App\User')->create();
    $url = factory('App\Url')->make(['hits' => 0]);
    $user->urls()->save($url);

     //estatisticas de um url
     $this->get('/api/v1/stats/'.$url->id)
          ->seeJson([
                 'id' => $url->id,
                 'hits' => 0,
                 'url' => $url->url
                 ])
          ->assertResponseStatus(200);

    for($i = 0;$i < 10; $i++){
      $this->get('/api/v1/url/'.$url->id);
    }
    // apos 10 hits
    $this->get('/api/v1/stats/'.$url->id)
         ->seeJson([
                'id' => $url->id,
                'hits' => 10,
                'url' => $url->url
                ])
         ->assertResponseStatus(200);

    $user->delete();     

   }
}
