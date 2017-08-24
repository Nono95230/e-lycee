<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Post;

use App\Http\Requests\PostRequest;

use App\User;
use Carbon\Carbon;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Repositories\PostRepository;

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
    public function index(PostRepository $post,Request $request)
    {

        $this->authorize('view', Post::class);
        
        $indexPosts = $post->getIndexPosts($request->perPage);

        return view('back.post.index', ['title' => 'Liste des articles',
            'posts' => $indexPosts['posts'],
            'nb_posts'=> $indexPosts['nb_posts'],
            'perPage'=> $indexPosts['perPage']]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Post::class);

        return view('back.post.create', ['title' => 'Ajouter un article']);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //dd($request->all());

        $post = Post::create($request->all());

        $post->setUserId($post->getUserId());

        $post->updateStatus($request->status);
        


        if ($request->hasFile('url_thumbnail') && $request->file('url_thumbnail')->isValid() ) {

            $file = $request->url_thumbnail;

            $FileExtension  = $file->extension();

            $fileName = $file->getClientOriginalName();
            $lastPosition = strrpos($fileName,".");

            $fileName = substr_replace($fileName,'',$lastPosition); 

            $url_thumnail = $fileName .'_'. str_random(12) . '.' . $FileExtension;

            $file->move('posts/images',$url_thumnail);

            $post->url_thumbnail = $url_thumnail;

        }
        
        $post->save();

        $message = [
            'success',
            sprintf('Merci d\'avoir ajouter l\'article %s !', $post->title)
        ];
        
        return redirect()->route('post.index')->with('message', $message);
    
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


        return view('back.post.edit', compact('title','post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        $oldFile = $post->getUrlThumbnailAttribute();

        $post->updateStatus($request->status);

        $request->offsetUnset('status');

        $post->update( $request->all() );

        if ($request->hasFile('url_thumbnail') && $request->file('url_thumbnail')->isValid() ) {

            $oldFilePath = public_path() . '/posts/images/'.$oldFile ;
            
            if(file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }

            $file = $request->url_thumbnail;

            $FileExtension  = $file->extension();

            $fileName = $file->getClientOriginalName();
            $lastPosition = strrpos($fileName,".");

            $fileName = substr_replace($fileName,'',$lastPosition); 

            $url_thumnail = $fileName .'_'. str_random(12) . '.' . $FileExtension;

            $file->move('posts/images',$url_thumnail);

            $post->url_thumbnail = $url_thumnail;

            $post->save();
        }

        $message = [
            'success',
            sprintf('La modification de l\'article %s à été un succès !', $post->title)
        ];

        return redirect()->route('post.index')->with('message', $message);

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
            sprintf('L\'article %s à bien été '.$status, $title)
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
