<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // dd($request->password_confirmation);
        $request->validate([
            'name'=>'required',           
            'email'=>'required',          
            'password' => 'required|confirmed'          
        ]);

        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password=bcrypt($request->password);
        $user-> save();

        return redirect()->route('admin.user.edit', compact('user'))->with('info', 'El usuario se creó con exito');
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
    public function edit(User $user)
    {
     
      //  dd($user->name);       
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'=>'required',           
            'email'=>'required'  
        ]);
        
        //$user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        //$user->password=bcrypt($request->password);
        $user-> save();

        return redirect()->route('admin.user.edit', compact('user'))->with('info', 'El usuario se actualizó con exito');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
