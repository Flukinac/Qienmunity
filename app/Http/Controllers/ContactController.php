<?php

namespace App\Http\Controllers;

use Mail;
use App\User;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;



class ContactController extends Controller
{
    public function sendContact(Request $request){
        $title = $request->json()->all()['subject'];
        $content = $request->json()->all()['text'];
        
        mail::send('contact', ['title' => $title, 'content' => $content] ,function($message){
            $message->to('sevisser1@gmail.com','aan mij');
            $message->from('sevisser1@gmail.com','mijzlef');
            $message->subject('Laravel Basic Testing Mail');
        });
        echo "Basic Email Sent. Check your inbox.";
    }
}

 
 