<?php

namespace Tests\Unit\Repositories;

use App\Post;
use App\Repositories\PostRepository;

class PostRepositoryTest
{

    /**
     * @param Post $post
     */
    public function testBasicTest(Post $post)
    {
        $repo = new PostRepository($post);
        $return = $repo->getPaginate(5);
        $this->assertEquals($return['perPage'], 5);
        $this->assertEquals($return['nb_posts'], 50);
    }

}