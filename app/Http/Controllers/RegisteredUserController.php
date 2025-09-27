<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\User;
use GuzzleHttp\ClientInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Laravel\Socialite\Facades\Socialite;

class RegisteredUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userAttributes =  $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => ['required', 'confirmed', Password::min(6)],
        ]);

        $employerAttributes = $request->validate([
            'employer' => 'required|string|max:255',
            'logo' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $user = User::create($userAttributes);

        // $logoPath = $request->logo->store('logos');

        $logoFile = $request->file('logo');
        $logoName = $logoFile->hashName();
        $logoFile->storeAs('logo', $logoName, 'public');

        $user->employer()->create([
            'name' => $employerAttributes['employer'],
            'logo' => $logoName
        ]);

        Auth::login($user);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
