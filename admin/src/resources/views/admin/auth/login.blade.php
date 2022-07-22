<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập | Hibika</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/admin-lte/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/admin-lte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="/assets/css/login.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
    </div>
    <!-- /.login-logo -->
    <div class="login-card-body text-center">
        <h1 class="text-center my-3 mb-lg-5">Đăng nhập</h1>
        <form method="POST" action="{{ route('admin.login') }}" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="email">Email <span>*</span></label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control form-control-lg" name="email" id="email" value="{{ old('email') }}">
                    @if($errors->has('email'))
                        <div class="error">{{ $errors->first('email') }}</div>
                    @endif
                </div>
            </div>

            <div class="form-group mb-2">
                <label for="password">Mật khẩu <span>*</span></label>
                <div class="input-group has-validation">
                    <input type="password" class="form-control form-control-lg" name="password" id="password">
                    @if($errors->has('password'))
                        <div class="error">{{ $errors->first('password') }}</div>
                    @endif
                </div>
            </div>
            <button type="submit" class="btn font-weight-bold">Đăng nhập</button>
        </form>
    </div>
    <!-- /.login-card-body -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="/admin-lte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/admin-lte/dist/js/adminlte.min.js"></script>
</body>
</html>
