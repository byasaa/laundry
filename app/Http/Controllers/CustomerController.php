<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::orderBy('created_at', 'desc')->paginate(5);
        return view('customer.index',compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
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
            'gender' => 'required',
            'phone' => 'required',
        ]);

        if(Customer::create($request->all())){
            return redirect()->route('customer.index')->with([
                'type' => 'success',
                'msg' => 'Customer ditambahkan'
            ]);
        }else{
            return redirect()->route('customer.index')->with([
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
    public function edit(Customer $customer)
    {
        return view('customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
            'gender' => 'required',
            'phone' => 'required',
        ]);

        $customerData = Customer::find($customer->id);
        if($customerData->update($request->all())){
            return redirect()->route('customer.index')->with([
                'type' => 'success',
                'msg' => 'Customer diupdate'
            ]);
        }else{
            return redirect()->route('customer.index')->with([
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
    public function destroy(Customer $customer)
    {
        if($customer->delete()){
            return redirect()->route('customer.index')->with([
                'type' => 'success',
                'msg' => 'Customer dihapus'
            ]);
        }else{
            return redirect()->route('customer.index')->with([
                'type' => 'danger',
                'msg' => 'Err.., Terjadi Kesalahan'
            ]);
        }
    }
    public function getCustomer(Request $request){
        if ($request->has('search')) {
            $cari = $request->search;
    		$data = Customer::where('name', 'LIKE', '%'.$cari.'%')->get();
            return response()->json($data);
    	}
    }
}
