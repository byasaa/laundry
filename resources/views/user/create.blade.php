@extends('layouts.app2')

@section('title', 'Tambah User')

@section('content')
<div class="row">
    <div class="col-8">
        <form action="{{ route('user.store') }}" method="post" class="card">
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
                        <div class="form-group">
                            <label class="form-label">Outlet</label>
                            <select name="outlet_id" id="outlet_id" class="form-control select">
                                @foreach ($outlet as $item)
                                    <option value=""></option>
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Masukan Nama User" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Masukan Email User" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Masukan Password" value="{{ old('password') }}" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Role</label>
                            <select name="role" id="role" class="form-control select">
                                @foreach ($role as $item)
                                    <option value=""></option>
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
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
