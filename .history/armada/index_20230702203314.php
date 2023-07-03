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
                        <h4 class="card-title">DATA ARMADA</h4>
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
                    <a href="../armada/input.php" class="btn btn-primary">Tambah Data</a>
                    <a href="cetak.php" class="btn btn-primary">Cetak Report</a>
                    <br> <br>
                    <table class="table table-bordered">
                        <tr align="center" bgcolor="#E9967A">
                            <th>No</th>
                            <th>Nomor Polisi/Plat</th>
                            <th>Type Armada</th>
                            <th>Tahun</th>
                            <th>Estimasi</th>
                            <th>Aksi</th>
                        </tr>
                        <?php
                        $no = 1;
                        $tampil = mysqli_query($conn, "SELECT * tb_armada.no_plat, tb_armada.type_armada, tb_armada.tahun, riwayat_servis.estimasi AS terakhir_servis
                                                        FROM tb_armada
                                                        RIGHT JOIN riwayat_servis ON riwayat_servis.no_plat = tb_armada.no_plat");
                        // Menampilkan hasil
                        if (mysqli_num_rows($tampil) > 0) {
                            while ($hasil = mysqli_fetch_assoc($tampil)) {
                                ?>
                                <tr align="center">
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $hasil['no_plat'] ?></td>
                                    <td><?php echo $hasil['type_armada'] ?></td>
                                    <td><?php echo $hasil['tahun'] ?></td>
                                    <td><?php echo $hasil['terakhir_servis'] ?></td>
                                    <td>
                                        <!-- Tambahkan aksi sesuai kebutuhan -->
                                        <div class="d-flex">
                                            <a href="edit.php?no_plat=<?php echo $hasil['no_plat']; ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <a href="hapus.php?no_plat=<?php echo $hasil['no_plat']; ?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="6">Tidak ada data</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>

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
