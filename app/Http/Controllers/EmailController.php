<?php

namespace App\Http\Controllers;

use App\Mail\DemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index()
    {
        $email = "narushevich.maksim@gmail.com";
        Mail::to($email)->send(new DemoMail());
        return view('welcome');
    }
}
