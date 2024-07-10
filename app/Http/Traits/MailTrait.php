<?php

namespace App\Http\Traits;
use Illuminate\Support\Facades\Http;

trait MailTrait
{


    public function sendMailTrait($template, $email = 'arslanrajput386@gmail.com', $subject = 'Help Email')
    {

        $response = Http::withHeaders([
            'accept' => 'application/json',
            'api-key' => env('MAIL_API_KEY','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'),
            'content-type' => 'application/json',
        ])->post('https://api.brevo.com/v3/smtp/email', [
            'sender' => [
                'name' => 'People Builder',
                'email' => 'arslanrajput386@gmail.com',
            ],
            'to' => [
                [
                    'email' => $email,
                    'name' => 'People Builder',
                ],
            ],
            'subject' => $subject,
            'htmlContent' => $template,
        ]);

        $data = $response->json();

        return $data;

    }


    public function helpRender($request)
    {
        return view('emails.get_in_touch_email', [
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'phone_number' => $request['phone_number'],
            'email' => $request['email'],
            'message' => $request['message'],
        ])->render();
    }

    public function userMailBoxRender($request)
    {
        return view('emails.mailbox_money_to_user', [
            'name' => $request['name'],
            'email' => $request['email']
        ])->render();
    }

    public function adminMailBoxRender($request)
    {
        return view('emails.mailbox_money_to_admin', [
            'name' => $request['name'],
            'email' => $request['email']
        ])->render();
    }

}
