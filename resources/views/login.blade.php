<!DOCTYPE html>
<html lang="en">

<head>

    <title>Penilaian Kinerja Pegawai</title>
    <!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="/material/dist/assets/images/favicon.ico" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="/material/dist/assets/css/style.css">


    <link rel="stylesheet" href="/notif/dist/css/iziToast.min.css">
    <script src="/notif/dist/js/iziToast.min.js" type="text/javascript"></script>



</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
    <div class="auth-content" style="width: 600px">
        <div class="card">
            <div class="row align-items-center text-center">
                <div class="col-md-12">
                    <div class="card-body">
                        <h4>Desa
                            Simpung Layung<br />
                            Penilaian Kinerja Pegawai</h4>

                        <h5 class="mb-3 f-w-400"></h5>
                        <form action="/login" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="floating-label" for="">Username</label>
                                <input type="text" class="form-control" name="username" id="email"
                                    autocomplete='new-password'>
                            </div>
                            <div class="form-group mb-4">
                                <label class="floating-label" for="Password">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    autocomplete='new-password'>
                            </div>
                            <div class="custom-control custom-checkbox text-left mb-4 mt-2">
                            </div>
                            <button class="btn btn-block btn-primary mb-4">Signin</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="/material/dist/assets/js/vendor-all.min.js"></script>
<script src="/material/dist/assets/js/plugins/bootstrap.min.js"></script>
<script src="/material/dist/assets/js/ripple.js"></script>
<script src="/material/dist/assets/js/pcoded.min.js"></script>


<script type="text/javascript">
    @include('layouts.notif')
</script>
</body>

</html>

{{-- @extends('welcome')

@section('content')
<div class="row">
    <div class="col-3">
    </div>

    <div class="col-6 text-center">

        <br /><br />
        <div class="card card-outline card-primary">
            <div class="card-body">
                <p class="login-box-msg">Masukan username dan password</p>

                <form action="/login" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username"
                            autocomplete='new-password' required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password"
                            autocomplete='new-password'>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn bg-gradient-primary btn-block">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <!-- /.social-auth-links -->
                <br />
                <p class="mb-0 text-center">

                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-3">
    </div>
</div>
@endsection --}}