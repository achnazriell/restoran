@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Menu</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Menu</a></li>
                            <li class="breadcrumb-item active">Tambah Menu</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.store.minuman') }}" method="POST">
                    @csrf
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Tambah Menu Minuman</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama">Nama Minuman</label>
                                        <input type="text" name="nama_minuman" class="form-control" id="nama_minuman" placeholder="Masukkan Nama Minuman " value="{{ old('nama_minuman')}}">
                                    </div>
                                    @error('nama_minuman')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="form-group">
                                        <label for="harga_minuman">Harga Minuman</label>
                                        <input type="decimal" name="harga_minuman" class="form-control"  @error('harga_minuman') is-invalid @enderror id="harga_minuman" value="{{ old('harga_minuman')}}">
                                    </div>
                                    @error('harga_minuman')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="form-group">
                                        <label for="foto_minuman">Foto Minuman</label>
                                        <input type="file" name="foto_minuman" class="form-control" id="foto_minuman" onchange="previewImage(event)">
                                        <img id="previeq" src="{{ old('foto_minuman') ? old('foto_minuman') : '#' }}" alt="Pratinjau Gambar" style="display: {{ old('foto_minuman') ? 'block' : 'none' }}; margin-top: 10px; max-height: 200px;">
                                    </div>
                                    @error('foto_minuman')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
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
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('previeq');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        // Display preview image if there's an old input
        document.addEventListener('DOMContentLoaded', function() {
            var oldImage = "{{ old('foto_minuman') }}";
            if (oldImage) {
                var preview = document.getElementById('previeq');
                preview.src = oldImage;
                preview.style.display = 'block';
            }
        });
    </script>
@endsection

