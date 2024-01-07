<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    @font-face {
    font-family: 'Mattone150'; /* Nama font yang akan Anda gunakan */
    src: url('assets/fonts/Mattone 150 600.otf') format('opentype'); /* Path menuju file font */
    font-weight: normal;
    font-style: normal;
    }

    body{
        /*background: -webkit-linear-gradient(left, #0072ff, #00c6ff);*/
        background-image: url('assets/img/bg_login.jpg');
        background-size: cover; /* Adjust this property as needed */
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .container-fluid {
        position: relative;
        overflow: hidden;
    }

    .navbar {
        z-index: 3; /* pastikan navbar tetap di atas */
        position: relative; /* tambahkan ini untuk memastikan stacking context */
        background-color: rgba(0, 0, 0, 0.8);
        font-family: 'Mattone150'; /* Ganti 'Your Font Name' dengan nama font yang diinginkan */
    }

    h1{
        font-family: 'Mattone150';
    }

    h3{
        font-family: 'Mattone150';
    }
    .text-primary {
        color: black;
    }

    .my-5 {
      color: white;
    }
</style>

</head>
<body>

<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light container-fluid">
                <div class="container-fluid">
                    <a href="{{ route('home') }}" class="navbar-brand text-white">Brand</a>
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav">
                            <a href="{{ route('home') }}" class="nav-item nav-link active text-white">Home</a>
                            <a href="#" class="nav-item nav-link text-white">Profile</a>
                            <a href="#" class="nav-item nav-link text-white">Messages</a>
                            <a href="#" class="nav-item nav-link disabled text-white" tabindex="-1">Reports</a>
                        </div>
                        <div class="navbar-nav ms-auto">
                            <a href="{{ route('register') }}" class="nav-item nav-link text-white">SignUp</a>
                        </div>
                    </div>
                </div>
            </nav>
<!-- Section: Design Block -->
<section class="">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight">
            Masuk<br />
            <span class="text-primary">bergembira berdendang bersama</span>
          </h1>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
            <form action="{{ route('login.action') }}" method="POST" class="user">
                <!-- 2 column grid layout with text inputs for the first and last names -->
            @csrf
                    @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                            @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                            @endforeach
                          </ul>
                      </div>
                    @endif

                <!-- Email input -->
                <div name="form-group" class="form-outline mb-4">
                <h3 class="display-7 fw-bold ls-tight">Log In</h3>
                  <input name="email" type="email" id="form3Example3" class="form-control form-control-user" />
                  <label class="form-label" for="form3Example3">Email address</label>
                </div>

                <!-- Password input -->
                <div name="form-group" class="form-outline mb-4">
                  <input name="password" type="password" id="form3Example4" class="form-control form-control-user" />
                  <label class="form-label" for="form3Example4">Password</label>
                </div>

                <!-- Checkbox -->

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block btn-user mb-4">
                  Log In
                </button>
                </form>

                <!-- Register buttons -->
                <div class="text-center">
                  <p>Belum punya akun? 
                    <a href="{{ route('register') }}">
                      Yuk daftar disini!
                    </a>
                  </p>
                </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->
    </div>

    <!-- Pills navs -->


    <!-- Your content goes here -->

</body>
</html>
