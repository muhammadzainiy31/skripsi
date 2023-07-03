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
                        <h4 class="card-title">DATA DRIVER</h4>
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
                    <a href="../driver/input.php" class="btn btn-primary">Tambah Data</a>
                    <a href="cetak.php" class="btn btn-primary">Cetak Report</a>
                    <?php
                    // Koneksi ke database
                    $servername = "nama_server";
                    $username = "nama_pengguna";
                    $password = "kata_sandi";
                    $dbname = "nama_database";
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Cek koneksi
                    if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                    }

                    // Query untuk mendapatkan data stok barang yang tersedia
                    $query = "SELECT kode_brg, nama_brg, jumlah_brg FROM tb_barang WHERE jumlah_brg > 0";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        // Membuat tabel laporan
                        echo "<table>
                                <tr>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Barang</th>
                                </tr>";

                        // Menampilkan data stok barang yang tersedia
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['kode_brg'] . "</td>";
                            echo "<td>" . $row['nama_brg'] . "</td>";
                            echo "<td>" . $row['jumlah_brg'] . "</td>";
                            echo "</tr>";
                        }

                        echo "</table>";
                    } else {
                        echo "Tidak ada barang yang tersedia.";
                    }

                    // Menutup koneksi
                    $conn->close();
                    ?>

                    <div class="d-flex">
                        <a href="edit.php?nik_driver=<?php echo $hasil['nik_driver']; ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                        <a href="hapus.php?nik_driver=<?php echo $hasil['nik_driver']; ?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                    </div>
                    </td>
                    </tr>
                    <?php }}else{ ?>
                    <tr>
                        <td colspan="7" align="center">Data kosong</td>
                    </tr>
                    <?php } ?>
                    </table>
                    <br>

                </div>
            </div>
        </div>
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
