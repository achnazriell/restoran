@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Menu Restoran</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Menu Restoran</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Makanan Table -->
                    <div class="col-md-6 fade-in">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Daftar Makanan</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <table class="table table-striped table-bordered slide-in">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Makanan</th>
                                            <th>Harga</th>
                                            <th>Foto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($makanan as $makanan)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $makanan->nama_makanan }}</td>
                                                <td>Rp.&nbsp;{{ number_format($makanan->harga_makanan, 0, ',', '.') }}</td>
                                                <td>
                                                    @if($makanan->foto_makanan)
                                                    <img src="{{ asset('storage/foto_makanan/' . $makanan->foto_makanan) }}" alt="{{ $makanan->nama_makanan }}" width="100">
                                                    @else
                                                        Tidak ada foto
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Minuman Table -->
                    <div class="col-md-6 fade-in">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Daftar Minuman</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <table class="table table-striped table-bordered slide-in">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Minuman</th>
                                            <th>Harga</th>
                                            <th>Foto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($minuman as $minuman)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $minuman->nama_minuman }}</td>
                                                <td>Rp.&nbsp;{{ number_format($minuman->harga_minuman, 0, ',', '.') }}</td>
                                                <td>
                                                    @if($minuman->foto_minuman)
                                                    <img src="{{ asset('storage/foto_minuman/' . $minuman->foto_minuman) }}" alt="{{ $minuman->nama_minuman }}" width="100">
                                                    @else
                                                        Tidak ada foto
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
