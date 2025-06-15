<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aplikasi Dana BOS Sekolah</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/dist/css/adminlte.min.css">

    @stack('css')
    <link rel="stylesheet" href="/notif/dist/css/iziToast.min.css">
    <script src="/notif/dist/js/iziToast.min.js" type="text/javascript"></script>
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white" style="background: linear-gradient(to bottom right, #0088c0, #47c5f7); margin: 0;
        height:10vh;
  color: white;
  font-family: sans-serif;">
            <div class="container">
                <a href="/" class="navbar-brand">
                    <table>
                        <tr>
                            <td><img src="/logo/tw.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                                    style="opacity: .8; height:53px;"></td>
                            <td class="text-center">
                                <span class="brand-text" style="color:white; font-weight:bold; font-size:16px">APLIKASI
                                    SISTEM<br />
                                    INFORMASI
                                    MANAJEMEN<br />
                                    DANA BOS</span>
                            </td>
                        </tr>
                    </table>


                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav ml-auto">
                    @if (Auth::check())
                    <li class="nav-item">
                        <a href="/superadmin/dataumum" class="nav-link" style="color: white">Data umum</a>
                    </li>
                    <li class="nav-item">
                        <a href="/superadmin/komponen" class="nav-link" style="color: white">Komponen</a>
                    </li>
                    <li class="nav-item">
                        <a href="/superadmin/program" class="nav-link" style="color: white">Program</a>
                    </li>
                    <li class="nav-item">
                        <a href="/superadmin/pembiayaan" class="nav-link" style="color: white">Pembiayaan</a>
                    </li>
                    <li class="nav-item">
                        <a href="/superadmin/transaksi" class="nav-link" style="color: white">Transaksi</a>
                    </li>
                    <li class="nav-item">
                        <a href="/superadmin/laporan" class="nav-link" style="color: white">Laporan</a>
                    </li>
                    <li class="nav-item">
                        <a href="/logout" class="nav-link" style="color: white"
                            onclick="return confirm('Yakin Ingin keluar?');">Logout</a>
                    </li>
                    @else

                    <li class="nav-item">
                        <a href="/" class="nav-link" style="color: white">Login</a>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">


            <!-- Main content -->
            <div class="content">
                <div class="container">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer text-center" style="background: linear-gradient(to bottom right, #0088c0, #47c5f7); margin: 0;
       
  color: white;
  font-family: sans-serif;">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">

            </div>
            <!-- Default to the left -->
            <strong>Aplikasi Dana BOS </strong>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/assets/dist/js/adminlte.min.js"></script>
    <script type="text/javascript">
        @include('layouts.notif')
    </script>
</body>

</html>