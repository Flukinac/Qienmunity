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
    public function contactIndex() {
        $request = (object) [
            'subject' => '',
            'text' => ''
            ];
        return view('/contact')->with('request', $request);
    }

    public function sendContact(Request $request) {
        $this->validate($request, [
            'subject' => 'required | min:3',
            'text' => 'required | min:3'
        ],[
            'subject.required' => 'Het onderwerpveld moet ingevuld worden',
            'subject.min' => 'Voer minimaal 3 karakters in',
            'text.required' => 'Het berichtveld moet ingevuld worden',
            'text.min' => 'Voer mininmaal 3 karakters in'
        ]);

        $title = $request->input('subject');
        $mail = $request->input('text');
        $sendFrom = auth()->user()->name;
        $replyTo = auth()->user()->email;

        mail::send('mailTemplate', ['content' => $mail,'sendFrom' => $sendFrom, 'replyTo' => $replyTo] ,function($message) use ($title, $replyTo) {
            $message->subject($title);
            $message->from($replyTo, 'Qienmunity');
            $message->to('paul.vedeeen@qien.nl');
        });

        if (count(mail::failures()) > 0) {
            $error = 'foutje';

            $request->session()->put('error', 'Fout bij versturen. Probeer het nog eens');

            return view('/contact')->with(compact('request', 'error'));

        } else {
            return redirect('/home')->with('success', 'Bericht verzonden');
        }
    }

    public static function notifyMail($id, $subject) {
        $user = User::where('id', $id)->get();
        $AllMail = Profile::select('email')->get();
        $mail = "Er is zojuist iets gepost op de ".$subject."pagina door ".$user[0]['name'];
        
       	ContactController::notifyMailTo($mail, $AllMail, $subject);
    }
   
    public static function notifyMailTo($mail, $AllMail, $subject) {
        foreach ($AllMail as $email) {
          $emailCurrent = $email['email'];
          $auth = User::select('notificatie')->where('email', $emailCurrent)->get();
            if (!empty($emailCurrent && $auth == '[{"notificatie":1}]')) {
                mail::send('mailTemplateNotify', ['content' => $mail,'sendFrom' => "Qienmunity",'user' => $emailCurrent, 'link'=>$subject] ,function($message) use ($subject, $emailCurrent) {
                    $message->subject($subject);
                    $message->from('qiencommunity@gmail.com');
                    $message->to($emailCurrent);
                });
            }           
        }
    }
    
    public static function sendMailNewUser($data) {
        if ($data['rol'] == 0) {
           $data['rol'] = "Admin";
        } elseif ($data['rol'] == 1) {
           $data['rol'] = "Trainee";
        } elseif ($data['rol'] == 2) {
           $data['rol'] = "Docent";
        }
        $subject = "Inloggegevens Qienmunity";
        $emailCurrent = $data['email'];
        mail::send('mailRegister',['content' => $data,'sendFrom' => "Qienmunity", 'replyTo' => " "] ,function($message) use ($subject, $emailCurrent) {
            $message->subject($subject);
            $message->from('qiencommunity@gmail.com');
            $message->to($emailCurrent);
        });
    }
}

 
 