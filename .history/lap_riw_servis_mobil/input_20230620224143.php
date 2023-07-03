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
                                <h4 class="card-title">Input Riwayat Servis</h4>
                            </div>
                             <div class="card-body">
                                <div class="basic-form">
                                    <form action=""method="POST" enctype="multipart/form-data" >

                                     <div class="form-group">
                                             <h4 <label for="type_armada"  id="type_armada"> TYPE ARMADA </label>
                                            <br>
                                            <h4 <label><input type="radio" name="type_armada" value="HINO"> HINO</label>
                                            <h4 <label><input type="radio" name="type_armada" value="TAYO"> TAYO</label>
                                            <h4 <label><input type="radio" name="type_armada" value="KUDA"> KUDA</label>  
                                         </div>

                                 <div class="form-group">
                                      <h4 <label for="tanggal_servis"> Tanggal Servis </label>
                                         <input type="text" class="form-control input-default " name="tanggal_servis" class="form-control col-md-9" placeholder="Masukkan Nama">
                                     </div>

                                 <div class="form-group">
                                      <h4 <label for="tanggal_lahir"> TANGGAL LAHIR </label>
                                         <input type="date" class="form-control input-default " name="tanggal_lahir" class="form-control col-md-9" placeholder="Masukkan Password">
                                     </div>

                              <div class="form-group">
                                              <h4 <label for="jabatan"> JABATAN</label>
                                       <input type="text" class="form-control input-default " name="jabatan" class="form-control col-md-9" placeholder="Masukkan jabatan">
                                   </div>

                                     <div class="form-group">
                                                 <h4 <label for="sim"> TINGKAT SIM </label>
                                                 <input type="text" class="form-control input-default " name="sim" class="form-control col-md-9" placeholder="Masukkan Tingkat SIM">
                                     </div>

                           
                                        </div>
                                        <div class="mt-4"></div>
                                        <button class="btn btn-primary mr-2" name="simpan" >Simpan</button>
                                        <a href="index.php" class="btn btn-danger" >Batal</a>
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
        $nik_driver = $_POST['nik_driver'];
        $tanggal_servis = $_POST['tanggal_servis'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jabatan = $_POST['jabatan']; 
        $sim = $_POST['sim'];
        $alamat_driver = $_POST['alamat_driver'];
        $input = "INSERT INTO tb_driver VALUES ('','$nik_driver', '$tanggal_servis', '$tanggal_lahir',  '$jabatan', '$sim', '$alamat_driver'
        )";
        mysqli_query($conn, $input ); 
            echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang Disimpan....</h5></div>";
            echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/driver/index.php'>";
      }
