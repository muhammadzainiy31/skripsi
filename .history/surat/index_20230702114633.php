<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>APPLIKASI REPORT DELIVERY ORDER | DATA</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/2.png">
    <link href="../vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <style>
        .scroll-horizontal {
            overflow-x: auto;
        }
    </style>
</head>

<body>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper">
        <?php include "../theme-header.php" ?>
        <?php include "../theme-sidebar.php" ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">DATA SURAT</h4>
                        <br> <br>
                    </div>
                    <br>
                    <div class="input-group search-area ml-auto d-inline-flex">
                        <input type="text" class="form-control" placeholder="Search here">
                        <div class="input-group-append">
                            <button type="button" class="input-group-text"><i class="flaticon-381-search-2"></i></button>
                        </div>
                    </div>
                    

                    <!-- Bagian form filter -->
                    <div class="container align-items-center">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col form-group">
                                    <label for="inputMulaiTanggal" class="font-weight-bold">Mulai Tanggal :</label>
                                    <input type="date" id="inputMulaiTanggal" name="mulai_tanggal" class="form-control" required>
                                </div>
                                <div class="col form-group">
                                    <label for="inputSampaiTanggal" class="font-weight-bold">Sampai Tanggal :</label>
                                    <input type="date" id="inputSampaiTanggal" name="sampai_tanggal" class="form-control" required>
                                </div>
                                <div class="col-auto form-group">
                                    <button type="submit" name="filter" class="btn btn-success mt-3">Tampilkan</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Bagian proses filter -->
                    <?php
                    // Cek apakah filter sudah di-submit
                    if (isset($_POST['filter'])) {
                        // Ambil tanggal mulai dan tanggal sampai dari form
                        $mulai_tanggal = $_POST['mulai_tanggal'];
                        $sampai_tanggal = $_POST['sampai_tanggal'];

                        // Buat query dengan kondisi filter tanggal
                        $query = "SELECT * FROM pemasukan WHERE tgl_pemasukan BETWEEN '$mulai_tanggal' AND '$sampai_tanggal'";
                        $result = mysqli_query($conn, $query);

                        // Tampilkan data sesuai hasil filter
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                // Tampilkan data sesuai kebutuhan Anda
                                // ...
                            }
                        } else {
                            echo "Data tidak ditemukan.";
                        }
                    }
                    ?>
                    <br>
                    <br>
                    <a href="../surat/input.php" class="btn btn-primary">Buat Surat</a>
                    <a href="cetak.php" class="btn btn-primary">Cetak Report</a>
                    <br>
                    <br>
                    <div class="scroll-horizontal">
                        <table class="table table-bordered">
                            <tr align="center" bgcolor="#E9967A">
                                <th>No</th>
                                <th>Id Surat</th>
                                <th>Nama Customer</th>
                                <th>Telpon</th>
                                <th>Alamat</th>
                                <th>Kelurahan</th>
                                <th>Rute</th>
                                <th>Beli</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            include '../koneksi.php';
                            $no = 1;
                            $tampil = mysqli_query($conn, "SELECT * FROM tb_surat ORDER BY id_surat DESC");

                            if (mysqli_num_rows($tampil) > 0) {
                                while ($hasil = mysqli_fetch_assoc($tampil)) {
                                    ?>
                                    <tr align="center">
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $hasil['id_surat'] ?></td>
                                        <td><?php echo $hasil['cust'] ?></td>
                                        <td><?php echo $hasil['no_telpon'] ?></td>
                                        <td><?php echo $hasil['alamat_cust'] ?></td>
                                        <td><?php echo $hasil['kelurahan'] ?></td>
                                        <td><?php echo $hasil['rute'] ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="beli.php?id_surat=<?php echo $hasil['id_surat']; ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="edit.php?id_surat=<?php echo $hasil['id_surat']; ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                <a href="hapus.php?id_surat=<?php echo $hasil['id_surat']; ?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="7" align="center">Data kosong</td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <?php include "../theme-footer.php" ?>

    </div>

    <!-- Required vendors -->
    <script src="../vendor/global/global.min.js"></script>
    <script src="../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../js/custom.min.js"></script>
    <script src="../js/deznav-init.js"></script>
    <script src="../vendor/highlightjs/highlight.pack.min.js"></script>
    <!-- Circle progress -->
</body>

</html>
