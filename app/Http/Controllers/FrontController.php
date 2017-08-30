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

    public function __construct(Request $request){
        
        $this->takeUser();

    }

    /**
     * Retourne la vue avec comme titre Accueil et les meilleurs actualités
     *
     * @param PostRepository $repository => for controller traitement
     * @return view front home
    */
    public function index(PostRepository $repository) {
        
        return view('front.home', [
            'title' => 'Accueil',
            'posts' => $repository->getBestActus() 
        ]);

    }

    /**
     * Retourne la vue avec comme titre Nos actualités et toutes les actualités 
     *
     * @param PostRepository $repository => for controller traitement
     * @return view front actualités 
    */
    public function actus(PostRepository $repository) {

        return view('front.actus-all', [
            'title' => 'Nos actualités',
            'posts' => $repository->getAllActus()
        ]);

    }

    /**
     * Retourne la vue d'une actualité avec toutes les infos (id,title,auteur,publié,content,img)
     *
     * @param PostRepository $repository => for controller traitement
     * @param $id => id de l'actu en question 
     * @return view front actu one 
    */
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

    /**
     * Retourne la route pour ajouter un commentaire
     *
     * @param $id => id de l'article à qui l'on ajoute le commentaire
     * @param CommentRequest $request => it's use for get data and validate them
     * @param PostRepository $repository => for controller traitement
     * @return redirect on route actu with message in Session
    */
    public function addComment($id, CommentRequest $request, PostRepository $repository) {

        return redirect()->route('actu',$id)->with('message', $repository->addComment($id,$request));
    }

    /**
     * Retourne la vue présentation du lycée avec son titre 
     *
     * @return view front présentation lycée
    */
    public function presentationLycee() {

        return view('front.presentation-lycee', ['title' => 'Le lycée']);

    }

    /**
     * Retourne la vue contact avec son titre 
     *
     * @return view front contact
    */
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

    /**
     * Retourne la vue présentation du lycée avec son titre 
     *
     * @return view mentions légales
    */
    public function mentionsLegales() {

        return view('front.mentions-legales', ['title' => 'Nos mentions légales']);

    }
}
