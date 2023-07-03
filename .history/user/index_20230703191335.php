<?php
session_start();
include "../koneksi.php";

if (isset($_POST["login"])) {
    $nik = $_POST["nik"];
    $password = $_POST["password"];

    $query = "SELECT * FROM tb_user WHERE nik ='$nik'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $hasil = mysqli_fetch_assoc($result);

        if (password_verify($password, $hasil["password"])) {
            // ...

            $today = date('Y-m-d');
            $query_surat = "SELECT * FROM tb_pengirim WHERE nik_driver = '$nik' AND tanggal_kirim = '$today'";
            $result_surat = mysqli_query($conn, $query_surat);

            // ... (lanjutan kode)

            $no = 1;
            if (mysqli_num_rows($result_surat) > 0) {
                while ($hasil_surat = mysqli_fetch_assoc($result_surat)) {
                    $pembelian = explode(',', $hasil_surat['pembelian']); // Mengubah string pembelian menjadi array
                    ?>
                    <tr align="center">
                        <td>
                            <div class="d-flex">
                                <a href="cekin.php?id_surat=<?php echo $hasil_surat['id_surat']; ?>" class="btn btn-primary shadow btn-xs sharp mr-1">
                                    in
                                </a>
                                <a href="cekout.php?id_surat=<?php echo $hasil_surat['id_surat']; ?>" class="btn btn-danger shadow btn-xs sharp">
                                    out
                                </a>
                            </div>
                        </td>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $hasil_surat['id_pengiriman'] ?></td>
                        <td><?php echo $hasil_surat['id_surat'] ?></td>
                        <td><?php echo $hasil_surat['nm_cust'] ?></td>
                        <td><?php echo $hasil_surat['no_telpon'] ?></td>
                        <td><?php echo $hasil_surat['alamat_cust'] ?></td>
                        <td><?php echo $hasil_surat['kelurahan'] ?></td>
                        <td><?php echo $hasil_surat['rute'] ?></td>
                        <td><?php echo $hasil_surat['pembelian'] ?></td>
                        <td><?php echo $hasil_surat['tanggal_kirim'] ?></td>
                        <td><?php echo $hasil_surat['no_plat'] ?></td>
                        <td><?php echo $hasil_surat['type_armada'] ?></td>
                        <td><?php echo $hasil_surat['nik_driver'] ?></td>
                        <td><?php echo $hasil_surat['nama_driver'] ?></td>
                    </tr>
            <?php
                }
            } else {
            ?>
                <tr>
                    <td colspan="7" align="center">Data kosong</td>
                </tr>
            <?php
            }
        }
    }

    $error = true;
}
?>
