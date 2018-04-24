<?php

namespace App\Http\Controllers;

use Mail;
use App\User;
use App\Profile;
use Illuminate\Http\Request;
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
            $message->to('paul.veen@qien.nl');
   
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
          $auth = User::select('notificatie')->where('email', $emailCurrent)->get();
            if(!empty($emailCurrent && $auth == '[{"notificatie":1}]')){
                mail::send('mailTemplateNotify', ['content' => $mail,'sendFrom' => "Qienmunity", 'replyTo' => " ",'user' => $emailCurrent] ,function($message) use ($subject, $emailCurrent){

                    $message->subject($subject);
                    $message->from('qiencommunity@gmail.com');
                    $message->to($emailCurrent);
                });
            }           
        }
    }
    
    public static function sendMailNewUser($data){
        if($data['rol'] == 0){
           $data['rol'] = "Admin";
        }elseif($data['rol'] == 1){
           $data['rol'] = "Trainee";
        }elseif($data['rol'] == 2){
           $data['rol'] = "Docent";
        }
        $subject = "Inloggegevens Qienmunity";
        $emailCurrent = $data['email'];
        
                mail::send('mailRegister',['content' => $data,'sendFrom' => "Qienmunity", 'replyTo' => " "] ,function($message) use ($subject, $emailCurrent){

                    $message->subject($subject);
                    $message->from('qiencommunity@gmail.com');
                    $message->to($emailCurrent);
                });
    }
}

 
 