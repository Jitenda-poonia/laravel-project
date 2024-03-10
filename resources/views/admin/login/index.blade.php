<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>admin login</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{ asset('assets/css/font-awesome.css') }}" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <style>
        span {
            color: red
        }
    </style>
</head>

<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <img src="assets/img/logo-invoice.png" />
            </div>
        </div>
        <div class="row ">

            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

                <div class="panel-body">
                    <form role="form" action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <hr />
                        <h5>Enter Details to Login</h5>
                        <br />

                        @if (session()->has('error'))
                            <div class="alert alert-danger" id="msg">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                        @if (session()->has('success'))
                            <div class="alert alert-success" id="msg">
                                {{ session()->get('success') }}
                            </div>
                        @endif
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                            <input type="text" name="email" class="form-control" placeholder="Your Username " />
                        </div>
                        @error('email')
                        <div class="alert alert-danger" id="msg">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Your Password" />
                        </div>
                        @error('password')
                        <div class="alert alert-danger" id="msg">
                            {{ $message }}
                        </div>
                        @enderror
                        <div class="form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" /> Remember me
                            </label>
                            <span class="pull-right">
                                <a href="index.html">Forget password ? </a>
                            </span>
                        </div>

                        <button type="submit" class="btn btn-primary ">Login Now</button>
                        <hr />
                        Not register ? <a href="index.html">click here </a> or go to <a href="index.html">Home</a>
                    </form>
                </div>

            </div>


        </div>
    </div>

</body>

</html>
