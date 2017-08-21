<?php

namespace App\Repositories;

use App\Post;

class PostRepository
{

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function getPaginate($perPage = 5)
    {
        $posts    = $this->post->paginate($perPage);
        $nb_posts = count($posts);

        return ['posts' => $posts, 'nb_posts' => $nb_posts, 'perPage' => $perPage];
    }

}
