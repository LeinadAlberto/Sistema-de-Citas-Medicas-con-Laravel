<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sist. Médico - Registro</title>

        <!-- Favicons -->
        <link href="{{ url('dist/img/logo-sis-medical.png') }}" rel="icon">
        <link href="{{ url('dist/img/logo-sis-medical.png') }}" rel="apple-touch-icon">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/adminlte.min.css">
    </head>

    <body class="hold-transition register-page" 
        style="background-image: url('{{ url('assets/img/register.jpg') }}');
        background-repeat: no-repeat; 
        background-size: 100vw 100vh; 
        ">

        <div class="register-box">

            <div class="card card-outline card-info">

                <div class="card-header text-center">
                    <a href="{{ url('login') }}" class="h1">Sistema Médico</a>
                </div>

                <div class="card-body">

                    <p class="login-box-msg">Crear una cuenta</p>

                    <form method="POST" action="{{ route('register') }}">

                        @csrf

                        <!-- Nombre Completo -->
                        <div class="input-group mb-3">
                            <input id="name" type="text" placeholder="Nombre completo" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Correo Electrónico -->
                        <div class="input-group mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo Electrónico">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Contraseña -->
                        <div class="input-group mb-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Repetir Contraseña -->
                        <div class="input-group mb-3">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Repetir contraseña">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Boton de Crear Cuenta -->
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-info btn-block">Crear cuenta</button>
                            </div><!-- /.col -->
                        </div>

                    </form>

                    <a href="{{ url('login') }}" class="text-center text-info">Ya tengo una cuenta</a>
                    
                </div><!-- /.card-body -->
                
            </div><!-- /.card -->

        </div><!-- /.register-box -->

        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>

    </body>

</html>
