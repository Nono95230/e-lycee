<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\PostRepository;


class FrontController extends Controller
{
    use Member\UserMember;

    public function __construct(Request $request){
        
        $this->takeUser();

    }
    
    public function index(PostRepository $post) {
    
        return view('front.home', [
            'title' => 'Accueil',
            'posts' => $post->getBestActus() 
        ]);

    }

    public function actus(PostRepository $post) {

        return view('front.actus-all', [
            'title' => 'Nos actualités',
            'posts' => $post->getAllActus()
        ]);

    }

    public function OneActu(PostRepository $post, $id) {

        return view('front.actu-one', [
            'title' => 'Une actualité',
            'post'=> $post->getOneActu($id)
        ]);

    }

    public function presentationLycee() {

        return view('front.presentation-lycee', ['title' => 'Le lycée']);

    }

    public function contact() {

        return view('front.contact', ['title' => 'Nous contacter']);

    }

    public function mentionsLegales() {

        return view('front.mentions-legales', ['title' => 'Nos mentions légales']);

    }
}
