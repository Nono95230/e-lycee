<?php 
namespace App\Http\Controllers\Member;

use Auth;

trait UserMember{
	

	public function setUser(){
    
    	view()->composer('layouts.back', function ($view) {
        
        	$user = Auth::user();
            
            $view->with('user', $user);
            $userStatut ='toto';
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


}