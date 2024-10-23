@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Menu</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Menu</a></li>
                            <li class="breadcrumb-item active">Edit Menu</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.update.makanan', $makanan->id_makanan) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Menu Makanan</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama_makanan">Nama Makanan</label>
                                        <input type="text" name="nama_makanan" class="form-control" id="nama_makanan" value="{{ old('nama_makanan', $makanan->nama_makanan) }}">
                                    </div>
                                    @error('nama_makanan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="form-group">
                                        <label for="harga_makanan">Harga Makanan</label>
                                        <input type="number" name="harga_makanan" class="form-control" id="harga_makanan" value="{{ old('harga_makanan', $makanan->harga_makanan) }}">
                                    </div>
                                    @error('harga_makanan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="form-group">
                                        <label for="foto_makanan">Foto Makanan</label>
                                        <input type="file" name="foto_makanan" class="form-control" id="foto_makanan">
                                        <img src="{{ Storage::url($makanan->foto_makanan) }}" alt="Current Foto Makanan" width="100">
                                    </div>
                                    @error('foto_makanan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
