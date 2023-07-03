
<?php
                            session_start();
                            include "koneksi.php";

                            if (isset($_POST["login"])) {
                                $nik = $_POST["nik"];
                                $password = $_POST["password"];

                                $query = "SELECT * FROM tb_user WHERE nik ='$nik'";
                                $result = mysqli_query($conn, $query);

                                if (mysqli_num_rows($result) == 1) {
                                    $hasil = mysqli_fetch_assoc($result);

                                    if (password_verify($password, $hasil["password"])) {
                                        // ...
                                        
                                        $today = date('Y-m-d');
                                        $query = "SELECT * FROM tb_data WHERE nik = '$nik' AND tanggal = '$today'";
                                        $result = mysqli_query($conn, $query);

                                        // ... (lanjutan kode)

                                    }
                                }

                                $error = true;
                            }
                            ?>


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

        <?php include "theme-header.php" ?>
        <?php include "theme-sidebar.php" ?>

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
                    <br>
                    <br>
                    <a href="rdo.php" class="btn btn-primary">Lihat RDO</a>
                    <a href="cetak.php" class="btn btn-primary">Cetak Report</a>
                    <br> <br>
                    <div class="scroll-horizontal">
                        <table class="table table-bordered">
                            <tr align="center" bgcolor="#E9967A">
                                <th>Aksi</th>
                                <th>No</th>
                                <th>Id Pengiriman</th>
                                <th>Id Surat</th>
                                <th>Nama Customer</th>
                                <th>Telpon</th>
                                <th>Alamat</th>
                                <th>Kelurahan</th>
                                <th>Rute</th>
                                <th>Pembelian</th>
                                <th>Tanggal Pengiriman</th>
                                <th>NO Plat</th>
                                <th>Type Armada</th>
                                <th>NIK Driver</th>
                                <th>Nama Driver</th>
                                <th>Driver</th>
                            </tr>
                            <?php
                            include '../koneksi.php';
                            $no = 1;
                            $tampil = mysqli_query($conn, "SELECT * FROM tb_pengirim ORDER BY id_pengiriman DESC");

                            if (mysqli_num_rows($tampil) > 0) {
                                while ($hasil = mysqli_fetch_array($tampil)) {
                                    $pembelian = explode(',', $hasil['pembelian']); // Mengubah string pembelian menjadi array
                                    ?>
                                    <tr align="center">
                                        <td>
                                            <div class="d-flex">
                                                <a href="cekin.php?id_surat=<?php echo $hasil['id_surat']; ?>" class="btn btn-primary shadow btn-xs sharp mr-1">
                                                    in
                                                </a>
                                                <a href="cekout.php?id_surat=<?php echo $hasil['id_surat']; ?>" class="btn btn-danger shadow btn-xs sharp">
                                                    out
                                                </a>
                                            </div>
                                        </td>

                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $hasil['id_pengiriman'] ?></td>
                                        <td><?php echo $hasil['id_surat'] ?></td>
                                        <td><?php echo $hasil['nm_cust'] ?></td>
                                        <td><?php echo $hasil['no_telpon'] ?></td>
                                        <td><?php echo $hasil['alamat_cust'] ?></td>
                                        <td><?php echo $hasil['kelurahan'] ?></td>
                                        <td><?php echo $hasil['rute'] ?></td>
                                        <td><?php echo $hasil['pembelian'] ?></td>
                                        <td><?php echo $hasil['tanggal_kirim'] ?></td>
                                        <td><?php echo $hasil['no_plat'] ?></td>
                                        <td><?php echo $hasil['type_armada'] ?></td>
                                        <td><?php echo $hasil['nik_driver'] ?></td>
                                        <td><?php echo $hasil['nama_driver'] ?></td>
                            <?php
                                }
                            } else {
                            ?>
                                <tr>
                                    <td colspan="7" align="center">Data kosong</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <?php include "theme-footer.php" ?>

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
