<?php

namespace App\Repositories;

use Illuminate\Http\Request;

use Mail;
use App\Mail\OrderShipped;

class ContactRepository{

    /**
     * Sert à envoyer un mail au propriétaire du site
     *
     * @param Request $request
     * @return message in Session
    */
    public function sendContactMessage($request){

        $param = array();
        $param['mailDestinataire']  = env('MAIL_FROM_ADDRESS');
        $param['nameDestinataire']  = env('MAIL_FROM_NAME');
        $param['mailContact']       = $request->email;
        $param['mailSubject']       = $request->subject;
        $param['mailContent']       = $request->commentaire;
        $param['mailDate']          = date('\E\n\v\o\y\é \l\e Y-m-d \à H:i:s');

        Mail::to('amine.brakni@gmail.com')->send(new OrderShipped($param));

        
        $message = [
            'success',
            sprintf('Merci de nous avoir contacté ! Un mail récapitulatif a été envoyé à l\'administrateur du site.')
        ];
        
        return $message;
    }


}


