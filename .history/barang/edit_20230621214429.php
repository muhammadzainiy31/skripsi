
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>APPLIKASI REPORT DELIVERY ORDER | EDIT DATA</title>
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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Data</a></li>
                    </ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Data Barang</h4>
                            </div>
                            <?php
    include "../koneksi.php";
    if(isset($_POST['tambah_jumlah']))
    {
        $id_barang = $_POST['id_barang'];
        $tambah_jumlah = $_POST['tambah_jumlah'];
        
        // Mendapatkan jumlah_brg sebelumnya
        $query = "SELECT jumlah_brg FROM tb_barang WHERE id_barang = '$id_barang'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $jumlah_brg_sebelumnya = $row['jumlah_brg'];
        
        // Menambahkan jumlah_brg
        $jumlah_brg_baru = $jumlah_brg_sebelumnya + $tambah_jumlah;
        
        // Update jumlah_brg
        $update = "UPDATE tb_barang SET jumlah_brg = '$jumlah_brg_baru' WHERE id_barang = '$id_barang'";
        mysqli_query($conn, $update);
        
        echo "<div align='center'><h5> Jumlah Barang Telah Ditambahkan</h5></div>";
        echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/barang/index.php'>";
    }
?>

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
