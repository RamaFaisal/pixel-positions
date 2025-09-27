<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    public function githubRedirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubCallback()
    {
        $githubUser = Socialite::driver('github')->stateless()->user();
        $user = User::where('github_id', $githubUser->id)->first();

        if (!$user) {
            $user = User::where('email', $githubUser->email)->first();
            if ($user) {
                $user->github_id = $githubUser->id;
                $user->save();
            } else {
                $user = User::create([
                    'name' => $githubUser->name,
                    'email' => $githubUser->email,
                    'password' => encrypt('password'),
                    'github_id' => $githubUser->id,
                ]);
            }
        }
        auth()->login($user);

        return redirect('/');
    }
}


            
            // if (User::where('email', $githubUser->email)->exists()) {
            //     return redirect('/login')->with('error', 'Email already exists');
            // } else {
            //     $newUser = User::create([
            //         'name' => $githubUser->name,
            //         'email' => $githubUser->email,
            //         'password' => encrypt('password'),
            //         'github_id' => $githubUser->id,
            //     ]);
            // }