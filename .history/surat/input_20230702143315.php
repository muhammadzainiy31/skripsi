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
                                    <form method="POST" action="" enctype="multipart/form-data"><?php
// Koneksi ke database
$host = "localhost"; // ganti dengan host database Anda
$username = "username"; // ganti dengan username database Anda
$password = "password"; // ganti dengan password database Anda
$database = "nama_database"; // ganti dengan nama database Anda

$conn = mysqli_connect($host, $username, $password, $database);

// Periksa koneksi
if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Ambil data nm_cust dari tabel tb_customer
$query = "SELECT nm_cust FROM tb_customer";
$result = mysqli_query($conn, $query);
?>

<!-- Tampilkan form untuk menambah data surat -->
<form method="POST" action="proses_tambah_surat.php">
  <label for="nm_cust">Nama Customer:</label>
  <select name="nm_cust" id="nm_cust" onchange="fillData()">
    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
      <option value="<?= $row['nm_cust'] ?>"><?= $row['nm_cust'] ?></option>
    <?php endwhile; ?>
  </select>
  <br>
  <label for="no_telpon">Nomor Telepon:</label>
  <input type="text" name="no_telpon" id="no_telpon">
  <br>
  <label for="alamat_cust">Alamat Customer:</label>
  <input type="text" name="alamat_cust" id="alamat_cust">
  <br>
  <label for="kelurahan">Kelurahan:</label>
  <input type="text" name="kelurahan" id="kelurahan">
  <br>
  <label for="rute">Rute:</label>
  <input type="text" name="rute" id="rute">
  <br>
  <input type="submit" value="Tambah Data">
</form>

<!-- Include JavaScript -->
<script>
  function fillData() {
    var nm_cust = document.getElementById("nm_cust").value;

    // Kirim permintaan Ajax ke file PHP untuk mendapatkan data customer
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var data = JSON.parse(this.responseText);

        // Isi nilai no_telpon, alamat_cust, kelurahan, dan rute
        document.getElementById("no_telpon").value = data.no_telpon;
        document.getElementById("alamat_cust").value = data.alamat_cust;
        document.getElementById("kelurahan").value = data.kelurahan;
        document.getElementById("rute").value = data.rute;
      }
    };
    xhttp.open("GET", "get_customer_data.php?nm_cust=" + nm_cust, true);
    xhttp.send();
  }
</script>

<?php
// Tutup koneksi
mysqli_close($conn);
?>

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

    <script>
        // Fungsi untuk melakukan autofill pada no_telpon, alamat_cust, kelurahan, dan rute
        function autofill() {
            var nm_cust = document.getElementById("nm_cust").value;
            <?php
            include "../koneksi.php";
            $ambilData = mysqli_query($conn, "SELECT * FROM tb_customer") or die(mysqli_error($conn));
            while ($hasil = mysqli_fetch_array($ambilData)) {
                echo "if (nm_cust === '" . $hasil['nama_cust'] . "') {";
                echo "document.getElementById('no_telpon').value = '" . $hasil['no_telpon'] . "';";
                echo "document.getElementById('alamat_cust').value = '" . $hasil['alamat_cust'] . "';";
                echo "document.getElementById('kelurahan').value = '" . $hasil['kelurahan'] . "';";
                echo "document.getElementById('rute').value = '" . $hasil['rute'] . "';";
                echo "}";
            }
            ?>
        }

        // Panggil fungsi autofill saat combo box berubah
        document.getElementById("nm_cust").addEventListener("change", autofill);
    </script>
</body>

</html>

<?php
include "../koneksi.php";
if (isset($_POST['simpan'])) {
    $nm_cust = $_POST['nm_cust'];
    $no_telpon = $_POST['no_telpon'];
    $alamat_cust = $_POST['alamat_cust'];
    $kelurahan = $_POST['kelurahan'];
    $rute = $_POST['rute'];
    $input = "INSERT INTO tb_surat (nm_cust, no_telpon, alamat_cust, kelurahan, rute) VALUES ('$nm_cust', '$no_telpon', '$alamat_cust', '$kelurahan', '$rute')";

    echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang Disimpan....</h5></div>";
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/surat/index.php'>";
}
?>
