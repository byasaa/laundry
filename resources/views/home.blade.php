@extends('layouts.app2')

@section('content')
<div class="page-header">
    <h1 class="page-title">
        Dashboard
    </h1>
</div>

<div class="row">
    <div class="col-6 col-sm-3 col-lg-3">
        <div class="card">
            <div class="card-body p-3 text-center">
            <div class="h1 m-0"><i class="fe fe-user"></i> {{ $user }}</div>
            <div class="text-muted mb-4">Total User</div>
            </div>
        </div>
    </div>

    <div class="col-6 col-sm-3 col-lg-3">
        <div class="card">
            <div class="card-body p-3 text-center">
            <div class="h1 m-0"><i class="fe fe-users"></i> {{ $customer }}</div>
            <div class="text-muted mb-4">Total Customer</div>
            </div>
        </div>
    </div>

    <div class="col-6 col-sm-3 col-lg-3">
        <div class="card">
            <div class="card-body p-3 text-center">
            <div class="h1 m-0"><i class="fe fe-package"></i> {{ $product }}</div>
            <div class="text-muted mb-4">Total Produk</div>
            </div>
        </div>
    </div>

    <div class="col-6 col-sm-3 col-lg-3">
        <div class="card">
            <div class="card-body p-3 text-center">
            <div class="h1 m-0"><i class="fe fe-home"></i> {{ $outlet }}</div>
            <div class="text-muted mb-4">Total Outlet</div>
            </div>
        </div>
    </div>

</div>
@endsection
