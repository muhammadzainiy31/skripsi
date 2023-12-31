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
        <?php include "../theme-header.php" ?>
        <?php include "../theme-sidebar.php" ?>

        <!-- Content body start -->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Input</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Data</a></li>
                    </ol>
                </div>
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
                                            <h4>
                                                <label for="kode_brg">Kode Barang</label>
                                                <select name="kode_brg[]" id="kode_brg" class="form-control" required multiple>
                                                    <option value="">-PILIH-</option>
                                                    <?php
                                                    include "../koneksi.php";
                                                    $ambilData = mysqli_query($conn, "SELECT * FROM tb_barang") or die(mysqli_error($conn));
                                                    while ($hasil = mysqli_fetch_array($ambilData)) {
                                                        echo '<option value="' . $hasil['kode_brg'] . '">' .
                                                            $hasil['kode_brg'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </h4>
                                        </div>
                                        <div class="form-group">
                                            <h4><label for="nm_brng">Nama Barang</label></h4>
                                            <input type="text" class="form-control input-default" name="nm_brng[]" id="nm_brng" readonly>
                                        </div>
                                        <script>
                                            // Fungsi untuk melakukan autofill pada nm_brng
                                            function autofillBrg() {
                                                var kode_brg = document.getElementById("kode_brg").value;
                                                <?php
                                                $ambilData = mysqli_query($conn, "SELECT * FROM tb_barang") or die(mysqli_error($conn));
                                                while ($hasil = mysqli_fetch_array($ambilData)) {
                                                    echo "if (kode_brg.includes('" . $hasil['kode_brg'] . "')) {";
                                                    echo "document.getElementById('nm_brng').value += '" . $hasil['nama_brg'] . " | ';";
                                                    echo "}";
                                                }
                                                ?>
                                            }

                                            // Panggil fungsi autofill saat combo box berubah
                                            document.getElementById("kode_brg").addEventListener("change", autofillBrg);
                                        </script>
                                        <div class="form-group">
                                            <h4><label for="jmlh">Jumlah Barang</label></h4>
                                            <?php
                                            $ambilData = mysqli_query($conn, "SELECT * FROM tb_barang") or die(mysqli_error($conn));
                                            while ($hasil = mysqli_fetch_array($ambilData)) {
                                                echo '<input type="number" class="form-control input-default" name="jmlh[]" placeholder="Jumlah ' . $hasil['nama_brg'] . '">';
                                            }
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <h4><label for="tanggal_kirim">Tanggal Kirim</label></h4>
                                            <input type="date" class="form-control input-default" name="tanggal_kirim" placeholder="Masukkan Tanggal Kirim">
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
        <?php include "../theme-footer.php" ?>
    </div>
    <!-- Main wrapper end -->

    <!-- Scripts -->
    <!-- Required vendors -->
    <script src="../vendor/global/global.min.js"></script>
    <script src="../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../js/custom.min.js"></script>
    <script src="../js/deznav-init.js"></script>
</body>

</html>
