@extends('layouts.app2')

@section('title', 'Buat Transaksi')

@section('content')
    <div class="page-header">
        <h1 class="page-title">
            @yield('title')
        </h1>
    </div>
    <div class="row">
        <div class="col-12 col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Transaksi</h3>
                </div>
                @if(session()->has('msg'))
                <div class="card-alert alert alert-{{ session()->get('type') }}" id="message" style="border-radius: 0px !important">
                    @if(session()->get('type') == 'success')
                        <i class="fe fe-check mr-2" aria-hidden="true"></i>
                    @else
                        <i class="fe fe-alert-triangle mr-2" aria-hidden="true"></i>
                    @endif
                        {{ session()->get('msg') }}
                </div>
                @endif
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            @csrf
                            <div class="form-group">
                                <label class="form-label">Customer</label>
                                <select name="customer_id" id="customer_id" class="form-control customer">
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label">Product</label>
                                        <select name="product_id[]" id="product_id[]" class="form-control">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <label class="form-label">Jumlah</label>
                                    <input type="number" name="qyt[]" class="form-control price">
                                </div>
                                <div class="col-2">
                                    <label class="form-label">hapus</label>
                                    <a href="#" class="btn btn-danger" id="remove_form"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                            <div class="add_product"></div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <button class="btn btn-block btn-primary" id="add_product"><i class="fa fa-plus"></i> Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/select2.min.css') }}">
@endsection
@section('js')
    <script>
        require(['jquery','mask', 'select2'], function ($, select2, mask) {
        $(document).ready(function () {
            function customer_select(selector,parent,url){
                $(selector).select2({
                   minimumInputLength: 1,
                   allowClear :true,
                   placeholder : 'Masukan Nama Customer' ,
                   theme : 'bootstrap',
                   dropdownParent : $(parent),
                   ajax: {
                       dataType : 'json',
                       url : url,
                       delay :200,
                       data : function(params){
                           return {
                               search : params.term
                           }
                       },
                       processResult : function (response) {
                           var results = [];
                           $.each(response, function(index, data) {
                                results.push({
                                    id: data.id,
                                    text: data.name + '('+data.phone+')'
                                });
                           });

                           return {
                               results: results
                           };
                       },
                   }
                });
            }
            function product_select(selector,parent){
                $(selector).select2({
                    dropdownParent : $(parent),
                    theme : 'bootstrap'
                })
            }

            customer_select('.customer', 'body', '{!! route('customer.getCustomer') !!}');
            product_select('.product', 'body');

            $("#add_product").click( function (e) {
        e.preventDefault();

        $('<div class="row" id="add_produk">'+
            '<div class="col">'+
                '<div class="form-group">'+
                    '<label class="form-label">Product</label>'+
                    '<select name="product_id[]" id="product_id[]" class="form-control product">'+
                        @foreach (App\Product::get() as $row)
                            '<option value="{{$row->id}}">{{$row->name}}</option>'+
                        @endforeach
                    '</select>'+
                '</div>'+
            '</div>'+

            '<div class="col-2">'+
                '<label class="form-label">Jumlah</label>'+
                '<input type="number" name="qyt[]" class="form-control price">'+
            '</div>'+

            '<div class="col-2">'+
                '<label class="form-label">hapus</label>'+
                '<a href="#" class="btn btn-danger" id="remove_form"><i class="fa fa-times"></i></a>'+
            '</div>'+
            '</div>').appendTo('.add_product');
        $('.harga').mask('9999999999',{placeholder: 'Harus Angka'});
    });
            $('body').on('click','#remove_form',function(e){
                e.preventDefault();
                $(this).parents('#add_produk').remove();
            });
        });
    });
    </script>
@endsection
