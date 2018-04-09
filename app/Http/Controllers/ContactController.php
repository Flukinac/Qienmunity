<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;



class ContactController extends Controller
{
    public function sendContact($text, $subject){
        mail::send(['text'=>$text],['name','naam'],function($message, $subject){
            $message->to('sevisser1@gmail.com','aan mij')->subject($subject);
            $message->from('sevisser1@gmail.com','mijzlef');
    });
    }
}
