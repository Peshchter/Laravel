<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class SocialLoginController extends Controller
{
    public function loginVK()
    {
        session()->get('soc_token');
        if (Auth::id())
        {
            return redirect()->route('home');
        }
        return Socialite::with('vkontakte')->redirect();
    }

    public function responseVK(UserRepository $repo)
    {
        if (Auth::id())
        {
            return redirect()->route('home');
        }
        $user = Socialite::driver('vkontakte')->user();
        session(['soc_token'=>$user->token]);
        $userInSystem = $repo->getUserBySocId($user, 'vk');
        Auth::login($userInSystem);
        return redirect()->route('home');
    }
}
