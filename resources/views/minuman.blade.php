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
                            <h3 class="card-title">Data Minuman</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-bordered table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>NAMA MINUMAN</th>
                                        <th>HARGA</th>
                                        <th>FOTO</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $minuman)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $minuman->nama_minuman }}</td>
                                            <td>{{ number_format($minuman->harga_minuman, 0, ',', '.') }}</td>
                                            <td>
                                                @if($minuman->foto_minuman)
                                                <img src="{{ asset('storage/foto_minuman/' . $minuman->foto_minuman) }}" alt="{{ $minuman->foto_minuman }}" width="100">
                                                @else
                                                    Tidak ada foto
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.minuman.edit', $minuman->id_minuman) }}"
                                                    class="btn btn-primary">
                                                    <i class="fas fa-pen"></i>&ensp;Edit
                                                </a>
                                                <form action="{{ route('admin.minuman.delete', $minuman->id_minuman) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus minuman ini?');">
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
