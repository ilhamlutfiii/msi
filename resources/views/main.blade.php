<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MSI - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css' async>
    <link rel="apple-touch-icon" href="apple-icon.png">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('style/assets/css/dropdown.css')}}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/normalize.css')}}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/bootstrap.min.css')}}" async>
    <link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css')}}" async>
    <link rel="stylesheet" href="{{ asset('style/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{ asset('style/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ asset('style/assets/scss/style.css')}}">

    <link rel="stylesheet" href="{{ asset('style/assets/css/select2.min.css')}}" async>



    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{  url('/home') }}"><img src="{{ asset('style/images/logo.png')}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="{{  url('/home') }}"><img src="{{ asset('style/images/logo2.png')}}" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{  url('/home') }}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>

                    <h3 class="menu-title">Manage</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children active dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>User</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{  url('/unit') }}">Unit</a></li>
                            <li><i class="fa fa-table"></i><a href="{{  url('/jabatan') }}">Jabatan</a></li>
                            <li><i class="fa fa-table"></i><a href="{{  url('/bidang') }}">Bidang</a></li>
                            <li><i class="fa fa-table"></i><a href="{{  url('/fungsi') }}">Fungsi</a></li>
                            <li><i class="fa fa-table"></i><a href="{{  url('/user') }}">User</a></li>
                        </ul>

                    </li>
                    <li class="menu-item-has-children active dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Network</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{  url('/ip') }}">IP</a></li>
                            <li><i class="fa fa-table"></i><a href="{{  url('/switch') }}">Insfrastruktur</a></li>
                            <li><i class="fa fa-table"></i><a href="{{  url('/os') }}">OS</a></li>
                            <li><i class="fa fa-table"></i><a href="{{  url('/komputer') }}">Komputer</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children active dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Peminjaman</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="{{  url('/pinjam') }}">Sementara</a></li>
                            <li><i class="fa fa-table"></i><a href="{{  url('/inventaris') }}">Inventaris</a></li>
                        </ul>
                    </li>

            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <a href="{{  url('/home') }}" style="color: black;">
                            <h3>MANAJEMEN SISTEM INFORMASI</h3>
                        </a>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        @auth
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Selamat Datang {{ Auth::user()->user_nama }}</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-power-off"></i> Logout</a></li>
                            </ul>
                        </div>
                        <img class="user-avatar rounded-circle" src="{{ asset('style/images/admin.jpg') }}" alt="Avatar Pengguna">
                        @endauth
                    </div>
                </div>


            </div>

        </header><!-- /header -->
        <!-- Header-->

        @yield('breadcrumbs')

        @yield('content')

        <!-- /#right-panel -->

        <!-- Right Panel -->

        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous" async></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <!-- <script src="{{ asset('style/assets/js/vendor/jquery-2.1.4.min.js')}}"></script> -->

        <script src="{{ asset('style/assets/js/bootstrap.min.js')}}"></script>

        <script src="{{ asset('style/assets/js/popper.min.js')}}" async></script>
        <script src="{{ asset('style/assets/js/plugins.js')}}"></script>
        <script src="{{ asset('style/assets/js/main.js')}}"></script>

        <script src="{{ asset('style/assets/js/lib/data-table/datatables.min.js')}}"></script>
        <script src="{{ asset('style/assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{ asset('style/assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
        <script src="{{ asset('style/assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
        <script src="{{ asset('style/assets/js/lib/data-table/jszip.min.js')}}"></script>
        <!-- <script src="{{ asset('style/assets/js/lib/data-table/pdfmake.min.js')}}"></script> -->
        <script src="{{ asset('style/assets/js/lib/data-table/vfs_fonts.js')}}"></script>
        <script src="{{ asset('style/assets/js/lib/data-table/buttons.html5.min.js')}}" async></script>
        <script src="{{ asset('style/assets/js/lib/data-table/buttons.print.min.js')}}"></script>
        <script src="{{ asset('style/assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>
        <script src="{{ asset('style/assets/js/lib/data-table/datatables-init.js')}}"></script>
        <script src="{{ asset('style/assets/js/select2.min.js')}}" defer></script>



        <script type="text/javascript">
            $(document).ready(function() {
                $('#bootstrap-data-table-export').DataTable();
                $('.selectuser').select2({
                    language: {
                        noResults: function() {
                            return "Nama User yang anda cari tidak ditemukan, ingin menambahkan User baru? <a href='" + "{{ route('tambah_user') }}" + "' class='select3'>Klik Disini</a>";
                        }
                    },
                    escapeMarkup: function(markup) {
                        return markup;
                    },
                });
                $('.selectip').select2({
                    language: {
                        noResults: function() {
                            return "Alamat IP yang anda cari tidak ditemukan, ingin menambahkan IP baru? <a href='" + "{{ route('tambah_ip') }}" + "' class='select3'>Klik Disini</a>";
                        }
                    },
                    escapeMarkup: function(markup) {
                        return markup;
                    },
                });
                $('.selectkomp').select2({
                    language: {
                        noResults: function() {
                            return "ID Perangkat yang anda cari tidak ditemukan, ingin menambahkan ID Perangkat baru? <a href='" + "{{ route('tambah_komputer') }}" + "' class='select3'>Klik Disini</a>";
                        }
                    },
                    escapeMarkup: function(markup) {
                        return markup;
                    },
                });
                $('.selectfungsi').select2({
                    language: {
                        noResults: function() {
                            return "Fungsi yang anda cari tidak ditemukan, ingin menambahkan Fungsi baru? <a href='" + "{{ route('tambah_fungsi') }}" + "' class='select3'>Klik Disini</a>";
                        }
                    },
                    escapeMarkup: function(markup) {
                        return markup;
                    },
                });
            });
        </script>
        <style>
            .select3 {
                color: blue;
            }

            .select3:hover {
                color: dodgerblue;
                /* Warna biru muda saat hover */
                text-decoration: underline;
                /* Garis bawah saat hover */
            }
        </style>
</body>

</html>