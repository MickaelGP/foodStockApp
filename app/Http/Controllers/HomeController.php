<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function register()
    {
        return view('register');
    }
    public function login()
    {
        return view('login');
    }
    public function contactMail(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required','email'],
            'description' => ['required', 'string', 'max:255'],
            'phone' => ['required','numeric'],
        ]);
        Mail::send(new Contact($data));
        return back()->with('success', 'Thanks for contacting us!');
    }
}
