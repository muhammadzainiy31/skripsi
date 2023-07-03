
<?php
    include "../koneksi.php";
    $id_surat = $_GET['id_surat'];
    $ambilData = mysqli_query($conn, "SELECT * FROM tb_surat WHERE id_surat='$id_surat'");
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
                                            <h4><label for="id_surat">ID SURAT</label></h4>
                                            <input type="number" class="form-control input-default" name="id_surat" id="id_surat" value="<?php echo $hasil['id_surat']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="nm_cust">NAMA CUSTOMER </label></h4>
                                            <input type="text" class="form-control input-default" name="nm_cust" id="nm_cust" value="<?php echo $hasil['nm_cust']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="no_telpon">NO TELPON</label></h4>
                                            <input type="text" class="form-control input-default" name="no_telpon" id="no_telpon" value="<?php echo $hasil['no_telpon']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="alamat_cust">ALAMAT</label></h4>
                                            <input type="text" class="form-control input-default" name="alamat_cust" id="alamat_cust" value="<?php echo $hasil['alamat_cust']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="kelurahan">KELURAHAN</label></h4>
                                            <input type="text" class="form-control input-default" name="kelurahan" id="kelurahan" value="<?php echo $hasil['kelurahan']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="rute">RUTE</label></h4>
                                            <input type="text" class="form-control input-default" name="rute" id="rute" value="<?php echo $hasil['rute']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="pembelian">PEMBELIAN</label></h4>
                                            <input type="text" class="form-control input-default" name="pembelian" id="pembelian" value="<?php echo $hasil['pembelian']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="tanggal_kirim">TANGGAL KIRIM</label></h4>
                                            <input type="text" class="form-control input-default" name="tanggal_kirim" id="tanggal_kirim" value="<?php echo $hasil['tanggal_kirim']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="no_plat">NO PLAT</label></h4>
                                            <select name="no_plat" id="no_plat" class="form-control" required>
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
                                            <h4><label for="no_telpon">Telpon</label></h4>
                                            <input type="text" class="form-control input-default" name="no_telpon" id="no_telpon" readonly>
                                        </div>

                                        <script>
                                            // Fungsi untuk melakukan autofill pada no_telpon dan alamat_cust
                                            function autofill() {
                                                var no_plat = document.getElementById("no_plat").value;
                                                <?php
                                                $ambilData = mysqli_query($conn, "SELECT * FROM tb_customer") or die(mysqli_error($conn));
                                                while ($hasil = mysqli_fetch_array($ambilData)) {
                                                    echo "if (no_plat === '" . $hasil['nama_cust'] . "') {";
                                                    echo "document.getElementById('no_telpon').value = '" . $hasil['no_telpon'] . "';";
                                                    echo "document.getElementById('alamat_cust').value = '" . $hasil['alamat_cust'] . "';";
                                                    echo "document.getElementById('kelurahan').value = '" . $hasil['kelurahan'] . "';";
                                                    echo "document.getElementById('rute').value = '" . $hasil['rute'] . "';";
                                                    echo "}";
                                                }
                                                ?>
                                            }

                                            // Panggil fungsi autofill saat combo box berubah
                                            document.getElementById("no_plat").addEventListener("change", autofill);
                                        </script>


                                        <div class="form-group">
                                            <h4><label for="no_plat">NO PLAT</label></h4>
                                            <input type="text" class="form-control input-default" name="no_plat" id="no_plat" value="<?php echo $hasil['no_plat']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="type_armada"> TYPE ARMADA</label></label></h4>
                                            <input type="text" class="form-control input-default" name="type_armada" id="type_armada" value="<?php echo $hasil['type_armada']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="nik_drive">NAMA</label></h4>
                                            <input type="text" class="form-control input-default" name="nik_drive" id="nik_drive" value="<?php echo $hasil['nik_drive']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <h4><label for="nama_driver">NAMA</label></h4>
                                            <input type="text" class="form-control input-default" name="nama_driver" id="nama_driver" value="<?php echo $hasil['nama_driver']; ?>">
                                        </div>

                                
                                        </div>
                                        <input type="hidden" name="status" value="1">
                                        <div class="mt-4"></div>
                                        <button class="btn btn-primary mr-2" name="alamat_custpan" >alamat_custpan</button>
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
    include "../koneksi.php";
    if(isset($_POST['alamat_custpan']))
    {
        $id_surat = $_POST['id_surat'];
        $nm_cust = $_POST['nm_cust']; 
        $no_telpon = $_POST['no_telpon']; 
        $alamat_cust = $_POST['alamat_cust'];
        $pembelian = $_POST['pembelian'];
        $jam_tiba = $_POST['jam_tiba'];
        $km_tiba= $_POST['km_tiba'];
        $jumlah_km = $_POST['jumlah_km'];
        $status = $_POST['status'];
        $keterangan = $_POST['keterangan'];
        $input = "INSERT INTO tb_pengirim VALUES (' ', '$id_surat', '$nm_cust', '$no_telpon', '$alamat_cust', '$pembelian', '$jam_tiba', '$km_tiba', '$jumlah_km', '$status','$keterangan'
        )";
        mysqli_query($conn, $input );
    header('location:..user/index.php'); 
          echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang Dialamat_custpan....</h5></div>";
          echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/user/index.php'>";
    }