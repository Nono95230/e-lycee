<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    
    public function __construct(Request $request)
    {

        /*view()->composer('partials.nav', function($view) use($request) {

            $currentPath = $request->path();
            $view->with('currentPath',$currentPath);
            $categories = DB::table('categories')->select('id', 'title')->get();
            $view->with('categories',$categories);
        });*/
    }

    public function index() {

        return view('back.dashboard', ['title' => 'Dashboard']);
    }
}
