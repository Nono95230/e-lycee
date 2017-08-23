<?php
 
namespace Tests\Unit;

use Tests\TestCase;

use App\Post;
use App\Repositories\PostRepository;


class PostRepositoryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetPaginate()
    {
        $post = new Post();
        $PostRepository = new PostRepository($post);
        $test = $PostRepository->getPaginate();
        $this->assertEquals($test['perPage'],5);
    }
}
