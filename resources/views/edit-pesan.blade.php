@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Pesanan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Menu</a></li>
                            <li class="breadcrumb-item active">Edit Pesanan</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.pesan.update', ['id_pesan' => $pesan->id_pesan]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Pesanan</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama_pelanggan">Nama Pelanggan</label>
                                        <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan"
                                            placeholder="Masukkan Nama Pelanggan"
                                            value="{{ $pesan->pelanggan->nama_pelanggan }}"
                                            value="{{ old('nama-pelanggan') }}">
                                    </div>
                                    @error('nama_pelanggan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="form-group">
                                        <label for="telepon_pelanggan">No Telepon</label>
                                        <input type="text" name="telepon_pelanggan" class="form-control"
                                            id="telepon_pelanggan" placeholder="Masukkan Telepon Pelanggan"
                                            value="{{ $pesan->pelanggan->telepon_pelanggan }}"
                                            value="{{ old('telepon_pelanggan') }}">
                                    </div>
                                    @error('telepon_pelanggan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="form-group">
                                        <label for="tanggal_pesan">Tanggal Pesan</label>
                                        <input type="date" name="tanggal_pesan" class="form-control" id="tanggal_pesan"
                                            value="{{ $pesan->pelanggan->tanggal_pesan }}"
                                            value="{{ old('tanggal_pesan') }}">
                                    </div>
                                    @error('tanggal_pesan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="form-group">
                                        <label for="id_makanan">Nama Makanan</label>
                                        <select name="id_makanan" class="form-control" id="id_makanan">
                                            <option value="">Pilih Makanan</option>
                                            @foreach ($makanan as $makanan)
                                                <option value="{{ $makanan->id_makanan }}"
                                                    {{ old('id_makanan') == $makanan->id_makanan ? 'selected' : '' }}>
                                                    {{ $makanan->nama_makanan }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_makanan')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_makanan">Jumlah Makanan</label>
                                        <input type="number" name="jumlah_makanan" class="form-control" id="jumlah_makanan"
                                            value="{{ $pesan->jumlah_makanan }}" min="1"
                                            value="{{ old('jumlah_makanan') }}">
                                    </div>
                                    @error('jumlah_makanan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="form-group">
                                        <label for="id_minuman">Nama Minuman</label>
                                        <select name="id_minuman" class="form-control" id="id_minuman">
                                            <option value="">Pilih Minuman</option>
                                            @foreach ($minuman as $minuman)
                                                <option value="{{ $minuman->id_minuman }}"
                                                    {{ old('id_minuman') == $minuman->id_minuman ? 'selected' : '' }}>
                                                    {{ $minuman->nama_minuman }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_minuman')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_minuman">Jumlah Minuman</label>
                                        <input type="number" name="jumlah_minuman" class="form-control" id="jumlah_minuman"
                                            value="{{ $pesan->jumlah_minuman }}" min="1"
                                            value="{{ old('jumlah_minuman') }}">
                                    </div>
                                    @error('jumlah_minuman')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!--/.col (left) -->
                    </div>
                    <!-- /.row -->
                </form>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <!-- /.content -->
    </div>
@endsection
