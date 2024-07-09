<?php

namespace App\Http\Traits;
use Illuminate\Support\Facades\Http;

trait MailTrait
{


    public function sendMailTrait($template, $email = 'tayyebkodex@gmail.com', $subject = 'Help Email')
    {

        $response = Http::withHeaders([
            'accept' => 'application/json',
            'api-key' => env('MAIL_API_KEY'),
            'content-type' => 'application/json',
        ])->post('https://api.brevo.com/v3/smtp/email', [
            'sender' => [
                'name' => 'People Builder',
                'email' => 'mubeen.kodex@gmail.com',
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
