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

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

    <?php include "../theme-header.php" ?>
    <?php include "../theme-sidebar.php" ?>

     <!--**********************************
         Content body start
     ***********************************-->
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
                                    <form action=""method="POST" action enctype="multipart/form-data" >
                                        

                                   
                                 <div class="form-group">
                                    <h4>
  <label for="nm_cust">Nama Customer</label>
  <select name="nm_cust" id="nm_cust" class="form-control" required> 
    <option value="">-PILIH-</option>
    <?php
      include "../koneksi.php";
      $ambilData = mysqli_query($conn, "SELECT * FROM tb_customer") or die(mysqli_error($conn));
      while ($hasil = mysqli_fetch_array($ambilData)) {
        echo '<option value="' . $hasil['id_cust'] . '">' . 
          $hasil['nama_cust'] . ' ' . $hasil['no_telpon'] . ' ' . $hasil['alamat_cust'] . '</option>';
      }
    ?>
  </select>
</h4>


                                     <div class="form-group"><h4>
  <label for="nm_brng">Kode Barang</label>
  <select name="nm_brng" id="nm_brng" class="form-control" required> 
    <option value="">-PILIH-</option>
    <?php
      include "../koneksi.php";
      $ambilData = mysqli_query($conn, "SELECT * FROM tb_barang") or die(mysqli_error($conn));
      while ($hasil = mysqli_fetch_array($ambilData)) {
        echo '<option value="' . $hasil['kode_brg'] . '">' . 
          $hasil['kode_brg'] . ' ' . $hasil['nama_brg'] . '</option>';
      }
    ?>
  </select>
</h4>


                                          <div class="form-group"><div class="form-group">
  <h4><label for="jmlh">Jumlah Barang</label></h4>
  <input type="number" class="form-control input-default" name="jmlh" placeholder="Masukkan Jumlah Barang">
</div>

<div class="form-group">
  <h4><label for="armada">No.Polisi/Plat</label></h4>
  <select name="armada" id="armada" class="form-control" required> 
    <option value="">-PILIH-</option>
    <?php
      include "../koneksi.php";
      $ambilData = mysqli_query($conn, "SELECT * FROM tb_armada") or die(mysqli_error($conn));
      while ($hasil = mysqli_fetch_array($ambilData)) {
        echo '<option value="' . $hasil['id'] . '">' . 
          $hasil['no_plat'] . ' ' . $hasil['type_armada'] . '</option>';
      }
    ?>
  </select>
</div>

<div class="form-group">
  <h4><label for="driver">Driver</label></h4>
  <select name="driver" id="driver" class="form-control" required> 
    <option value="">-PILIH-</option>
    <?php
      include "../koneksi.php";
      $ambilData = mysqli_query($conn, "SELECT * FROM tb_driver") or die(mysqli_error($conn));
      while ($hasil = mysqli_fetch_array($ambilData)) {
        echo '<option value="' . $hasil['id_driver'] . '">' . 
          $hasil['nik_driver'] . ' ' . $hasil['nama_driver'] . '</option>';
      }
    ?>
  </select>
</div>

                                        </div>
                                        

                                    </div><div class="mt-4"></div>
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
        <!--**********************************
            Content body end
        ***********************************-->


        <?php include "../theme-footer.php" ?>
        
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="../vendor/global/global.min.js"></script>
	<script src="../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../js/custom.min.js"></script>
	<script src="../js/deznav-init.js"></script>

</body>
</html>
<?php
include "../koneksi.php";
if (isset($_POST['simpan'])) {
    $nm_cust = $_POST['nm_cust'];
    $nm_brng = $_POST['nm_brng'];
    $jmlh = $_POST['jmlh'];
    $armada = $_POST['armada'];
    $driver = $_POST['driver'];
    $input = "INSERT INTO tb_surat VALUES ('', '$nm_cust', '$nm_brng', '$jmlh', '$armada', '$driver')";
}
?>

