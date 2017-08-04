<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;

use App\Http\Requests\RobotRequest;

use App\User;


class PostController extends Controller
{
    use UserMember;

    public function __construct(Request $request)
    {

        $this->setUser();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->authorize('view', Post::class);
        $posts    = Post::all();
        $nb_posts = count($posts);
        
        return view('back.post.index', ['title' => 'Liste des articles', 'posts' => $posts,  'nb_posts'=>$nb_posts,'limit'=>20]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //$this->authorize('create', Post::class);
        return view('back.post.create', ['title' => 'Ajouter un article']);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Update the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, Post $post)
    {
        $this->authorize('status', Post::class);

        $thisPost = $post->find($request->id);
        $title = $thisPost->title;

        $thisPost->updateStatus($request->status);
        $thisPost->update();
        $status = ($request->status === 'on')? 'publié': 'dépublié';
        $message = [
            'success',
            sprintf('L\'article %s a bien été '.$status, $title)
        ];
        return redirect()->route('post.index')->with('message', $message);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post); // politique d'accès 
        
        $postTitle = $post->title;

        $post->delete();

        $message = [
            'success',
            sprintf('Suppression de l\'article %s effectuée avec succès !', $postTitle)
        ];

        return redirect()->route('post.index')->with('message', $message);

    }


}
