<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;

class EmployerAdminController extends Controller
{
    public function index()
    {
        $employers = Employer::latest()->paginate(10);
        $users = User::all();
        return view('admin.employers.index', [
            'employers' => $employers,
            'users' => $users
        ]);
    }

    public function destroy(Employer $employer)
    {
        $employer->delete();
        
        return redirect()->route('admin.employers')->with('success', 'Employer deleted successfully!');
    }
}
