@extends('layouts.default')

@section('content')

<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Edit Barang</h2>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Edit Barang</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('/update-barang/' . $barang['id']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $barang['nama_barang'] }}" required>
                </div>
                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <input type="text" class="form-control" id="kategori" name="kategori" value="{{ $barang['kategori'] }}" required>
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" value="{{ $barang['stok'] }}" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="{{ $barang['harga'] }}" required>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $barang['keterangan'] }}">
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                    @if($barang['gambar'])
                    <img src="http://localhost:8000/storage/gambar/{{ $barang['gambar'] }}" alt="{{ $barang['nama_barang'] }}" width="100">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

@endsection
