@extends('layouts.main')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Menu</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Menu</a></li>
                            <li class="breadcrumb-item active">Tambah Menu</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('admin.store.makanan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Tambah Menu Makanan</h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nama_makanan">Nama Makanan</label>
                                        <input type="text" name="nama_makanan" class="form-control" id="nama_makanan" placeholder="Masukkan Nama Makanan " value="{{ old('nama_makanan')}}">
                                    </div>
                                    @error('nama_makanan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="form-group">
                                        <label for="harga_makanan">Harga Makanan</label>
                                        <input type="number" name="harga_makanan" class="form-control" id="harga_makanan" value="{{ old('harga_makanan')}}">
                                    </div>
                                    @error('harga_makanan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <div class="form-group">
                                        <label for="foto_makanan">Foto Makanan</label>
                                        <input type="file" name="foto_makanan" class="form-control" id="foto_makanan" onchange="previewImage(event)">
                                        <img id="preview" src="{{ old('foto_makanan') ? old('foto_makanan') : '#' }}" alt="Pratinjau Gambar" style="display: {{ old('foto_makanan') ? 'block' : 'none' }}; margin-top: 10px; max-height: 200px;">
                                    </div>
                                    @error('foto_makanan')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('preview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }

        // Display preview image if there's an old input
        document.addEventListener('DOMContentLoaded', function() {
            var oldImage = "{{ old('foto_makanan') }}";
            if (oldImage) {
                var preview = document.getElementById('preview');
                preview.src = oldImage;
                preview.style.display = 'block';
            }
        });
    </script>
@endsection
