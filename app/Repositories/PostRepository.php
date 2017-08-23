<?php

namespace App\Repositories;

use DB;
use App\Post;


class PostRepository
{

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }




    /*
     * FOR FRONT PAGE
     */

    public function getBestActus()
    {
        $bestActus = DB::table('posts')
            ->select(array('posts.*', 'users.username as username', DB::raw('COUNT(comments.id) as nb_comms')))
            ->join('comments', 'posts.id', '=', 'comments.post_id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->groupBy('posts.id')
            ->orderBy('nb_comms', 'desc')
            ->limit(3)
            ->get();

        return $bestActus;
    }

    public function getAllActus()
    {
        return $this->post->where('posts.status', "published")->orderBy('published_at', "DESC")->paginate(10);
    }

    public function getOneActu($value)
    {
        return $this->post->findOrFail($value);
    }



    /*
     * FOR BACK PAGE
     */

    public function getPaginate($perPage)
    {
    	if ( !isset($perPage)) {
    		$perPage = 5;
    	}
    	
        $posts    = $this->post->paginate($perPage);
        $nb_posts = count($posts);

        return ['posts' => $posts, 'nb_posts' => $nb_posts, 'perPage' => $perPage];
    }

}