<php use App\Models\User; <!DOCTYPE html>
    <html class="no-js" lang="">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>MSI - User Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css' async>
        <link rel="apple-touch-icon" href="apple-icon.png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('style/assets/css/login.css')}}">
    </head>

    <body>
        <div class="logo">
            <img src="https://csms.plnnusantarapower.co.id/login/images/pjb-logo.png" alt="Logo" width="400">
        </div>


        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="d-flex justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="text-center">LOGIN USER</h4>
                            </div>
                            <div class="card-body">
                                @if(session('login_failed'))
                                <div class="alert alert-danger">
                                    <li style="color: red;">{{ session('login_failed') }}</li>
                                </div>
                                @endif
                                @if(session('login_error'))
                                <div class="alert alert-danger">
                                    <li style="color: red;">{{ session('login_error') }}</li>
                                </div>
                                @endif
                                @if(session('logout'))
                                <div class="alert alert-success">
                                    <li style="color: red;">{{ session('logout') }}</li>
                                </div>
                                @endif
                                @if(session('gagal'))
                                <div class="alert alert-danger">
                                    <li style="color: red;">{{ session('gagal') }}</li>
                                </div>
                                @endif
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="user_nid"><i class="fa fa-user"></i> User NID</label>
                                        <input type="text" value="{{ Session::get('user_nid') }}" id="user_nid" name="user_nid" class="form-control" autofocus placeholder="Masukkan User NID..." required>
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
            </div>
        </div>
        <div class="avatar">
            <i class="fa fa-user"></i>
        </div>
    </body>

    </html>