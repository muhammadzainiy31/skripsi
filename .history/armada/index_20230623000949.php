<?php
// Mengambil inputan dari pengguna
$inputan = array();

include '../koneksi.php';
$tampil = mysqli_query($conn, "SELECT * FROM tb_armada ORDER BY terakhir_servis DESC");
if (mysqli_num_rows($tampil) > 0) {
    while ($hasil = mysqli_fetch_array($tampil)) {
        $inputan[] = $hasil;
    }
}

// Menampilkan inputan yang telah diurutkan
$no = 1;
foreach ($inputan as $hasil) {
    ?>
    <tr align="center">
        <td><?php echo $no++; ?> </td>
        <td><?php echo $hasil['no_plat']; ?></td>
        <td><?php echo $hasil['type_armada']; ?></td>
        <td><?php echo $hasil['tahun']; ?> </td>
        <td><?php echo $hasil['terakhir_servis']; ?> </td>
        <td>
            <div class="d-flex">
                <a href="edit.php?no_plat=<?php echo $hasil['no_plat']; ?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                <a href="hapus.php?no_plat=<?php echo $hasil['no_plat']; ?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
            </div>
        </td>
    </tr>
<?php
} else {
    ?>
    <tr>
        <td colspan="7" align="center">Data kosong</td>
    </tr>
<?php
}
?>
