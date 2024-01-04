<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>List Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                    <a href="{{ route('dashboard-admin') }}" class="nav-item nav-link text-white">Dashboard</a>
                        <a href="{{ route('transactions.index')}}" class="nav-item nav-link text-white">Daftar Pesanan</a>
                        <a href="{{ route('tickets.index') }}" class="nav-item nav-link text-white">Stok Tiket</a>
                    </div>
                    <div class="navbar-nav ms-auto">
                        <a href="{{ route('logout') }}" class="nav-item nav-link text-white">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
    

    <div class="container contact-form">
            <form method="post">
                <h3>Daftar Pesanan</h3>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="search" class="form-label">Cari Pesanan:</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="search">
                            <button class="btn btn-primary" id="searchButton">Cari</button>
                        </div>
                    </div>
                </div>

               <div class="row">
                    <div class="table-responsive">

                    <!--Table-->
                    <table class="table">

                    <!--Table head-->
                    <thead>
                        <tr>
                        <th class="th-lg">ID</th>
                        <th class="th-lg">Jenis Tiket</th>
                        <th class="th-lg">Nama</th> 
                        <th class="th-lg">Status</th>       
                        <th class="th-lg">Total</th>            
                        <th class="th-lg">Detail</th>
                        </tr>
                    </thead>
                    <!--Table head-->

                    <!--Table body-->
                    <tbody>
                    @foreach($transactions as $transaksi)
                    <tr>
                        <td>{{ $transaksi->id }}</td>
                        <td>{{ $transaksi->kategori }}</td>
                        <td>{{ $transaksi->nama_pemilik }}</td>
                        <td>{{ $transaksi->payment_status }}</td>
                        <td>{{ $transaksi->total_bayar }}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-detail" data-toggle="modal" data-target="#detailModal{{ $transaksi->id }}">Detail</button>
                        </td>

                    </tr>
                    @endforeach
                    </tbody>
                    <!--Table body-->

                    </table>
                    <!--Table-->

                    </div>
            </form>
        </div>

    

    <!-- Your content goes here -->

        @foreach ($transactions as $transaksi)
        <!-- Modal -->
        <div class="modal fade" id="detailModal{{ $transaksi->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel{{ $transaksi->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detailModalLabel{{ $transaksi->id }}">Detail Transaksi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <table>
                            <tr>
                                <td>ID</td>
                                <td>:</td>
                                <td>{{ $transaksi->id }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Tiket</td>
                                <td>:</td>
                                <td>{{ $transaksi->kategori }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{ $transaksi->nama_pemilik }}</td>
                            </tr>
                            <tr>
                                <td>No. Telephone</td>
                                <td>:</td>
                                <td>{{ $transaksi->no_telephone }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah Tiket</td>
                                <td>:</td>
                                <td>{{ $transaksi->jumlah_tiket }}</td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td>:</td>
                                <td>{{ $transaksi->total_bayar }}</td>
                            </tr>
                            <tr>
                                <td>Status Pembayaran</td>
                                <td>:</td>
                                <td>{{ $transaksi->payment_status }}</td>
                            </tr>
                            <tr>
                                <td>Pesanan Dibuat</td>
                                <td>:</td>
                                <td>{{ $transaksi->created_at }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</body>
</html>

