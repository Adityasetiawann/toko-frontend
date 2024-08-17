









{{-- 
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Data Barang</h1>

        @foreach ($barangs as $barang)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $barang['nama_barang'] }}</h5>
                <p class="card-text">Stok: {{ $barang['stok'] }}</p>
                <p class="card-text">Harga: {{ $barang['harga'] }}</p>
                <p class="card-text">Kategori: {{ $barang['kategori'] }}</p>
                <p class="card-text">Keterangan: {{ $barang['keterangan'] }}</p>
                @if ($barang['gambar'])
                    <img src="{{ asset('storage/gambar/' . $barang['gambar']) }}" alt="Gambar Barang" class="img-fluid">
                @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection --}}


<div class="page-inner">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" id="formCard" style="display: none;">
                <div class="card-header">Tambah Barang</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang:</label>
                            <input type="text" class="form-control" id="nama_barang" name="nama_barang" required>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori:</label>
                            <input type="text" class="form-control" id="kategori" name="kategori" required>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok:</label>
                            <input type="number" class="form-control" id="stok" name="stok" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga:</label>
                            <input type="number" class="form-control" id="harga" name="harga" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan:</label>
                            <textarea class="form-control" id="keterangan" name="keterangan"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar:</label>
                            <input type="file" class="form-control-file" id="gambar" name="gambar" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>

