<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

class LoginController extends Controller
{

    public function login(Request $request) {

		if($request->isMethod('post'))
		{

			$this->validate($request, [
				'username' => 'bail|required',
				'password' => 'bail|required',
				'remember' => 'in:on'
			]);
			// vérifions maintenant que l'utilisateur à les droit pour accèder à notre espace sécurité, pensez à faire un use Auth 
			if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){

				$userName = Auth::user()->username;

				$message = [
					'success',
					sprintf('Bienvenue %s',$userName)
				];
				session()->flash('message', $message); // enregistrer en variable de session

				return redirect()->intended('member/dashboard'); // redirection propre au niveau de la sécurité


			}

			$message = [
				'error',
				sprintf('Mot de passe ou Nom d\'utilisateur invalide')
			];

			session()->flash('message', $message);

			return back()->withInput(['username' => $request->username]);

		}
        
        return view('auth.login');

    }

    public function logout(){

        $userName = Auth::user()->username;

        Auth::logout();

        $message = [
            'success',
            sprintf('Merci de votre Visite %s', $userName)
        ];
        session()->flash('message', $message);

        return redirect()->home();
    }
}
