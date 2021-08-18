<?php

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;

class TokenController extends ApiTestCase{

    public function testPostCreateToken(){

        $this-createUser("aliou","$2y$13$0xA5LE7uAuiMNotQ6RPBpu1u1dg7bbztjoqhdXwEpmSKiarhoIZF2");
    }
    
}