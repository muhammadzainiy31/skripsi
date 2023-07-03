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
