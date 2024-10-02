<?php

namespace App\Http\Controllers;
use App\Models\user;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=user::All();

        return view('MPengguna.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('MPengguna.create' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5',
            'username' => 'required|string|min:4|unique:users,username',
            'jabatan' => 'required',
            'divisi' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

       user::create ([
        'name'=>$request->input('name'),
        'username'=>$request->input('username'),
        'jabatan'=>$request->input('jabatan'),
        'divisi'=>$request->input('divisi'),
        'email'=>$request->input('email'),
        'password'=>$request->input('password'),
       ]);

        return redirect('mpengguna')->with('success', 'Data Berhasi Disimpan.');
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
        $users = user::findOrFail($id);
        return view('MPengguna.edit', compact('users'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|min:5',
            'username' => 'required',
            'jabatan' => 'required',
            'divisi' => 'required',
            'email' => 'required',
            'password' => 'nullable',
        ]);

        $users=[
            'name'=>$request->input('name'),
            'username'=>$request->input('username'),
            'jabatan'=>$request->input('jabatan'),
            'divisi'=>$request->input('divisi'),
            'email'=>$request->input('email'),
            'password'=>$request->input('password'),
           ];

           user::where('id',$id)->update($users);
            return redirect('mpengguna')->with('success', 'Data Berhasi Diubah.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = user::where('id', $id)->firstOrFail(); {
            $users->delete();
            return redirect('mpengguna')->with('success', 'Data Berhasi Dihapus.');
        }
    }
}
