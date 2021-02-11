<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyEmail;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class EmailController extends Controller
{
    public function index(){
        return view('mail.testmail');
    }
     // ------------- [ Send email ] --------------------
     public function sendEmailToUser() {


        $to_email = Auth::user()->email;

        Mail::to($to_email)->send(new MyEmail);
        Alert::toast('Your Report has been Successfuly sendet you will recieve an email verification', 'success');

        return view('user.index');

    }
}
