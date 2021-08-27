<?php

namespace Blog;

use Tests\TestCase;

class AuthTest extends TestCase
{
    public function testLogin()
    {
        $response =  $this->json('post', 'blog/auth/login');
        $response->assertJson(['errno' => 1]);
    }
}
