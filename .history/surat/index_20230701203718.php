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
                                <th>ID Surat</th>
                                <th>Nama Customer</th>
                                <th>No. Telepon</th>
                                <th>Alamat Customer</th>
                                <th>Kelurahan</th>
                                <th>Rute</th>
                                <th>ID Pembelian</th>
                                <th>Barang</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Tanggal Pembelian</th>
                                <th>Tanggal Pengiriman</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr> 
                            <?php
                            include '../koneksi.php';
                            $no = 1;
                            $tampil = mysqli_query($conn, "SELECT * FROM tb_surat");

                            if (mysqli_num_rows($tampil) > 0) {
                                while ($hasil = mysqli_fetch_array($tampil)) {
                            ?>
                           
                                    <tr align="center">
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $hasil["id_surat"]?></td>
                                        <td><?php echo $hasil["nm_cust"]?></td>
                                        <td><?php echo $hasil["no_telpon"]?></td>
                                        <td><?php echo $hasil["alamat_cust"]?></td>
                                        <td><?php echo $hasil["kelurahan"]?></td>
                                        <td><?php echo $hasil["rute"]?></td>
                                        <td><?php echo $hasil["id_pembelian"]?></td>
                                        <td><?php echo $hasil["Barang"]?></td>
                                        <td><?php echo $hasil["qty"]?></td>
                                        <td><?php echo $hasil["Harga"]?></td>
                                        <td><?php echo $hasil["tgl_beli"]?></td>
                                        <td><?php echo $hasil["tgl_kirim"]?></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="edit.php?id_surat=<?php echo $hasil['id_surat']; ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="edit.php?id_surat=<?php echo $hasil['id_surat']; ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                                <a href="delete.php?id_surat=<?php echo $hasil['id_surat']; ?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <?php include "../theme-footer.php" ?>
    </div>

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="../vendor/global/global.min.js"></script>
    <script src="../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../js/custom.min.js"></script>
    <script src="../js/deznav-init.js"></script>
    <script src="../vendor/apexchart/apexchart.js"></script>
    <!-- Vectormap -->
    <script src="../vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../vendor/chartjs-plugin-datalabels/dist/chartjs-plugin-datalabels.js"></script>
    <script src="../vendor/echarts/echarts.min.js"></script>
    <script src="../js/dashboard/dashboard-1.js"></script>
</body>

</html>
