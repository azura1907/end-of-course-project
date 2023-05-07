<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendTaskNoti;

class SendMailController extends Controller
{
    public function send () {
        $data = [
            'name' => 'Test',
            'school' => 'Green'
        ];

        Mail::to('test123@gmail.com')->send(new SendTaskNoti($data));
        // return view('auth.login');
    }
}
