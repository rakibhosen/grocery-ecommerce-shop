{{--  @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection  --}}

<!DOCTYPE html>
<html lang="en">


<head>
    <title>Admin reset</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Admin template that can be used to build dashboards for CRM, CMS, etc." />
    <meta name="author" content="Potenza Global Solutions" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- app favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/vendors.css')}}" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/style.css')}}" />
</head>

<body class="bg-white">
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <!-- begin pre-loader -->
            <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="{{asset('backend/assets/img/loader/loader.svg')}}" alt="loader">
                    </div>
                </div>
            </div>
            <!-- end pre-loader -->

            <!--start login contant-->
            <div class="app-contant">
                <div class="bg-white">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters">
                           
                            <div class="col-sm-6 col-xxl-9 col-lg-7 bg-gradient">
                                <div class="row align-items-center h-100">
                                    <div class="col-7 mx-auto ">
                                        <img class="img-fluid" src="{{asset('backend/assets/img/bg/login.svg')}}" alt="">
                                    </div>
                                </div>
                            </div>

                             <div class="col-sm-6 col-lg-5 col-xxl-3  ">
                                <div class="d-flex align-items-center h-100-vh">
                                    <div class="login p-50">
                                        <h1 class="mb-2">Admin Login</h1>
                                        <p>Welcome back, please login to your account.</p>
                                          <form method="POST" action="{{ route('admin.password.update') }}" class="mt-3 mt-sm-5">
                                           @csrf
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">User Name*</label>
                                                        <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="Email" name="email"/>
                                                          @error('email')
                                                          <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                          </span>
                                                           @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Password*</label>
                                                        <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" value="{{ old('password') }}" placeholder="Password" name="password"/>
                                                              @error('password')
                                                          <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                          </span>
                                                           @enderror
                                                    </div>
                                                </div>

                                                                <div class="col-12">
                                                    <div class="form-group">
                                                       <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                      
                                                    </div>
                                                </div>
                                               
                                                <div class="col-12">
                                                    <div class="d-block d-sm-flex  align-items-center">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" id="gridCheck">
                                                            <label class="form-check-label" for="gridCheck">
                                                                Remember Me
                                                            </label>
                                                        </div>
                                                        <a href="{{ route('admin.password.request') }} " class="ml-auto">Forgot Password ?</a>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    {{--  <button type="submit" class="btn btn-primary" value="Sign In"/>  --}}
                                                     <button class="btn btn-primary submit-btn btn-block" type="submit">Login</button
                                                </div>
                                                <div class="col-12  mt-3">
                                                    <p>Don't have an account ?<a href="auth-register.html"> Sign Up</a></p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!--end login contant-->
        </div>
        <!-- end app-wrap -->
    </div>
    <!-- end app -->



    <!-- plugins -->
    <script src="{{ asset('backend/assets/js/vendors.js')}}"></script>

    <!-- custom app -->
    <script src="{{ asset('backend/assets/js/app.js')}}"></script>
</body>


</html>
