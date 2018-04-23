<?php

namespace App\Http\Controllers;

use Mail;
use App\User;
use App\Profile;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Mail;
use App\Http\Requests;
use App\Http\Controllers\Controller;



class ContactController extends Controller
{
    public function sendContact(Request $request){
        $title = $request->json()->all()['subject'];
        $mail = $request->json()->all()['text'];
        $sendFrom = auth()->user()->name;
        $replyTo = auth()->user()->email;
         
        mail::send('mailTemplate', ['content' => $mail,'sendFrom' => $sendFrom, 'replyTo' => $replyTo] ,function($message) use ($title){
            
            $message->subject($title);
            $message->from('sevisser1@gmail.com','Qienmunity');
            $message->to('sevisser1@gmail.com');
   
        });
        
    }
    public static function notifyMail($id, $afzenderControl){
        $afzenderControl == "comm" ? $afzender = "communitypost" : $afzender = "nieuwspost";
        $user = User::where('id', $id)->get();
        $AllMail = Profile::select('email')->get();
        $mail = "Er is zojuist een ".$afzender." gedaan door ".$user[0]['name'];
        $subject = $afzender;
        
       	ContactController::notifyMailTo($mail, $AllMail, $subject); 
    }
    public static function notifyMailTo($mail, $AllMail, $subject){
        foreach($AllMail as $email){
          $emailCurrent = $email['email'];
            if(!empty($emailCurrent)){
                mail::send('mailTemplate', ['content' => $mail,'sendFrom' => "Qienmunity", 'replyTo' => " "] ,function($message) use ($subject, $emailCurrent){

                    $message->subject($subject);
                    $message->from('qiencommunity@gmail.com');
                    $message->to($emailCurrent);

                });
            }
        }
    }
}

 
 