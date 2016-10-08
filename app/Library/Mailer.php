<?php
/**
 * Created by PhpStorm.
 * User: recai.cansiz
 * Date: 14.4.2016
 * Time: 17:42
 */

namespace App\Library;


use Illuminate\Support\Facades\Mail;

class Mailer
{
    public static function sendMailToUSer($user,$status)
    {
//        $subject = [
//            'subjectText'=> 'Hüdayi EDYS',
//            'fromText'=> 'Hüdayi Doküman Yönetim Sistemi Sayfası',
//            'toText'=>  "aaa",
//            'userMail' => $user->email,
//        ];
//        $data = [
//            'user_full_name'=> $user->first_name . ' ' . $user->last_name ,
//            'userMail' => $user->email,
//        ];
//
//        Mail::send('backend.partials.'.$status, $data, function($message) use ($subject) {
//            $message->from('azizmahmudhudayivakfi@gmail.com' ,$subject['fromText'] );
//            $message->to($subject['userMail'] ,$subject['toText'])
//                ->subject($subject['subjectText']);
//        });
    }

}
