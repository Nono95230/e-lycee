<?php

namespace App\Repositories;

use DB;
use App\Post;
use App\Comment;


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
    
    /**
     * Sert à récupérer les actu les plus commentés
     *
     * @return OBJECT
    */
    public function getBestActus()
    {
        $bestActus = DB::table('posts')
            ->select(array('posts.*', 'users.username as username', DB::raw('COUNT(comments.id) as nb_comms')))
            ->where('posts.status', '=', "published")
            ->join('comments', 'posts.id', '=', 'comments.post_id')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->groupBy('posts.id')
            ->orderBy('nb_comms', 'desc')
            ->limit(3)
            ->get();

        return $bestActus;
    }

    /**
     * Sert à récupérer les actualités publiées et de prendre en compte la pagination
     *
     * @return array
    */
    public function getAllActus()
    {
        return $this->post->where('posts.status', "published")->orderBy('published_at', "DESC")->paginate(10);
    }

    /**
     * Sert à récupérer une actualité
     *
     * @return OBJECT
    */
    public function getOneActu($value)
    {
        return $this->post->findOrFail($value);
    }

    /**
     * Permet d'ajouter un commentaire
     *
     * @param $id 
     * @param Request $request
     * @return Array $message
    */
    public function addCOmment($id,$request){

        $request->offsetUnset('_token');
        $comment = Comment::create($request->all());
        $comment->setPostId($id);
        $comment->save();

        $message = [
            'success',
            sprintf('Merci d\'avoir ajouter un commentaire à cet Article !')
        ];
        return $message;
    }

    /*
     * FOR BACK PAGE
     */
    
    /**
     * Permet de récupérer les posts publiées et de prendre en compte la pagination
     *
     * @param $perPage, if exist, it's an integer number
     * @return Array
    */
    public function getIndexPosts($perPage)
    {
        if ( !isset($perPage)) {
            $perPage = 5;
        }
        
        $posts    = $this->post->OrderBy('published_at','DESC')->paginate($perPage);
        $nb_posts = count($posts);

        return ['posts' => $posts, 'nb_posts' => $nb_posts, 'perPage' => $perPage];
    }

    /**
     * Permet d'enregistrer un post 
     *
     * @param Request $request
     * @return Array $message
    */
    public function makeActionStore($request)
    {

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
        
        return $message;
    }

    /**
     * Permet de modifier un post existant
     *
     * @param Request $request
     * @param Post $post
     * @return Array $message
    */
    public function makeActionUpdate($request, $post)
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
        return $message;
    }

    /**
     * Permet de modifier le statut du post
     *
     * @param Request $request
     * @param Post $post
     * @return Array $message
    */
    public function makeActionUpdateStatus($request, $post)
    {

        $thisPost = $post->find($request->id);
        $title = $thisPost->title;

        $thisPost->updateStatus($request->status);
        $thisPost->update();
        
        $status = ($request->status === 'on')? 'publié': 'dépublié';
        
        $message = [
            'success',
            sprintf('L\'article %s à bien été '.$status, $title)
        ];

        return $message;
    }

    /**
     * Permet de supprimer un post
     *
     * @param Post $post
     * @return Array $message
    */
    public function makeActionDelete($post)
    {

        $postTitle = $post->title;

        $oldFile = $post->getUrlThumbnailAttribute();

        $oldFilePath = public_path() . '/posts/images/'.$oldFile ;
        
        if(file_exists($oldFilePath)) {
            unlink($oldFilePath);
        }
        
        $post->delete();

        $message = [
            'success',
            sprintf('Suppression de l\'article %s effectuée avec succès !', $postTitle)
        ];

        return $message;
    }

}