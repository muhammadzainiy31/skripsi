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
        .search-form {
            display: flex;
            margin-bottom: 20px;
        }

        .search-input {
            flex: 1;
            margin-right: 10px;
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
                        <h4 class="card-title"> LAPORAN BARANG TERSEDIA</h4>
                        <br> <br>
                    </div>
                    <br>
                    <div class="search-form">
                        <input type="text" class="form-control search-input" placeholder="Search here" id="searchInput">
                        <button type="button" class="btn btn-primary" onclick="searchTable()"><i class="flaticon-381-search-2"></i></button>
                    </div>
                    <br>
                    <br>
                    <a href="../driver/input.php" class="btn btn-primary">Tambah Data</a>
                    <a href="cetak.php" class="btn btn-primary">Cetak Report</a>
                    <br> <br>
                    <table class="table table-bordered" id="dataTable">
                        <tr align="center" bgcolor="#E9967A">
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                        </tr>

                        <?php
                        include '../koneksi.php';
                        $no = 1;
                        $tampil = mysqli_query($conn, "SELECT kode_brg, nama_brg, jumlah_brg FROM tb_barang WHERE jumlah_brg > 0");
                        if (mysqli_num_rows($tampil) > 0) {
                            while ($hasil = mysqli_fetch_array($tampil)) {

                                echo "<tr>";
                                echo "<td>" . $no++ . "</td>";
                                echo "<td>" . $hasil['kode_brg'] . "</td>";
                                echo "<td>" . $hasil['nama_brg'] . "</td>";
                                echo "<td>" . $hasil['jumlah_brg'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr>";
                            echo "<td colspan='4' align='center'>Data kosong</td>";
                            echo "</tr>";
                        }
                        ?>

                    </table>
                    <br>

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
    
    <script>
        function searchTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("dataTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2]; // Adjust the column index for the desired search
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

</body>

</html>
