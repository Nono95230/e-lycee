<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function __construct(Request $request){

        // view()->composer('partials.nav', function($view) use($request) {

        //     $currentPath = $request->path();
        //     $view->with('currentPath',$currentPath);
        //     $categories = DB::table('categories')->select('id', 'title')->get();
        //     $view->with('categories',$categories);
        // });

    }
    public function index() {

        return view('front.home', ['messageTest' => 'hello', 'title' => 'Liste des robots']);

    }
}
