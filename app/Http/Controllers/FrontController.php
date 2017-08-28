<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;
use App\User;
use App\Http\Requests\ContactRequest;

use Mail;
use App\Mail\OrderShipped;


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
        
        $post = $post->getOneActu($id);

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

    public function presentationLycee() {

        return view('front.presentation-lycee', ['title' => 'Le lycée']);

    }

    public function contact() {

        return view('front.contact', ['title' => 'Nous contacter']);

    }

    public function sendContactMessage(ContactRequest $request){
        $param =[];
        $param['mailDestinataire']  = env('MAIL_FROM_ADDRESS');
        $param['nameDestinataire']  = env('MAIL_FROM_NAME');
        $param['mailContact']       = $request->email;
        $param['mailSubject']       = $request->subject;
        $param['mailContent']       = $request->commentaire;
        $param['mailDate']          = date('\E\n\v\o\y\é \l\e Y-m-d \à H:i:s');
        //dd($param);
        Mail::to('amine.brakni@gmail.com')
            ->send(new OrderShipped($param));

        return redirect()->route('home');

    }

    public function mentionsLegales() {

        return view('front.mentions-legales', ['title' => 'Nos mentions légales']);

    }
}
