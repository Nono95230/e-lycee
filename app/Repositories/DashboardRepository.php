<?php

namespace App\Repositories;

use DB;
use App\User;
use  App\Http\Controllers\Teacher\UserMember;
use Illuminate\Http\Request;

use App\Http\Traits\UserMemberTrait;

class DashboardRepository{

    use  UserMemberTrait;

    public function __construct(Request $request)
    {
        $this->setUser();
    }

    public function getDashboard(){

        // requête pour les posts les plus récents
        $dashboard['postsRecent'] = DB::table('posts')
            ->select('id','title','created_at', 'status')
            ->orderBy('created_at', 'DESC')
            ->limit(3)
            ->get();

        // requête pour le nombre de posts
        $dashboard['countPosts'] = count(DB::table('posts')->get());
        
        // requête pour les qcms les plus récents
        $dashboard['qcmsRecent'] = DB::table('qcms')
            ->select('id','title','created_at', 'status')
            ->orderBy('created_at', 'DESC')
            ->limit(3)
            ->get();
        
        // requête pour le nombre de posts
        $dashboard['countQcms'] = count(DB::table('qcms')->get());
        
        // Requête pour le nombre total de commentaire
        $dashboard['statComments'] = DB::table('comments')->count();

        // Requête pour le nombre total de QCM
        $dashboard['statQcms'] = DB::table('qcms')
            ->select(DB::raw('count(id) as stat'))
            ->where('status','=','published')
            ->pluck('stat')
            ->first();

        // Requête pour le nombre total d' élève 
        $dashboard['statEleves'] = DB::table('users')
            ->select(DB::raw('count(id) as stat'))
            ->where('role','=','final_class')
            ->orWhere('role','=', 'first_class')
            ->pluck('stat')
            ->first();
         
        return $dashboard;
    }


}


