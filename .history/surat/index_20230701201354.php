<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bagian lain dari tag head -->
</head>
<body>
    <!-- Bagian sebelumnya -->
    <?php
    // Memasukkan koneksi ke database, sebelum melakukan query
                        include '../koneksi.php';

    // Cek koneksi ke database
    if (mysqli_connect_errno()) {
        echo "Koneksi ke database gagal: " . mysqli_connect_error();
        exit();
    }

    // Query untuk mengambil data dari tabel dengan inner join
    $query = "SELECT tb_surat.id_surat, tb_surat.nm_cust, tb_surat.no_telpon, tb_surat.alamat_cust, tb_surat.kelurahan, tb_surat.rute,
            tb_pembelian.id_pembelian, tb_pembelian.Barang, tb_pembelian.qty, tb_pembelian.Harga, tb_pembelian.tgl_beli, tb_pembelian.tgl_kirim
            FROM tb_surat
            INNER JOIN tb_pembelian ON tb_surat.id_surat = tb_pembelian.id_pembelian";
    $result = mysqli_query($conn, $query);

    // Tampilkan data sesuai hasil query
    if (mysqli_num_rows($result) > 0) {
        echo "<table class='table table-bordered'>
                <tr align='center' bgcolor='#E9967A'>
                    <th>No</th>
                    <th>ID Surat</th>
                    <th>Nama Customer</th>
                    <th>No. Telepon</th>
                    <th>Alamat Customer</th>
                    <th>Kelurahan</th>
                    <th>Rute</th>
                    <th>ID Pembelian</th>
                    <th>Barang</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Tanggal Pembelian</th>
                    <th>Tanggal Pengiriman</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>";

        $no = 1;
        while ($hasil = mysqli_fetch_assoc($result)) {
            echo "<tr align='center'>
                    <td>".$no++."</td>
                    <td>".$hasil["id_surat"]."</td>
                    <td>".$hasil["nm_cust"]."</td>
                    <td>".$hasil["no_telpon"]."</td>
                    <td>".$hasil["alamat_cust"]."</td>
                    <td>".$hasil["kelurahan"]."</td>
                    <td>".$hasil["rute"]."</td>
                    <td>".$hasil["id_pembelian"]."</td>
                    <td>".$hasil["Barang"]."</td>
                    <td>".$hasil["qty"]."</td>
                    <td>".$hasil["Harga"]."</td>
                    <td>".$hasil["tgl_beli"]."</td>
                    <td>".$hasil["tgl_kirim"]."</td>
                    <td>
                        <div class='d-flex'>
                            <a href='edit.php?id_surat=".$hasil['id_surat']."' class='btn btn-primary shadow btn-xs sharp mr-1'><i class='fa fa-pencil'></i></a>
                        </div>
                    </td>
                    <td>
                        <div class='d-flex'>
                            <a href='delete.php?id_surat=".$hasil['id_surat']."' class='btn btn-danger shadow btn-xs sharp'><i class='fa fa-trash'></i></a>
                        </div>
                    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data yang ditemukan.";
    }

    // Tutup koneksi ke database
    mysqli_close($conn);
    ?>
    <!-- Bagian selanjutnya -->
</body>
</html>
