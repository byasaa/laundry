<?php

namespace App\Http\Controllers;

use App\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlet = Outlet::orderBy('created_at','desc')->paginate(5);
        return view('outlet.index', compact('outlet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('outlet.create');
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
            'name' => 'required|max:255',
            'address' => 'required',
            'phone' => 'required',
        ]);

        if(Outlet::create($request->all())){
            return redirect()->route('outlet.index')->with([
                'type' => 'success',
                'msg' => 'Outlet ditambahkan'
            ]);
        }else{
            return redirect()->route('outlet.index')->with([
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
    public function edit(Outlet $outlet)
    {
        return view('outlet.edit',compact('outlet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outlet $outlet)
    {
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
            'phone' => 'required',
        ]);
        $outletData =Outlet::find($outlet->id);
        if($outletData->update($request->all())){
            return redirect()->route('outlet.index')->with([
                'type' => 'success',
                'msg' => 'Outlet Di Update'
            ]);
        }else{
            return redirect()->route('outlet.index')->with([
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
    public function destroy(Outlet $outlet)
    {
        if($outlet->delete()){
            return redirect()->route('outlet.index')->with([
                'type' => 'success',
                'msg' => 'outlet dihapus'
            ]);
        }else{
            return redirect()->route('outlet.index')->with([
                'type' => 'danger',
                'msg' => 'Err.., Terjadi Kesalahan'
            ]);
        }
    }
}
