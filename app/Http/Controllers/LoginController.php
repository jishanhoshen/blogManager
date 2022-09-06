<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Exception;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToSocial($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
            $finduser = User::where('social_id', $user->id)
                ->where('email', $user->email)
                ->where('block',0)
                ->first();
            if ($finduser) {
                Auth::login($finduser, true);
                return redirect('/');
            } else {
                $findemail = User::where('email', $user->email)
                ->first();
                $isBlock = User::where('email',$user->email)->where('block', 1)->first();
                if (!$findemail) {
                    $username = ($user->name) ? $user->name : $user->nickname;
                    $newUser = User::create([
                        'name' => $username,
                        'email' => $user->email,
                        'password' => bcrypt('nopassword'),
                    ]);
                    $newUser->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
                    $newUser->social_id = $user->id;
                    $newUser->provider = $provider;
                    $newUser->avatar = $user->avatar;
                    $newUser->save();

                    Auth::login($newUser, true);
                    return redirect('/');
                }
                if($isBlock){
                    return redirect('/login')->with('error', 'Your account has been temporarily blocked');
                } else {
                    $isSocial = User::where('social_id', $user->id)
                    ->where('block',0)
                    ->first(); //false
                    if ($findemail && !$isSocial) {
                        $findemail->email_verified_at = Carbon::now()->format('Y-m-d H:i:s');
                        $findemail->social_id = $user->id;
                        $findemail->provider = $provider;
                        $findemail->avatar = $user->avatar;
                        $findemail->save();
                        Auth::login($findemail, true);
                        return redirect('/');
                    } else {
                        return redirect('/login')->with('error', 'This email address is already being used');
                    }
                }
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
