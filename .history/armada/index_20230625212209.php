


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>APPLIKASI REPORT DELIVERY ORDER| DATA</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/2.png">
    	<link href="../vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper">

    <?php include "../theme-header.php" ?>
    <?php include "../theme-sidebar.php" ?>

        <!--**********************************
            Content body start
        ***********************************-->

        
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54
55
56
57
58
59
60
61
62
63
64
65
66
67
68
69
70
71
72
73
74
75
76
77
78
79
80
81
82
<div class="container">
	<h2 align="center" style="margin: 30px;">Filter &amp; Search pada PHP ke Semua Kolom</h2>
	<?php 
		$s_jurusan="";
        $s_keyword="";
        if (isset($_POST['search'])) {
            $s_jurusan = $_POST['s_jurusan'];
            $s_keyword = $_POST['s_keyword'];
        }
	?>
	<form method="POST" action="">
        <div class="row mb-3">
		    <div class="col-sm-12"><h4>Cari</h4></div>
		    <div class="col-sm-3">
		        <div class="form-group">
		            <select name="s_jurusan" id="s_jurusan" class="form-control">
		                <option value="">Filter Jurusan</option>
		                <option value="Sistem Informasi" <?php if ($s_jurusan=="Sistem Informasi"){ echo "selected"; } ?>>Sistem Informasi</option>
		                <option value="Teknik Informatika" <?php if ($s_jurusan=="Teknik Informatika"){ echo "selected"; } ?>>Teknik Informatika</option>
		            </select>
		        </div>
		    </div>
		    <div class="col-sm-4">
		        <div class="form-group">
		            <input type="text" placeholder="Keyword" name="s_keyword" id="s_keyword" class="form-control" value="<?php echo $s_keyword; ?>">
		        </div>
        <div class="content-body">
            <div class="container-fluid">
            <div class="card-body">
                <div class="card-header">
                    <h4 class="card-title">DATA ARMADA</h4>
                      <br> <br>
              </div>
              <br>
					<div class="input-group search-area ml-auto d-inline-flex">
						<input type="text" class="form-control" placeholder="Search here">
						<div class="input-group-append">
							<button type="button" class="input-group-text"><i class="flaticon-381-search-2"></i></button>
						</div>
					</div>




                    <br>
                    <br>
                <a href="../armada/input.php" class="btn btn-primary">Tambah Data</a> 
                <a href="cetak.php" class="btn btn-primary">Cetak Report</a>
                <br> <br>
                <table class="table table-bordered">
            <tr align="center"  bgcolor="#E9967A">
                <th>No</th>
                <th>Nomor Polisi/Plat</th>
                <th>Type Armada</th>
                <th>Tahun</th>
                <th>Terakhir Servis</th>
                <th>Aksi</th>
            </tr>
            <?php
            include'../koneksi.php';
            $no =1;
            $tampil = mysqli_query ($conn, "SELECT * FROM tb_armada ORDER BY id DESC ");
            if (mysqli_num_rows ($tampil)>0) {
              while($hasil = mysqli_fetch_array($tampil)){

            ?>
                <tr align="center" >
                  <td><?php echo $no++ ?> </td>
                  <td><?php echo $hasil ['no_plat']?></td>
                  <td><?php echo $hasil ['type_armada']?></td>
                  <td><?php echo $hasil ['tahun']?> </td>
                  <td><?php echo $hasil ['terakhir_servis']?> </td>
                  <td>
                    
													<div class="d-flex">
														<a href="edit.php?no_plat=<?php echo $hasil['no_plat'];?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
														<a href="hapus.php?no_plat=<?php echo $hasil['no_plat'];?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
													</div>
                  </td>
                </tr>
                <?php }} else{ ?>
                <tr>
                    <td colspan="7" align="center" >Data kosong</td>
                </tr>
                <?php } ?>
           </table>
           <br>

         </div>
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

    <!-- Required vendors -->
    <script src="../vendor/global/global.min.js"></script>
	<script src="../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../js/custom.min.js"></script>
	<script src="../js/deznav-init.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	

    <script src="../vendor/highlightjs/highlight.pack.min.js"></script>
    <!-- Circle progress -->



</body>

</html>