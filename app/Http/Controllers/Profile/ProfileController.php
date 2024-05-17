<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\CurrentPasswordRule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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
    public function updateProfile(User $user)
    {

        $data = request()->validate([
            'name' => ['required'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
        ]);

        $user->update($data);

        return redirect()->back()->with('success', 'Profile Updated');
    }
    public function updatePassword(User $user)
    {

        $data = request()->validate([
            'current_password' => ['required',new CurrentPasswordRule],
            'new_password' => ['required', 'min:8', 'confirmed'],
        ]);

        $user->password = Hash::make($data['new_password']);
        $user->save();

        return redirect()->back()->with('success', 'Password Updated.');
    }
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome')->with('success', 'Your account has been deleted.');
    }
}
