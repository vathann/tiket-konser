<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Tiket</title>
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
    .contact-form{
        background: #fff;
        margin-top: 5%;
        margin-bottom: 5%;
        width: 100%;
        border-radius:1rem;
        
    }
    .contact-form .form-control{
        border-radius:1rem;
    }
    .contact-image{
        text-align: center;
    }
    .contact-image img{
        border-radius: 6rem;
        width: 11%;
        margin-top: -3%;
        transform: rotate(29deg);
    }
    .contact-form form{
        padding: 10%;
    }
    .contact-form form .row{
        margin-bottom: -7%;
    }

    .contact-form .form-group{
        margin-bottom: 5%;
    }

    .contact-form h3{
        margin-bottom: 5%;
        margin-top: -10%;
        text-align: center;
        color: #0062cc;
        font-family: 'Mattone150';
    }
    .contact-form .btnContact {
        width: 20%;
        border: none;
        border-radius: 1rem;
        padding: 1.5%;
        background: #0062cc;
        font-weight: 600;
        color: #fff;
        cursor: pointer;
    }
    .btnContactSubmit
    {
        width: 50%;
        border-radius: 1rem;
        padding: 1.5%;
        color: #fff;
        background-color: #0062cc;
        border: none;
        cursor: pointer;
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
    <nav class="navbar navbar-expand-lg navbar-light container-fluid fixed-top">
            <div class="container-fluid">
                <a href="#" class="navbar-brand text-white">User</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="{{ route('myticket') }}" class="nav-item nav-link active text-white">Home</a>
                        <a href="{{ route('beli') }}" class="nav-item nav-link text-white">Pesan Tiket</a>
                    </div>
                    <div class="navbar-nav ms-auto">
                        <a href="{{ route('logout') }}" class="nav-item nav-link text-white">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
    

    <div class="container contact-form">
            <form method="post">
                <h3>Tiket Saya</h3>
               <div class="row">
                    <div class="table-responsive">

                    <!--Table-->
                    <table class="table">

                    <!--Table head-->
                    <thead>
                        <tr>
                        <th>No Tiket</th>
                        <th class="th-lg">Nama</th>
                        <th class="th-lg">Jenis Tiket</th>
                        <th class="th-lg">Jumlah Tiket</th>
                        <th class="th-lg">Jumlah Pembayaran</th>
                        <th class="th-lg">Status</th>
                        <th class="th-lg">Batal</th>
                        <th class="th-lg">Cetak</th>
                        </tr>
                    </thead>
                    <!--Table head-->

                    <!--Table body-->
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>Lorem ipsum dolor</td>
                        <td>Lorem ipsum dolor</td>
                        <td>Lorem ipsum dolor</td>
                        <td>Lorem ipsum dolor</td>
                        <td>Lunas</td>
                        <td><button type="button" class="btn btn-danger">Batal</button></td>
                        <td><button type="button" class="btn btn-warning">Cetak</button></td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                        <td>Lorem ipsum dolor</td>
                        <td>Lorem ipsum dolor</td>
                        <td>Lorem ipsum dolor</td>
                        <td>Lorem ipsum dolor</td>
                        <td>Belum Lunas</td>
                        <td><button type="button" class="btn btn-danger">Batal</button></td>
                        <td><button type="button" class="btn btn-warning">Cetak</button></td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                        <td>Lorem ipsum dolor</td>
                        <td>Lorem ipsum dolor</td>
                        <td>Lorem ipsum dolor</td>
                        <td>Lorem ipsum dolor</td>
                        <td>Lunas</td>
                        <td><button type="button" class="btn btn-danger">Batal</button></td>
                        <td><button type="button" class="btn btn-warning">Cetak</button></td>
                        </tr>
                    </tbody>
                    <!--Table body-->

                    </table>
                    <!--Table-->

                    </div>
                    <div class="form-group">
                        <a href="{{ route('beli') }}" class="btn btnContact">Beli Tiket</a>
                    </div>
                </div>

            </form>
        </div>

    

    <!-- Your content goes here -->

</body>
</html>
