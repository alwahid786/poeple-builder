<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\MailTrait;

class WebsiteController extends Controller
{
    //
    use MailTrait;
    public function MailBoxForm(Request $request)
    {

        // try {
        if ($request->isMethod('POST')) {

            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
            ]);

            $userTemplate = $this->userMailBoxRender($request->all());
            $adminTemplate = $this->adminMailBoxRender($request->all());

            $userEmail = $validatedData['email'];
            $userSubject = 'Mailbox Money Email';
            $sendMailToUser = $this->sendMailTrait($userTemplate, $userEmail, $userSubject);

            $adminEmail = 'info@donwilliamsglobal.com';
            $adminSubject = 'Mailbox Money Email';
            $sendMailToAdmin = $this->sendMailTrait($adminTemplate, $adminEmail, $adminSubject);

            if (!$sendMailToUser || !$sendMailToAdmin) {
                $request->session()->flash('error', 'Error sending mail');
            } else {
                $request->session()->flash('success', 'Your data has been submitted successfully.');
            }
        }
        // } catch (\Exception $e) {
        //     $request->session()->flash('error', $e->getMessage());
        //     return response()->view('pages.send-mailbox-money', [], 500);
        // }

        return view('pages.send-mailbox-money');


    }

}
