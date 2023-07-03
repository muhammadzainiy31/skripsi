
<?php
    include "koneksi.php";
    $surat_id = $_GET['surat_id'];
    $ambilData = mysqli_query($conn, "SELECT * FROM tb_report WHERE surat_id='$surat_id'");
    $hasil=mysqli_fetch_array($ambilData);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>APPLIKASI REPORT DELIVERY ORDER | </title>
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
                                <h4 class="card-title">Buat Pengiriman</h4>
                            </div>
                             <div class="card-body">
                                <div class="basic-form">
                                    <form action=""method="POST" enctype="multipart/form-data" >
                                <div class="form-group">
                                    <h4 <label for="surat_id"> ID SURAT </label></h4>
                                    <input type="number"  class="form-control input-default " name="surat_id" class="form-control col-md-9" placeholder="Masukkan Id Surat" autofocus required>
                                     </div>

                                 <div class="form-group">
                                      <h4 <label for="nm_cust"> nm_cust </label>
                                         <input type="text" class="form-control input-default " name="nm_cust" class="form-control col-md-9" placeholder="Masukkan nm_cust">
                                     </div>

                              <div class="form-group">
                                              <h4 <label for="no_telpon"> no_telpon </label>
                                       <input type="text" class="form-control input-default " name="no_telpon" class="form-control col-md-9" placeholder="Masukkan no_telpon">
                                   </div>

                                     <div class="form-group">
                                                 <h4 <label for="alamat_cust"> Alamat </label>
                                                 <input type="time" class="form-control input-default " name="alamat_cust" class="form-control col-md-9" placeholder="Masukkan Jam">
                                     </div>

                                          <div class="form-group">
                                        <h4 <label for="pembelian"> Pembelian</label>
                                        <input type="nutext" class="form-control input-default " name="pembelian" class="form-control col-md-9" placeholder="Masukkan KM BERANGKAT">
                                      </div>

                                      <div class="form-group">
                                        <h4 <label for="jam_tiba"> JAM TIBA </label>
                                           <input type="time" class="form-control input-default " name="jam_tiba" class="form-control col-md-9" placeholder="Masukkan JAM TIBA">
                                       </div>

                                      <div class="form-group">
                                            <h4 <label for="km_tiba"> KM TIBA </label>
                                          <input type="number" class="form-control input-default " name="km_tiba" class="form-control col-md-9" placeholder="Masukkan KM TIBA">
                                         </div>

                                         <div class="form-group">
                                         <h4 <label for="jumlah_km"> JUMLAH KM </label>
                                           <input type="number" class="form-control input-default " name="jumlah_km" class="form-control col-md-9" placeholder="Masukkan JUMLAH KM">
                                         </div>

                                         <div class="form-group">
                                             <h4 <label for="status"> STATUS </label>
                                       <br>
                                            <h4 <label><input type="radio" name="status" value="Terkrim"> Terkirim</label>
                                           <h4 <label><input type="radio" name="status" value="Pending"> Pending</label>    
                                         </div>

                                         <div class="form-group">
                                         <h4 <label for="keterangan"> KETERANGAN </label>
                                        <textarea class="form-control" name="deskripsi" id="deskripsi"  rows="5" placeholder="Deskripsi Produk" required></textarea>
                                        </div>

                                        </div>
                                        <input type="hidden" name="status" value="1">
                                        <div class="mt-4"></div>
                                        <button class="btn btn-primary mr-2" name="simpan" >Simpan</button>
                                        <a href="transaksi.php" class="btn btn-danger" >Batal</a>
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
    include "koneksi.php";
    if(isset($_POST['simpan']))
    {
        $surat_id = $_POST['surat_id'];
        $nm_cust = $_POST['nm_cust']; 
        $no_telpon = $_POST['no_telpon']; 
        $alamat_cust = $_POST['alamat_cust'];
        $pembelian = $_POST['pembelian'];
        $jam_tiba = $_POST['jam_tiba'];
        $km_tiba= $_POST['km_tiba'];
        $jumlah_km = $_POST['jumlah_km'];
        $status = $_POST['status'];
        $keterangan = $_POST['keterangan'];
        $input = "INSERT INTO tb_report VALUES (' ', '$surat_id', '$nm_cust', '$no_telpon', '$alamat_cust', '$pembelian', '$jam_tiba', '$km_tiba', '$jumlah_km', '$status','$keterangan'
        )";
        mysqli_query($conn, $input );
    header('location:..user/index.php'); 
          echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang Disimpan....</h5></div>";
          echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/user/index.php'>";
    }