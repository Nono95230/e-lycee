<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Repositories\DashboardRepository;
use App\User;


class DashboardController extends Controller
{

    /**
     * Retourne la vue avec les infos nécessaire (stats articles, stats QCM, stats commentaire)
     *
     * @param DashboardRepository $repository => for controller traitement
     * @return redirect view dashboard teacher 
    */
    public function index(DashboardRepository $repository) {

        $this->authorize('teacher', User::class);

        $dashboard = $repository->getDashboard();

        return view('back.teacher.dashboard',[
            'title'         => 'Tableau de Bord',
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
