<?php

namespace App\Http\Controllers;

use App\Outlet;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::orderBy('created_at', 'desc')->paginate(5);
        return view('product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = [
            'kiloan',
            'bed_cover',
            'selimut',
            'kaos',
            'lain'
        ];
        $outlet = Outlet::all();
        return view('product.create', compact('type', 'outlet'));
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
            'type' => 'required',
            'price' => 'required|numeric'
        ]);
        if(Product::create($request->all())){
            return redirect()->route('product.index')->with([
                'type' => 'success',
                'msg' => 'Product ditambahkan'
            ]);
        }else{
            return redirect()->route('product.index')->with([
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
    public function edit(Product $product)
    {
        $type = [
            'kiloan',
            'bed_cover',
            'selimut',
            'kaos',
            'lain'
        ];
        $outlet = Outlet::all();
        return view('product.edit', compact('product','type', 'outlet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'outlet_id' => 'required',
            'name' => 'required|max:255',
            'type' => 'required',
            'price' => 'required|numeric'
        ]);
        $productData = Product::find($product->id);
        if($productData->update($request->all())){
            return redirect()->route('product.index')->with([
                'type' => 'success',
                'msg' => 'Product Diupdate'
            ]);
        }else{
            return redirect()->route('product.index')->with([
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
    public function destroy(Product $product)
    {
        if($product->delete()){
            return redirect()->route('product.index')->with([
                'type' => 'success',
                'msg' => 'Product dihapus'
            ]);
        }else{
            return redirect()->route('product.index')->with([
                'type' => 'danger',
                'msg' => 'Err.., Terjadi Kesalahan'
            ]);
        }
    }
}
