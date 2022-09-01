<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{

    public function __construct()

    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectToGoogle()

    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback()
    {
        $dbuser = Auth::user();
        try {
            $user = Socialite::driver('google')->user();
            
            $finduser = User::where('google_id', $user->id)->first();
            
            if ($finduser) {
                dd($finduser);

                // Auth::login($finduser);
                // Auth::attempt([$user->email,$user->id],true);
                // return redirect('admin/dashboard');
            } else {
                // $newUser = User::create([
                //     'name' => $user->name,
                //     'email' => $user->email,
                //     'google_id' => $user->id,
                //     'password' => encrypt('nopassword'),
                //     'email_verified_at' => now(),
                // ]);

                // Auth::login($newUser);
                // Auth::attempt([$user->email,$user->id],true);
                // return redirect('admin/dashboard');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
