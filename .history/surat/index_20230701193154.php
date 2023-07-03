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
                        $query = "SELECT * FROM tb_surat 
                        INNER JOIN tb_pembelian ON tb_surat.id_surat = tb_pembelian.id_pembelian 
                        WHERE tb_pembelian.tgl_beli BETWEEN '$mulai_tanggal' AND '$sampai_tanggal'";
                        $result = mysqli_query($conn, $query);

                        // Tampilkan data sesuai hasil filter
                        if (mysqli_num_rows($result) > 0) {
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr align="center">';
                                echo '<td>' . $no++ . '</td>';
                                echo '<td>' . $row['id_surat'] . '</td>';
                                echo '<td>' . $row['nm_cust'] . '</td>';
                                echo '<td>' . $row['no_telpon'] . '</td>';
                                echo '<td>' . $row['alamat_cust'] . '</td>';
                                echo '<td>' . $row['kelurahan'] . '</td>';
                                echo '<td>' . $row['rute'] . '</td>';
                                echo '<td>' . $row['id_pembelian'] . '</td>';
                                echo '<td>' . $row['Barang'] . '</td>';
                                echo '<td>' . $row['qty'] . '</td>';
                                echo '<td>' . $row['Harga'] . '</td>';
                                echo '<td>' . $row['tgl_beli'] . '</td>';
                                echo '<td>' . $row['tgl_kirim'] . '</td>';
                                echo '<td>';
                                // Aksi untuk setiap baris data
                                echo '<div class="d-flex">';
                                echo '<a href="beli.php?id_surat=' . $row['id_surat'] . '" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>';
                                echo '</div>';
                                echo '</td>';
                                echo '<td>';
                                echo '<div class="d-flex">';
                                echo '<a href="edit.php?id_surat=' . $row['id_surat'] . '" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>';
                                echo '<a href="hapus.php?id_surat=' . $row['id_surat'] . '" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>';
                                echo '</div>';
                                echo '</td>';
                                echo '</tr>';
                            }
                        } else {
                            echo '<tr><td colspan="13" align="center">Data tidak ditemukan.</td></tr>';
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
                                <th>Aksi</th>
                            </tr>
                            <?php
                            $query = "SELECT tb_surat.id_surat, tb_surat.nm_cust, tb_surat.no_telpon, tb_surat.alamat_cust, tb_surat.kelurahan, tb_surat.rute,
                                        tb_pembelian.id_pembelian, tb_pembelian.Barang, tb_pembelian.qty, tb_pembelian.Harga, tb_pembelian.tgl_beli, tb_pembelian.tgl_kirim
                                        FROM tb_surat
                                        INNER JOIN tb_pembelian ON tb_surat.id_surat = tb_pembelian.id_surat";
                            $result = mysqli_query($conn, $query);

                            if (mysqli_num_rows($result) > 0) {
                                $no = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr align="center">';
                                    echo '<td>' . $no++ . '</td>';
                                    echo '<td>' . $row['id_surat'] . '</td>';
                                    echo '<td>' . $row['nm_cust'] . '</td>';
                                    echo '<td>' . $row['no_telpon'] . '</td>';
                                    echo '<td>' . $row['alamat_cust'] . '</td>';
                                    echo '<td>' . $row['kelurahan'] . '</td>';
                                    echo '<td>' . $row['rute'] . '</td>';
                                    echo '<td>' . $row['id_pembelian'] . '</td>';
                                    echo '<td>' . $row['Barang'] . '</td>';
                                    echo '<td>' . $row['qty'] . '</td>';
                                    echo '<td>' . $row['Harga'] . '</td>';
                                    echo '<td>' . $row['tgl_beli'] . '</td>';
                                    echo '<td>' . $row['tgl_kirim'] . '</td>';
                                    echo '<td>';
                                    // Aksi untuk setiap baris data
                                    echo '<div class="d-flex">';
                                    echo '<a href="beli.php?id_surat=' . $row['id_surat'] . '" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>';
                                    echo '</div>';
                                    echo '</td>';
                                    echo '<td>';
                                    echo '<div class="d-flex">';
                                    echo '<a href="edit.php?id_surat=' . $row['id_surat'] . '" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>';
                                    echo '<a href="hapus.php?id_surat=' . $row['id_surat'] . '" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>';
                                    echo '</div>';
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr><td colspan="13" align="center">Data kosong</td></tr>';
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