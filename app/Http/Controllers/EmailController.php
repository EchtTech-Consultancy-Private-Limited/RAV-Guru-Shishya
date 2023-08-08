<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendMail;

class EmailController extends Controller
{
    public function index()
    {
        $testMailData = [
            'title' => 'You have successfully registered',
            'body' => 'Welcome to RAV Guru Shishya Parampara Portal. Please login on the portal with your login details'
        ];

        Mail::to('garv.sxn@gmail.com')->send(new SendMail($testMailData));

        dd('Success! Email has been sent successfully.');
    }
}