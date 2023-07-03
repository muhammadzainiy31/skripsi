<?php
// Menghubungkan ke database
$servername = "nama_server";
$username = "nama_pengguna";
$password = "kata_sandi";
$database = "nama_database";

$conn = mysqli_connect($servername, $username, $password, $database);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query SQL dengan INNER JOIN
$query = "SELECT tb_surat.id_surat, tb_surat.nm_cust, tb_surat.no_telpon, tb_surat.alamat_cust, tb_surat.kelurahan, tb_surat.rute,
          tb_pembelian.id_pembelian, tb_pembelian.Barang, tb_pembelian.qty, tb_pembelian.Harga, tb_pembelian.tgl_beli, tb_pembelian.tgl_kirim
          FROM tb_surat
          INNER JOIN tb_pembelian ON tb_surat.id_surat = tb_pembelian.id_pembelian";

$result = mysqli_query($conn, $query);

// Memeriksa apakah query berhasil dieksekusi
if ($result) {
    // Memeriksa apakah terdapat data hasil INNER JOIN
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Mengakses nilai setiap kolom dalam hasil INNER JOIN
            $id_surat = $row['id_surat'];
            $nm_cust = $row['nm_cust'];
            $no_telpon = $row['no_telpon'];
            $alamat_cust = $row['alamat_cust'];
            $kelurahan = $row['kelurahan'];
            $rute = $row['rute'];
            $id_pembelian = $row['id_pembelian'];
            $Barang = $row['Barang'];
            $qty = $row['qty'];
            $Harga = $row['Harga'];
            $tgl_beli = $row['tgl_beli'];
            $tgl_kirim = $row['tgl_kirim'];

            // Gunakan nilai-nilai ini sesuai dengan kebutuhan Anda
            // ...
        }
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

// Menutup koneksi ke database
mysqli_close($conn);
?>
