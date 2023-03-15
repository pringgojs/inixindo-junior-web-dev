<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::search()->with('role')->orderBy('created_at', 'desc')->paginate(10);
        $role = Role::all();
        return view('user.index', ['users' => $user, 'roles' => $role]);
    }

    public function create()
    {
        $view = view('user.form');
        $view->role = Role::all();
        $view->user = new User;

        return $view;
    }

    public function edit($id)
    {
        $view = view('user.form');
        $view->role = Role::all();
        $view->user = User::findOrFail($id);

        return $view;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
        ]);

        if (!$request->id) {
            $request->validate([
                'password' => 'required'
            ]);
        }

        if ($request->password  && $request->repassword) {
            if ($request->password != $request->repassword) {
                return redirect()->back()->with(['error' => 'Re-entry password tidak sama']);
            }
        }

        $user = $request->id ? User::findOrFail($request->id) : new User;
        $user->name = $request->name;
        $user->email = $request->email;
        
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->role_id = $request->role_id;
        $user->save();
        
        return redirect('users')->with(['success' => 'Berhasil tambah user']);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('users')->with(['success' => 'Berhasil hapus user']);
    }

}
