<?php

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;

class TokenController extends ApiTestCase{

    public function testPostCreateToken(){

        $this-createUser("aliou","passer");
    }
    
}