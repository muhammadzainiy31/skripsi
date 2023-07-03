<form method="POST" action="" enctype="multipart/form-data">
    <div class="form-group">
        <h4><label for="nm_cust">Nama Customer</label></h4>
        <select name="nm_cust" id="nm_cust" class="form-control" required>
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
            var nm_cust = document.getElementById("nm_cust").value;
            <?php
            $ambilData = mysqli_query($conn, "SELECT * FROM tb_customer") or die(mysqli_error($conn));
            while ($hasil = mysqli_fetch_array($ambilData)) {
                echo "if (nm_cust === '" . $hasil['nama_cust'] . "') {";
                echo "document.getElementById('no_telpon').value = '" . $hasil['no_telpon'] . "';";
                echo "document.getElementById('alamat_cust').value = '" . $hasil['alamat_cust'] . "';";
                echo "document.getElementById('kelurahan').value = '" . $hasil['kelurahan'] . "';";
                echo "document.getElementById('rute').value = '" . $hasil['rute'] . "';";
                echo "}";
            }
            ?>
        }

        // Panggil fungsi autofill saat combo box berubah
        document.getElementById("nm_cust").addEventListener("change", autofill);
    </script>

    <div class="form-group">
        <h4><label for="alamat_cust">Alamat</label></h4>
        <input type="text" class="form-control input-default" name="alamat_cust" id="alamat_cust" readonly>
    </div>

    <div class="form-group">
        <h4><label for="kelurahan">Kelurahan</label></h4>
        <input type="text" class="form-control input-default" name="kelurahan" id="kelurahan" readonly>
    </div>

    <div class="form-group">
        <h4><label for="rute">Rute</label></h4>
        <input type="text" class="form-control input-default" name="rute" id="rute" readonly>
    </div>

    <div class="mt-4"></div>
    <button class="btn btn-primary mr-2" name="simpan_pertama">Simpan</button>
    <a href="index.php" class="btn btn-danger">Batal</a>
</form>
