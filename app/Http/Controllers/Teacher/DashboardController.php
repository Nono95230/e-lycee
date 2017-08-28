<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Repositories\DashboardRepository;


class DashboardController extends Controller
{

    public function index(DashboardRepository $repository) {

        $dashboard = $repository->getDashboard();

        return view('back.teacher.dashboard',[
            'title'         => 'Dashboard',
            'postsRecent'   => $dashboard['postsRecent'],
            'countPosts'    => $dashboard['countPosts'],
            'qcmsRecent'    => $dashboard['qcmsRecent'],
            'countQcms'     => $dashboard['countQcms'],
            'statComments'  => $dashboard['statComments'],
            'statQcms'      => $dashboard['statQcms'],
            'statEleves'    => $dashboard['statEleves']
        ]);
    }
}
