@extends('layouts.default')

@section('content')

<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Detail Pesanan</h2>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Detail Pesanan</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Barang</th>
                            <th>Quantity</th>
                            <th>Ukuran</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pesanan_details as $item)
                        <tr>
                            <td>{{ $item['id'] }}</td>
                            <td>{{ $item['username'] }}</td>
                            <td>{{ $item['barang'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ $item['ukuran'] }}</td>
                            <td>{{ $item['total'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
