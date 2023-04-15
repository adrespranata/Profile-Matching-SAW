<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>{{ $title }} - Sistem Pendukung Keputusan Jurusan SMA/SMK</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>


<body class="bg-custom">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 text-white d-flex justify-content-center align-items-center" style="height: 100vh;">
                <div class="text-center">
                    <h2>Sistem Pendukung Keputusan Jurusan SMA/SMK</h2>
                    <p>Sistem Pendukung Keputusan adalah suatu sistem yang bertujuan
                        untuk membantu pengambilan keputusan dengan memanfaatkan data,
                        model, dan teknik-teknik analisis tertentu. Sistem Pendukung
                        Keputusan ini dapat digunakan pada berbagai bidang seperti bisnis,
                        industri, kesehatan, pemerintahan, dan lain sebagainya.
                        SPK bertujuan untuk mengoptimalkan pengambilan keputusan
                        dengan cara yang lebih objektif dan tepat.</p>
                </div>
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center" style="height: 100vh;">
                <div class="card">
                    <div class="card-header text-center">{{ __('Silahkan Masuk') }}</div>

                    <div class="card-body">
                        @if (session('LoginError'))
                        <div class="alert alert-danger">{{ session('LoginError') }}</div>
                        @endif

                        <form method="POST" action="/login">
                            @csrf

                            <div class="form-group">
                                <label for="username">{{ __('Username') }}</label>
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>