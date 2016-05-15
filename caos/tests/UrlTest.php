<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class UrlTest extends TestCase
{
   public function testUrlRedirect(){
     $this->get('/api/v1/url/1')
          ->assertResponseStatus(301);
   }

   public function testDeletion(){
     $response = $this->call('DELETE','api/v1/url/1');
     $this->assertEquals(204, $response->status());
   }
}
