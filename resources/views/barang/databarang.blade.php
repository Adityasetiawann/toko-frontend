@extends('layouts.default') {{-- Pastikan Anda memiliki layout default yang sesuai --}}

@section('content')

<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif


    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Data Barang</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Keterangan</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($barang as $item)
                        <tr>
                            <td>{{ $item['id'] }}</td>
                            <td>{{ $item['nama_barang'] }}</td>
                            <td>{{ $item['kategori'] }}</td>
                            <td>{{ $item['stok'] }}</td>
                            <td>{{ $item['harga'] }}</td>
                            <td>{{ $item['keterangan'] }}</td>
                            <td>
                                @if($item['gambar'])
                                <img src="http://localhost:8000/storage/gambar/{{ $item['gambar'] }}" alt="{{ $item['nama_barang'] }}" width="100">
                                @else
                                No Image
                                @endif
                            </td>
                            <td>
                                <!-- Tombol Edit -->
                                <a href="{{ url('/edit-barang/' . $item['id']) }}" class="btn btn-primary">Edit</a>
                                <!-- Tombol untuk menampilkan modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#hapusModal{{ $item['id'] }}">
                                    Hapus
                                </button>
                                <!-- Modal konfirmasi hapus -->
                                <div class="modal fade" id="hapusModal{{ $item['id'] }}" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel{{ $item['id'] }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="hapusModalLabel{{ $item['id'] }}">Konfirmasi Hapus Barang</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Anda yakin ingin menghapus barang "{{ $item['nama_barang'] }}"?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                <!-- Form untuk menghapus -->
                                                <form action="{{ url('/hapus-barang/' . $item['id']) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                    
                                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
