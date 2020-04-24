@extends('layouts.app2')

@section('title', 'Tambah Outlet')

@section('content')
<div class="row">
    <div class="col-8">
        <form action="{{ route('outlet.update',$outlet->id) }}" method="post" class="card">
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
                            <label class="form-label">Nama Outlet</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama Outlet" value="{{ $outlet->name }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" name="address" rows="6" placeholder="Alamat Outlet">{{ $outlet->address }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="form-label">No Telp.</label>
                            <input type="text" class="form-control" name="phone" placeholder="Telp Outlet" value="{{ $outlet->phone }}" required>
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
