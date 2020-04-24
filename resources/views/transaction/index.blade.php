@extends('layouts.app2')

@section('title', 'List Transaksi')

@section('content')
    <div class="page-header">
        <h1 class="page-title">
            @yield('title')
        </h1>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List Transaksi</h3>
                    <div class="card-options">
                        <a href="{{ route('transaction.export') }}" class="btn btn-primary btn-sm ml-2" download="true">Export</a>
                        <a href="#!cetak" class="btn btn-outline-primary btn-sm ml-2" id="mass-cetak">Cetak</a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table card-table table-hover table-vcenter text-wrap">
                        <thead>
                        <tr>
                            <th class="w-1">#</th>
                            <th>No. Invoice</th>
                            <th>Customer</th>
                            <th>Tanggal</th>
                            <th>Batas Waktu</th>
                            <th>Diskon</th>
                            <th>Jumlah</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($transaction as $index => $item)
                            <tr>
                                <td><span class="text-muted">{{ $index+1 }}</span></td>
                                <td>{{ $item->invoice_no }}</td>
                                <td>
                                    <a href="{{ route('customer.show', $item->customer->id) }}" target="_blank">
                                        {{ $item->customer->name }}
                                    </a>
                                </td>
                                <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                <td>{{ $item->limit }}</td>
                                <td>{{ $item->discount }}%</td>
                                <td>{{ $item->amount }}</td>
                                <td>{{ $item->status }}</td>
                                <td class="text-center">
                                    <a class="icon" href="{{ route('transaction.show', $item->id) }}" title="lihat detail">
                                        <i class="fe fe-eye"></i>
                                    </a>
                                    <a class="icon btn-delete" href="#!" data-id="{{ $item->id }}" title="delete item">
                                        <i class="fe fe-trash"></i>
                                    </a>
                                    <form action="{{ route('transaction.destroy', $item->id) }}" method="POST" id="form-{{ $item->id }}">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="d-flex">
                        <div class="ml-auto mb-0">
                            {{ $transaction->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="{{ asset('js/delete.js') }}"></script>
@endsection
