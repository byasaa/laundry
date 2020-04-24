<?php

namespace App\Http\Controllers;

use App\Outlet;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('created_at', 'desc')->paginate(5);
        return view('user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $outlet = Outlet::all();
        $role = ['admin', 'kasir', 'owner'];
        return view('user.create',compact('outlet', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'outlet_id' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
        ]);
        $data = [
            'outlet_id' => $request->outlet_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ];
        if(User::create($data)){
            return redirect()->route('user.index')->with([
                'type' => 'success',
                'msg' => 'User ditambahkan'
            ]);
        }else{
            return redirect()->route('user.index')->with([
                'type' => 'danger',
                'msg' => 'Err.., Terjadi Kesalahan'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $outlet = Outlet::all();
        $role = ['admin', 'kasir', 'owner'];
        return view('user.edit',compact('user', 'outlet', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'outlet_id' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
        ]);

        $data = [
            'outlet_id' => $request->outlet_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ];
        $userData = User::find($user->id);
        if($userData->update($data)){
            return redirect()->route('user.index')->with([
                'type' => 'success',
                'msg' => 'User diupdate'
            ]);
        }else{
            return redirect()->route('user.index')->with([
                'type' => 'danger',
                'msg' => 'Err.., Terjadi Kesalahan'
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->delete()){
            return redirect()->route('user.index')->with([
                'type' => 'success',
                'msg' => 'User dihapus'
            ]);
        }else{
            return redirect()->route('user.index')->with([
                'type' => 'danger',
                'msg' => 'Err.., Terjadi Kesalahan'
            ]);
        }
    }
}
