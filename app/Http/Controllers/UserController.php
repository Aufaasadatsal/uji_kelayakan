<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $user = User::where('role', 'staff')->get();
        return view('user.index', compact('user'));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.create');
    }

    
    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|min:3',
        'email' => 'required|unique:users,email',
        
    ]);

    $pass = substr($request->email, 0, 3) . substr ($request->name, 0, 3);
    $role = 'staff';
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($pass),
        'role' => $role,

    ]);

    return redirect()->route('user.create')->with('success', 'Akun Berhasil dibuat!');
    }

    


    public function edit(User $user, $id)
    {
        $user = user::find($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
        {
            $user = User::find($id);
    
            if (!$user) {
                return redirect()->route('akun.index')->with('error', 'Akun tidak ditemukan.');
            }
    
            $request->validate([
                'name' => 'required|min:3',
                'email' => 'required|email|unique:users,email,' . $id,
            ]);
    
            if ($request->password) {
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                  
                    'password' => Hash::make($request->password),
                ]);
            } else {
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                 
                ]);
            }
    
            return redirect()->route('user.home')->with('success', 'Akun berhasil diperbarui.');
        }

    public function destroy($id)
    {
        User::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil Menghapus data!');
    }

    public function loginAuth(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        $user = $request->only(['email', 'password']);
        if(Auth::attempt($user)){
            return redirect()->route('home.page')->with('message', 'Login berhasil');
        }else{
            return redirect()->back()->with('failed', 'Proses login gagal');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('logout', 'Anda telah logout');
    }

    
}