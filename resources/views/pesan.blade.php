@extends('layouts.main')

@section('content')
<div class="content-wrapper mt-3">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tabel Data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Menu</a></li>
                        <li class="breadcrumb-item active">Tabel Data</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Pesanan</h3>

                        <div class="card-tools">
                            <form action="{{ route('admin.pesan') }}" method="GET" class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="Search" value="{{ request('search') }}">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    @if(request('search'))
                                        <a href="{{ route('admin.pesan') }}" class="btn btn-default">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-bordered table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAMA</th>
                                    <th>NO TELEPON</th>
                                    <th>TANGGAL PESAN</th>
                                    <th>NAMA MAKANAN</th>
                                    <th>JUMLAH MAKANAN</th>
                                    <th>NAMA MINUMAN</th>
                                    <th>JUMLAH MINUMAN</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $pesan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pesan->pelanggan->nama_pelanggan }}</td>
                                    <td>{{ $pesan->pelanggan->telepon_pelanggan }}</td>
                                    <td>{{ \Carbon\Carbon::parse($pesan->pelanggan->tanggal_pesan)->translatedFormat('l, j F Y') }}</td>
                                    <td>{{ $pesan->makanan->nama_makanan }}</td>
                                    <td>{{ $pesan->jumlah_makanan }}</td>
                                    <td>{{ $pesan->minuman->nama_minuman }}</td>
                                    <td>{{ $pesan->jumlah_minuman }}</td>
                                    <td>
                                        <a href="{{ route('admin.pesan.edit', $pesan->id_pesan) }}" class="btn btn-primary">
                                            <i class="fas fa-pen"></i>&ensp;Edit
                                        </a>
                                        <form action="{{ route('admin.pesan.delete', $pesan->id_pesan) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pesanan ini?');">
                                                <i class="fas fa-trash-alt"></i>&ensp;Hapus
                                            </button>
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
    </section>
</div>
@endsection
