<!DOCTYPE html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MSI - Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('style/assets/css/login.css')}}">
    <link rel="shortcut icon" href="{{ asset('style/images/logo2.png')}}">
</head>

<body>
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-6 mx-auto">
            <div class="card mx-auto">
                <div class="text-center mb-4 text-white">
                    <i class="fa fa-user fa-3x"></i>
                </div>
                <div class="card-header text-center">
                    <h4>LOGIN MSI</h4>
                </div>
                <div class="card-body">
                    <!-- Alert for login failed -->
                    @if(session('login_failed'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('login_failed') }}
                    </div>
                    @endif

                    <!-- Alert for login error -->
                    @if(session('login_error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('login_error') }}
                    </div>
                    @endif

                    <!-- Alert for successful logout -->
                    @if(session('logout'))
                    <div class="alert alert-success" role="alert">
                        {{ session('logout') }}
                    </div>
                    @endif

                    <!-- Alert for other errors -->
                    @if(session('gagal'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('gagal') }}
                    </div>
                    @endif


                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="user_nid"><i class="fa fa-user"></i> User NID</label>
                            <input type="text" id="user_nid" name="user_nid" class="form-control" autofocus placeholder="Masukkan User NID..." required>
                        </div>
                        <div class="form-group">
                            <label for="password"><i class="fa fa-lock"></i> Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password..." required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional, for certain features) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>