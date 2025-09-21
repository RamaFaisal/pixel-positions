<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('admin.user-admin', [
            'users' => $users,
        ]);
    }

    public function create()
    {

    }
}
