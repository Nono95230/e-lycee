<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\CommentRequest;

use App\Repositories\PostRepository;
use App\Repositories\ContactRepository;

use App\User;
use App\Http\Traits\UserMemberTrait;

class FrontController extends Controller
{
    use UserMemberTrait;

    public function __construct(){
        
        $this->takeUser();

    }
    
    public function index(PostRepository $repository) {
        
        return view('front.home', [
            'title' => 'Accueil',
            'posts' => $repository->getBestActus() 
        ]);

    }

    public function actus(PostRepository $repository) {

        return view('front.actus-all', [
            'title' => 'Nos actualités',
            'posts' => $repository->getAllActus()
        ]);

    }

    public function OneActu(PostRepository $repository, $id) {
        
        $post = $repository->getOneActu($id);

        return view('front.actu-one', [
            'title'         => 'Actualité',
            'postId'        => $post->id,
            'postTitle'     => $post->title,
            'postUser'      => $post->user->username,
            'postPublished' => $post->published_at,
            'postContent'   => $post->content,
            'postImage'     => $post->url_thumbnail,
            'comments'      => $post->comments->sortByDesc('created_at')

        ]);

    }

    public function addComment($id, CommentRequest $request, PostRepository $repository) {

        return redirect()->route('actu',$id)->with('message', $repository->addComment($id,$request));
    }

    public function presentationLycee() {

        return view('front.presentation-lycee', ['title' => 'Notre lycée']);

    }

    public function contact() {

        return view('front.contact', ['title' => 'Nous contacter']);

    }

    /**
     * Récupère les infos saisies et valide les données, puis et envoie un mail au propriétaire du site
     *
     * @param ContactRequest $request => it's use for get data and validate them
     * @param ContactRepository $repository => for controller traitement
     * @return redirect on route home with message in Session
    */
    public function sendContactMessage(ContactRequest $request, ContactRepository $repository){

        return redirect()->route('home')->with('message',$repository->sendContactMessage($request));

    }

    public function mentionsLegales() {

        return view('front.mentions-legales', ['title' => 'Nos mentions légales']);

    }
}
