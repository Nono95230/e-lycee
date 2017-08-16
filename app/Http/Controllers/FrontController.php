<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    use Member\UserMember;

    public function __construct(Request $request){

        // view()->composer('partials.nav', function($view) use($request) {

        //     $currentPath = $request->path();
        //     $view->with('currentPath',$currentPath);
        //     $categories = DB::table('categories')->select('id', 'title')->get();
        //     $view->with('categories',$categories);
        // });
        
        $this->takeUser();

    }
    public function index() {

        return view('front.home', ['title' => 'Accueil']);

    }

    public function actus() {

        return view('front.actus-all', ['title' => 'Actualités']);

    }

    public function OneActu() {

        return view('front.actu-one', ['title' => 'Une actualité']);

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
