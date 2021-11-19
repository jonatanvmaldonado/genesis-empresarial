<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::orderBy('name', 'ASC')->get();

        return view('users.index', [
            'users' => $users
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8']
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return back();
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('users.show', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', 'unique:users']
        ]);

        $u = User::find($request->id);
        $u->name = $request->name;
        $u->email = $request->email;
        if ($request->password) {
            $u->password = bcrypt($request->password);
        }
        $u->save();

        return back();
    }
}
