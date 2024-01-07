@extends('layouts.template')

@section('content')
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Login Rekapitulasi Keterlambatan</title>
  </head>
  <body>
        <div class="content card p-5">
          <div class="container">
            <div class="row">
              <div class="col-md-6">
                <img src="img/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
              </div>
              <div class="col-md-6 contents">
                <div class="row justify-content-center">
                  <div class="col-md-8">
                    <div class="mb-4">
                    <h3>Sign In</h3>
                    <p class="mb-4">Silahkan login menggunakan akun dan password yang benar!.</p>
                  </div>
                  <form action="{{ route('login.auth') }}" method="post">
                    @csrf
                    @if (Session::get('failed'))
                        <div class="alert alert-danger">{{ Session::get('failed') }}</div>
                    @endif
                    @if (Session::get('logout'))
                        <div class="alert alert-primary">{{ Session::get('logout') }}</div>
                    @endif
                    @if (Session::get('canAccess'))
                        <div class="alert alert-danger">{{ Session::get('canAccess') }}</div>
                    @endif
                    <div class="form-group first">
                      <label for="email">Email</label>
                      <input type="text" name="email" class="form-control" id="email">
                      @error('email')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <br>
                    <div class="form-group last mb-4">
                      <label for="password">Password</label>
                      <input type="password" name="password" class="form-control" id="password">
                      @error('password')
                        <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <input type="submit" value="Log In" class="btn btn-block btn-primary">
                  </form>
                  </div>
                </div>
                
              </div>
              
            </div>
          </div>
        </div>
    </form>


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
@endsection