<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MSI - User Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css' async>
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                            <h4>LOGIN USER</h4>
                        </div>
                        <br>
                        <div class="card-body">
                            <form method="POST" action="{{ route('user_login') }}">
                                @csrf
                                <div class="form-group">
                                    <label><i class="fa fa-user"></i> User NID</label>
                                    <input type="text" value= "{{ Session::get('user_nid')}}" id="user_nid" name="user_nid" class="form-control" autofocus placeholder="Masukkan User NID..." required>
                                </div>
                                <div class="form-group">
                                    <label><i class="fa fa-lock"></i> Password</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password..." required>
                                </div>
                                <button type="submit" class="btn btn-primary">Login</button>
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

    
    <style>
        * {
            margin: 0;
            padding: 0;
            outline: 0;
            font-family: 'Open Sans', sans-serif;
        }

        body {
            height: 100vh;
            background-image: url(https://www.pertamina.com/Media/Image/post/20210303025135806_65a5ab6d48de46ddbd8f114071dae18f.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .card {
            width: 100%;
            max-width: 400px;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 5px;
            padding: 40px;
        }

        .card-header {
            padding: 10px;
            text-align: center;
        }

        .card-header h4 {
            font-weight: 600;
            color:#fff;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            color: #fff;
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
        }
        .avatar {
        font-size: 30px ;
        background: #E59866;
        width: 55px;
        height: 55px;
        line-height: 55px;
        position: fixed;
        left: 53%;
        top: 25%;
        transform: translate(-50%, -50%);
        text-align: center;
        border-radius: 50%;
        }
    </style>
</body>
</html>