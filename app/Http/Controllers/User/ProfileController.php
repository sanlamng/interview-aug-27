<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public $settings;

    public $page;

    public function __construct()
    {
        $this->page = 'Profile';
    }

    public function index()
    {
        $page['title'] = $this->page;
        $page['description'] = "Edit Profile";
        $user = auth()->user();
        return view('user.profile', compact('page','user'));
    }

    public function update(Request $request, $id)
    {
    	$user = user::findOrFail($id);
        $request->validate([
            'name' => 'required|max:255',
            'dob' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore($user->id)
            ],
            'phone' => [
                'required',
                Rule::unique('users')->ignore($user->id)
            ]
        ],[], ['name' => 'full name', 'phone' => 'phone number', 'dob' => 'Date of birth']);
        //Validation ok, update user info
        $input = $request->except(['_method', '_token']);
        $user->update($input);
        $request->session()->flash('status', 'Profile Info Saved');
        return back();
    }

    public function changePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);
        //validate password modification
        $request->validate([
            'password' => 'confirmed|min:8|max:40',
        ]);
        $user->update([
            'password' => Hash::make($request->input('password'))
        ]);
        $request->session()->flash('status', 'Profile password changed');
        return back();
    }
}
