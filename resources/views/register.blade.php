<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Restoran</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
    <style>
        body {
            background: url('{{ asset('lte/dist/img/background1.jpg') }}') no-repeat center center fixed;
            background-size: cover;
        }

        .login-box {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
        }

        .password-toggle {
            cursor: pointer;
        }

        .input-group-append .input-group-text .fa-eye,
        .input-group-append .input-group-text .fa-eye-slash {
            color: #495057;
            /* Warna ikon yang diinginkan */
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('register') }}" class="h1"><b>R</b>estoran</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Silahkan Buat Akun</p>

                <form action="{{ route('register-proses') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror"
                            placeholder="Nama" value="{{ old('nama') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    @error('nama')
                        <span role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="Email" value="{{ old('email') }}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @error('email')
                        <span role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="password" id="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span id="toggle-password" class="password-toggle fas fa-eye"></span>
                            </div>
                        </div>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @error('password')
                        <span role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                    <div class="input-group mb-3">
                        <input type="password" id="password-confirmation" name="password_confirmation"
                            class="form-control" placeholder="Konfirmasi Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span id="toggle-password-confirmation" class="password-toggle fas fa-eye"></span>
                            </div>
                        </div>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
                        </div>
                        <br>
                        <p class="mt-2">
                            Sudah punya akun?
                            <a href="{{ route('login') }}" class="text-center">Masuk</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function togglePasswordVisibility(inputId, toggleId) {
                const passwordInput = document.getElementById(inputId);
                const togglePassword = document.getElementById(toggleId);

                togglePassword.addEventListener('click', function() {
                    const type = passwordInput.type === 'password' ? 'text' : 'password';
                    passwordInput.type = type;
                    this.classList.toggle('fa-eye-slash');
                    this.classList.toggle('fa-eye');
                });
            }

            togglePasswordVisibility('password', 'toggle-password');
            togglePasswordVisibility('password-confirmation', 'toggle-password-confirmation');
        });
    </script>

    @if ($message = Session::get('failed'))
        <script>
            Swal.fire({
                icon: "error",
                title: "Gagal",
                text: "{{ $message }}",
            });
        </script>
    @endif

    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: "{{ $message }}",
            });
        </script>
    @endif
</body>

</html>
