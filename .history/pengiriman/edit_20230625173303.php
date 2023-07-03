
<?php
    include "koneksi.php";
    $surat_id = $_GET['surat_id'];
    $ambilData = mysqli_query($conn, "SELECT * FROM tb_surat WHERE surat_id='$surat_id'");
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
                                     </div><div class="form-group">
                                            <h4><label for="nik_driver">NIK DRIVER</label></h4>
                                            <input type="number" class="form-control input-default" name="nik_driver" id="nik_driver" value="<?php echo $hasil['nik_driver']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="nama_driver">NAMA</label></h4>
                                            <input type="text" class="form-control input-default" name="nama_driver" id="nama_driver" value="<?php echo $hasil['nama_driver']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="tanggal_lahir">TANGGAL LAHIR</label></h4>
                                            <input type="date" class="form-control input-default" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo $hasil['tanggal_lahir']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="jabatan">JABATAN</label></h4>
                                            <input type="text" class="form-control input-default" name="jabatan" id="jabatan" value="<?php echo $hasil['jabatan']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="sim">TINGKAT SIM</label></h4>
                                            <input type="text" class="form-control input-default" name="sim" id="sim" value="<?php echo $hasil['sim']; ?>">
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