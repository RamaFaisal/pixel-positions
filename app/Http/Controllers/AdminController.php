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

    public function create() {
        //
    }

    public function update(Request $request, $id)
    {
        $userUpdate = $request->validate([
            'name' => 'required|string|max:255|unique:users,name,' . $id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|string|max:255',
        ]);
        
        $user = User::find($id);
        $user->update($userUpdate);

        return redirect()->route('admin.users')->with('success', 'User updated successfully!');
    }

    public function destory(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully!');
    }
}
