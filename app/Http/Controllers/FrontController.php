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
        // $this->mg = new Mailgun("key-c772ec065d3ef77d613edd890eb342fc");
        // $this->domain = "sandbox79b4521bedeb4ea6819772e60afd970f.mailgun.org";
        

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

    public function presentationLycee() {

        return view('front.presentation-lycee', ['title' => 'Le lycée']);

    }

    public function contact() {

        return view('front.contact', ['title' => 'Nous contacter']);

    }

    public function sendContactMessage(ContactRequest $request){

        // $param = array( 'from' => 'JOKER <kilua.huntersx@hotmail.fr>',
        //             'to'       => 'amine.brakni@gmail.com',
        //            'subject' => 'premier test',
        //             'text'    => 'test 1');
        //             //text peut être remplacer par html si systeme de templating

        // $this->mg->sendMessage($this->domain, $param);
        $param =[];
        $param['mailDestinataire']  = env('MAIL_FROM_ADDRESS');
        $param['nameDestinataire']  = env('MAIL_FROM_NAME');
        $param['mailContact']       = $request->email;
        $param['mailSubject']       = $request->subject;
        $param['mailContent']       = $request->commentaire;
        $param['mailDate']          = date('\E\n\v\o\y\é \l\e Y-m-d \à H:i:s');
        //dd($param);
        Mail::to('amine.brakni@gmail.com')->send(new OrderShipped($param));
        // $data = [
        //     'email' => $request->email,
        //     'subject' => $request->subject,
        //     'commentaire' => $request->commentaire
        // ];
        // Mailgun::send('emails.orders.shipped', $data, function ($message) {
        //     $message
        //         ->subject('test')
        //         ->from('email@gmail.com')
        //         ->to('amine.brakni@gmail.com', 'John Doe');
        // });
        return redirect()->route('home');

    }

    public function mentionsLegales() {

        return view('front.mentions-legales', ['title' => 'Nos mentions légales']);

    }
}
