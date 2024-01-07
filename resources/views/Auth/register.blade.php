<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
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
                            <a href="{{ route('login') }}" class="nav-item nav-link text-white">Login</a>
                        </div>
                    </div>
                </div>
            </nav>
<!-- Section: Design Block -->
<section class="">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start">
    <div class="container">
      <div class="row gx-lg-2">
        <div class="col-lg-6 mb-5 mt-2 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight">
            Daftar akun<br />
            <span class="text-primary">lalu bergembira berdendang bersama</span>
          </h1>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
            <form action="{{ route('register.save') }}" method="POST" class="user">
                <h3 class="display-7 fw-bold ls-tight">Register</h3>
            @csrf
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input name="name" type="text" id="form3Example1" class="form-control form-control-user @error('name')is-invalid @enderror" />
                      <label class="form-label" for="form3Example1">First name</label>
                      @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="form3Example2" class="form-control" />
                      <label class="form-label" for="form3Example2">Last name</label>
                    </div>
                  </div>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input name="email" type="email" class="form-control form-control-user @error('email')is-invalid @enderror" id="form3Example3" />
                  <label class="form-label" for="form3Example3">Email address</label>
                  @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input name="password" type="password" id="form3Example4" class="form-control form-control-user @error('password')is-invalid @enderror" />
                  <label class="form-label" for="form3Example4">Password</label>
                  @error('password')
                      <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <div class="form-outline mb-4">
                  <input name="password_confirmation" type="password" id="form3Example4" class="form-control form-control-user @error('password_confirmation')is-invalid @enderror" />
                  <label class="form-label" for="form3Example4">Repeat Password</label>
                  @error('password_confirmation')
                      <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>

                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-center mb-4">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" checked />
                  <label class="form-check-label" for="form2Example33">
                    Siap mengikuti segala aturan IF-Fess.
                  </label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block  btn-user btn-block mb-4">
                  Sign up
                </button>
                </form>
                <div class="text-center">
                  <p>Udah punya akun? 
                    <a href="{{ route('login') }}">
                      Langsung masuk aja!
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
