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
                                <h4 class="card-title">Input Data Barang</h4>
                            </div>
                             <div class="card-body">
                                <div class="basic-form">
                                    <form action=""method="POST" enctype="multipart/form-data" >

                                 <div class="form-group">
                                      <h4 <label for="nama_brg">BARANG </label>
                                         <input type="text" class="form-control input-default " name="nama_brg" class="form-control col-md-9" placeholder="Masukkan Nama Barang">
                                     </div>

                                     
                                     <div class="form-group">
                                             <h4 <label for="departemen"  id="departemen"> DEPARTEMEN </label>
                                            <br>
                                            <h4 <label><input type="radio" name="type_armada" value="KAMAR TIDUR"> KAMAR TIDUR</label>
                                            <h4 <label><input type="radio" name="type_armada" value="DAPUR DAN RUANG MAKAN"> DAPUR DAN RUANG MAKAN</label>
                                            <h4 <label><input type="radio" name="type_armada" value="KUDA"> RUANG TAMU</label> 
                                            <h4 <label><input type="radio" name="type_armada" value="KUDA"> RUANG KERJA</label>  
                                         </div>

                              <div class="form-group">
                                              <h4 <label for="jumlah_brg"> JUMLAH</label>
                                       <input type="number" class="form-control input-default " name="jumlah_brg" class="form-control col-md-9" placeholder="Masukkan Jumlah Barang">
                                   </div>

                                        </div>
                                        <input type="hidden" name="status" value="1">
                                        <div class="mt-4"></div>
                                        <button class="btn btn-primary mr-2" name="simpan" >Simpan</button>
                                        <a href="./index.php" class="btn btn-danger" >Batal</a>
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
    if(isset($_POST['simpan']))
    {
        $kode_brg = $_POST['kode_brg'];
        $nama_brg = $_POST['nama_brg']; 
        $jumlah_brg = $_POST['jumlah_brg'];
        $input = "INSERT INTO tb_barang VALUES ('$kode_brg', '$nama_brg', '$jumlah_brg'
        )";
        
        mysqli_query($conn, $input); 
          echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang Disimpan....</h5></div>";
          echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/barang/index.php'>";
    }