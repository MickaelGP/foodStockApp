<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.dashboard');
    }
    public function editProfile(User $user)
    {
        return view('profile.edit', compact('user'));
    }
}
