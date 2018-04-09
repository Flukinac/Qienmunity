<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;



class ContactController extends Controller
{
    public function sendContact(Request $request){
        $mail = $request->json()->all();
        $data = array('name'=>$mail['subject']);
        
        mail::send(['text'=>$mail['text']], $data ,function($message){
            $message->to('sevisser1@gmail.com','aan mij')->subject('Laravel Basic Testing Mail');
            $message->from('sevisser1@gmail.com','mijzlef');
        });
        echo "Basic Email Sent. Check your inbox.";
    }
}

       
 