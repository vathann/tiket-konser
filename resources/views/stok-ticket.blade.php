<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stok</title>
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
        margin-bottom: 2%;
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

<script>
    $(document).ready(function () {
        // Inisialisasi DataTable
        var table = $('#myTable').DataTable();

        // Tambahkan event listener untuk pencarian berdasarkan input teks
        $('#search').on('keyup', function () {
            table.search(this.value).draw();
        });

        // Tambahkan event listener untuk pencarian berdasarkan tombol search
        $('#searchButton').on('click', function () {
            table.search($('#search').val()).draw();
        });
    });
</script>



</head>
<body>

<div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light container-fluid fixed-top">
            <div class="container-fluid">
                <a href="#" class="navbar-brand text-white">Admin</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="{{ route('listbuy') }}" class="nav-item nav-link active text-white">Daftar Pesanan</a>
                        <a href="{{ route('beli') }}" class="nav-item nav-link text-white">Stok Tiket</a>
                    </div>
                    <div class="navbar-nav ms-auto">
                        <a href="{{ route('home') }}" class="nav-item nav-link text-white">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
    

    <div class="container contact-form">
            <form method="post">
                <h3>Daftar Pesanan</h3>
                
               <div class="row">
                    <div class="table-responsive">

                    <!--Table-->
                    <table class="table">

                    <!--Table head-->
                    <thead>
                        <tr>
                        <th>No</th>
                        <th class="th-lg">Jenis Tiket</th>
                        <th class="th-lg">Harga</th>
                        <th class="th-lg">Sisa Stok</th>
                        <th class="th-lg">Aksi</th>
                        </tr>
                    </thead>
                    <!--Table head-->

                    <!--Table body-->
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>Day 1</td>
                        <td>Rp900.000</td>
                        <td>9</td>
                        <td>
                        <button type="button" class="btn btn-warning">Edit</button> 
                        <button type="button" class="btn btn-danger">Hapus</button></td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                        <td>Lorem ipsum dolor</td>
                        <td>Lorem ipsum dolor</td>
                        <td>Lorem ipsum dolor</td>
                        <td>
                        <button type="button" class="btn btn-warning">Edit</button> 
                        <button type="button" class="btn btn-danger">Hapus</button></td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                        <td>Lorem ipsum dolor</td>
                        <td>Lorem ipsum dolor</td>
                        <td>Lorem ipsum dolor</td>
                        <td>
                        <button type="button" class="btn btn-warning">Edit</button> 
                        <button type="button" class="btn btn-danger">Hapus</button></td>
                        </tr>
                    </tbody>
                    <!--Table body-->

                    </table>
                    <!--Table-->

                    </div>
            </form>
        </div>


        <script>
            $(document).ready(function () {
                // Tambahkan event listener untuk tombol "Edit"
                $('.btn-warning').on('click', function () {
                    // Ambil data dari baris tabel (di sini diasumsikan bahwa data di dalam kolom pertama)
                    var rowData = $(this).closest('tr').find('td').map(function () {
                        return $(this).text();
                    }).get();

                    // Isi data ke dalam card (misalnya, ke dalam input pada card)
                    $('#editData').val(rowData[1]); // Menggunakan indeks 1 untuk kolom kedua sebagai contoh

                    // Tampilkan card
                    $('#editCard').show();
                });
            });
        </script>


        <div id="editCard" class="card" style="display: none;">
            <div class="card-body">
                <!-- Isi card disini -->
                <h5 class="card-title">Edit Data</h5>
                <form>
                    <!-- Form untuk pengeditan data -->
                    <div class="mb-3">
                        <label for="editData">Edit Data:</label>
                        <input type="text" class="form-control" id="editData">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>


    <!-- Your content goes here -->

</body>
</html>
