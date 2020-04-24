@extends('layouts.app2')

@section('title', 'Edit Product')

@section('content')
<div class="row">
    <div class="col-8">
        <form action="{{ route('product.update',$product->id) }}" method="post" class="card">
            <div class="card-header">
                <h3 class="card-title">@yield('title')</h3>
            </div>
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
                        @method('put')
                        <div class="form-group">
                            <label class="form-label">Outlet</label>
                            <select name="outlet_id" id="outlet_id" class="form-control select">
                                @foreach ($outlet as $item)
                                    <option value=""></option>
                                    <option value="{{ $item->id }}" {{ ( $item->id == $product->outlet_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Masukan Nama Product" value="{{ $product->name }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Type</label>
                            <select name="type" id="type" class="form-control select">
                                @foreach ($type as $item)
                                    <option value=""></option>
                                    <option value="{{ $item }}" {{  ( $item == $product->type) ? 'selected' : ''  }}>{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" placeholder="Masukan Harga" value="{{ $product->price }}" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
                <div class="d-flex">
                    <a href="{{ url()->previous() }}" class="btn btn-link">Batal</a>
                    <button type="submit" class="btn btn-primary ml-auto">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('js')
<script>
    require(['jquery', 'selectize'], function ($, selectize) {
        $(document).ready(function () {
            $('.select').selectize({});
        });
    });
</script>
@endsection
