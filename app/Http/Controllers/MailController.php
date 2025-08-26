<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Exception;
class MailController extends Controller
{
    public function showForm()
    {
        return view('emails.form');
    }

    public function sendMail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name'  => 'required|string|max:255',
        ]);

        try {
            Mail::to($request->email)->send(new WelcomeMail($request->name));
            return "Mejl poslat na: {$request->email}";
        } catch (Exception $e) {
            return "Došlo je do greške: ".$e->getMessage();
        }
    }
}
