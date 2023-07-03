<?php
// Koneksi ke database
$servername = "nama_server";
$username = "nama_pengguna";
$password = "kata_sandi";
$dbname = "nama_database";
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mendapatkan data stok barang yang tersedia
$query = "SELECT kode_brg, nama_brg, jumlah_brg FROM tb_barang WHERE jumlah_brg > 0";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Membuat tabel laporan
    echo "<table>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang</th>
            </tr>";

    // Menampilkan data stok barang yang tersedia
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['kode_brg']."</td>";
        echo "<td>".$row['nama_brg']."</td>";
        echo "<td>".$row['jumlah_brg']."</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada barang yang tersedia.";
}

// Menutup koneksi
$conn->close();
?>
