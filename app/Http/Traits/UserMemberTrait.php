<?php 
namespace App\Http\Traits;

use Auth;

trait UserMemberTrait{
	
     /**
     * Retourne le rôle de l'user
     *
     * @return view userStatut
    */
    public function setUser(){
    
        view()->composer('layouts.back', function ($view) {
        
            $user = Auth::user();
            
            $view->with('user', $user);
            $userStatut ='...';
            if ($user->role === 'first_class') {
                $userStatut = 'Elève de première';
            } else if($user->role === 'final_class') {
                $userStatut = 'Elève de terminale';
            } else if($user->role === 'teacher') {
                $userStatut = 'Enseignant';
            }
            
            $view->with('userStatut', $userStatut);

        });
    }

     /**
     * Retourne le rôle de l'user
     *
     * @return view userStatut
    */
    public function takeUser(){
    
        view()->composer('layouts.front', function ($view) {

            $user = Auth::user();
            $view->with('user', $user);

            if ($user !== null) {
                
                if ($user->role === 'first_class') {
                    $userStatut = 'Elève de première';
                } else if($user->role === 'final_class') {
                    $userStatut = 'Elève de terminale';
                } else if($user->role === 'teacher') {
                    $userStatut = 'Enseignant';
                }
                
                $view->with('userStatut', $userStatut);

            }
        
        });
    
    }


}