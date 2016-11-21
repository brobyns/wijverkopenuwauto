<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactRequest(Request $request){

        $data = $request->all();
        $validator = $this->validator($data);

        if ($validator->fails()) {
            return Redirect::to('contact')
                ->withErrors($validator)
                ->withInput();
        }

        Mail::send('emails.feedback', $data, function($msg) use ($data)
        {
            //$message->from($data['email'] , $data['first_name']); uncomment if using first name and email fields
            //$msg->from('feedback@gmail.com', 'feedback contact form');
            //email 'To' field: change this to emails that you want to be notified.
            $msg->sender('bramrobyns@gmail.com');
            $msg->to('bramrobyns@hotmail.com', 'Bram')->subject($data['subject']);
        });

        return redirect('contact')
            ->with('message', 'Your message has been sent. Thank You!');

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|min:5',
            'msg' => 'required|min:5',
            'g-recaptcha-response' => 'required|captcha'
        ]);
    }
}
