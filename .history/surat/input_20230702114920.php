<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>APPLIKASI REPORT DELIVERY ORDER | INPUT DATA</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/2.png">
    <!-- Custom Stylesheet -->
    <link href="../vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Preloader start -->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!-- Preloader end -->

    <!-- Main wrapper start -->
    <div id="main-wrapper">
        <?php include "../theme-header.php"; ?>
        <?php include "../theme-sidebar.php"; ?>

        <!-- Content body start -->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Input</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Data</a></li>
                    </ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Input Data Surat</h4>
                            </div>
                            <div class="card-body">
                                <div class="basic-form">
                                    <form method="POST" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <h4><label for="cust">Nama Customer</label></h4>
                                            <select name="cust" id="cust" class="form-control" required>
                                                <option value="">-PILIH-</option>
                                                <?php
                                                include "../koneksi.php";
                                                $ambilData = mysqli_query($conn, "SELECT * FROM tb_customer") or die(mysqli_error($conn));
                                                while ($hasil = mysqli_fetch_array($ambilData)) {
                                                    echo '<option value="' . $hasil['nama_cust'] . '">' . $hasil['nama_cust'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="tlpn">Telpon</label></h4>
                                            <input type="text" class="form-control input-default" name="tlpn" id="tlpn" readonly>
                                        </div>

                                        <script>
                                            // Fungsi untuk melakukan autofill pada tlpn dan alamat
                                            function autofill() {
                                                var cust = document.getElementById("namacust").value;
                                                <?php
                                                include "../koneksi.php";
                                                $ambilData = mysqli_query($conn, "SELECT * FROM tb_customer") or die(mysqli_error($conn));
                                                while ($hasil = mysqli_fetch_array($ambilData)) {
                                                    echo "if (cust === '" . $hasil['nama_cust'] . "') {";
                                                    echo "document.getElementById('tlpn').value = '" . $hasil['tlpn'] . "';";
                                                    echo "document.getElementById('alamat').value = '" . $hasil['alamat'] . "';";
                                                    echo "document.getElementById('kelurahan').value = '" . $hasil['kelurahan'] . "';";
                                                    echo "document.getElementById('rute').value = '" . $hasil['rute'] . "';";
                                                    echo "}";
                                                }
                                                ?>
                                            }

                                            // Panggil fungsi autofill saat combo box berubah
                                            document.getElementById("cust").addEventListener("change", autofill);
                                        </script>

                                        <div class="form-group">
                                            <h4><label for="alamat">Alamat</label></h4>
                                            <input type="text" class="form-control input-default" name="alamat" id="alamat" readonly>
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="kelurahan">Kelurahan</label></h4>
                                            <input type="text" class="form-control input-default" name="kelurahan" id="kelurahan" readonly>
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="rute">Rute</label></h4>
                                            <input type="text" class="form-control input-default" name="rute" id="rute" readonly>
                                        </div>
                                        <div class="mt-4"></div>
                                        <button class="btn btn-primary mr-2" name="simpan">Simpan</button>
                                        <a href="index.php" class="btn btn-danger">Batal</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content body end -->

        <?php include "../theme-footer.php"; ?>
    </div>
    <!-- Main wrapper end -->

    <!-- Scripts -->
    <!-- Required vendors -->
    <script src="../vendor/global/global.min.js"></script>
    <script src="../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../js/custom.min.js"></script>
    <script src="../js/deznav-init.js"></script>

    <?php
    include "../koneksi.php";
    if (isset($_POST['simpan'])) {
        $cust = $_POST['cust'];
        $tlpn = $_POST['tlpn'];
        $alamat = $_POST['alamat'];
        $kelurahan = $_POST['kelurahan'];
        $rute = $_POST['rute'];
        $input = "INSERT INTO tb_surat (cust, tlpn, alamat, kelurahan, rute) VALUES ('$cust', '$tlpn', '$alamat', '$kelurahan', '$rute')";

        echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang Disimpan....</h5></div>";
        echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/surat/index.php'>";
    }
    ?>
</body>

</html>
