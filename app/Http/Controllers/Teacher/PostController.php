<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;

use App\Http\Requests\PostRequest;

use App\User;
use Carbon\Carbon;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Repositories\PostRepository;

use App\Http\Traits\UserMemberTrait;

class PostController extends Controller
{
    use UserMemberTrait;

    public function __construct(Request $request)
    {

        $this->setUser();
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request => it's use for get data and validate them
     * @param PostRepository $repository => for controller traitement
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, PostRepository $repository)
    {

        $this->authorize('view', Post::class);
        
        $indexPosts = $repository->getIndexPosts($request->perPage);

        return view('back.teacher.post.index', ['title' => 'Liste des articles',
            'posts' => $indexPosts['posts'],
            'nb_posts'=> $indexPosts['nb_posts'],
            'perPage'=> $indexPosts['perPage']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Post::class);

        return view('back.teacher.post.create', ['title' => 'Ajouter un article']);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request => it's use for get data and validate them
     * @param PostRepository $repository => for controller traitement
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request, PostRepository $repository)
    {
        return redirect()->route('post.index')->with('message', $repository->makeActionStore($request));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post); 

        $title = 'Éditer l\'article : '.$post->title;

        return view('back.teacher.post.edit', compact('title','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @param  PostRepository $repository => for controller traitement
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post, PostRepository $repository)
    {
        return redirect()->route('post.index')->with('message', $repository->makeActionUpdate($request, $post));
    }

    /**
     * Update the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @param  PostRepository $repository => for controller traitement
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, Post $post, PostRepository $repository )
    {
        $this->authorize('status', Post::class);

        return redirect()->route('post.index')->with('message', $repository->makeActionUpdateStatus($request, $post));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @param  PostRepository $repository => for controller traitement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post, PostRepository $repository )
    {
        $this->authorize('delete', $post); // politique d'accès 
        
        return redirect()->route('post.index')->with('message', $repository->makeActionDelete($post));

    }
}
