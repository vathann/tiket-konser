<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Navbar with Image Behind</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
    @font-face {
    font-family: 'Mattone150'; /* Nama font yang akan Anda gunakan */
    src: url('assets/fonts/Mattone 150 600.otf') format('opentype'); /* Path menuju file font */
    font-weight: normal;
    font-style: normal;
    }
    .container-fluid {
        position: relative;
        overflow: hidden;
    }

    .center-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: #fff; /* warna teks */
        z-index: 2; /* menempatkan elemen di depan gambar */
    }

    .center-content h1 {
        font-size: 2.5em; /* ukuran teks */
        margin-bottom: 20px;
        font-family: 'Mattone150';
    }

    .center-content button {
        font-size: 1.5em; /* ukuran tombol */
        font-family: 'Mattone150';
    }

    .navbar {
        z-index: 3; /* pastikan navbar tetap di atas */
        position: relative; /* tambahkan ini untuk memastikan stacking context */
        background-color: rgba(0, 0, 0, 0.8);
        font-family: 'Mattone150'; /* Ganti 'Your Font Name' dengan nama font yang diinginkan */
    }
</style>

</head>
<body>

<div class="container-fluid p-0">
<nav class="navbar navbar-expand-lg navbar-light container-fluid">
            <div class="container-fluid">
                <a href="#" class="navbar-brand text-white">Brand</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="#" class="nav-item nav-link active text-white">Home</a>
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
        <img src="assets/img/landing.jpg" alt="Landing Page Image" class="img-fluid vw-100">
        <div class="center-content">
            <h1>Teks di Tengah</h1>
            <button class="btn btn-primary">Tombol di Tengah</button>
        </div>
    </div>

    <div class="container-fluid p-0">

    </div>

    

    <!-- Your content goes here -->

</body>
</html>
