@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Menu</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Menu</a></li>
                            <li class="breadcrumb-item active">Edit Menu</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.minuman.update', ['id_minuman' => $minuman->id_minuman]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Menu Minuman</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama_minuman">Nama Minuman</label>
                                        <input type="text" name="nama_minuman" class="form-control" id="nama_minuman"
                                            placeholder="Masukkan Nama Minuman" value="{{ $minuman->nama_minuman }}" value="{{ old('nama_minuman') }}">
                                    </div>
                                    @error('nama_minuman')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="form-group">
                                        <label for="harga_minuman">Harga Minuman</label>
                                        <input type="number" name="harga_minuman" class="form-control" id="harga_minuman" value="{{ $minuman->harga_minuman}}" value="{{ old('harga_minuman') }}">
                                    </div>
                                    @error('harga_minuman')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
