

<form method="POST" action="" enctype="multipart/form-data">
    <div class="form-group">
        <h4><label for="kode_brg">Kode Barang</label></h4>
        <select name="kode_brg" id="kode_brg" class="form-control" required>
            <option value="">-PILIH-</option>
            <?php
            include "../koneksi.php";
            $ambilData = mysqli_query($conn, "SELECT * FROM tb_barang") or die(mysqli_error($conn));
            while ($hasil = mysqli_fetch_array($ambilData)) {
                echo '<option value="' . $hasil['kode_brg'] . '">' . $hasil['kode_brg'] . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <h4><label for="nm_brng">Nama Barang</label></h4>
        <input type="text" class="form-control input-default" name="nm_brng" id="nm_brng" readonly>
    </div>

    <script>
        // Fungsi untuk melakukan autofill pada nm_brng
        function autofillBrg() {
            var kode_brg = document.getElementById("kode_brg").value;
            <?php
            $ambilData = mysqli_query($conn, "SELECT * FROM tb_barang") or die(mysqli_error($conn));
            while ($hasil = mysqli_fetch_array($ambilData)) {
                echo "if (kode_brg === '" . $hasil['kode_brg'] . "') {";
                echo "document.getElementById('nm_brng').value = '" . $hasil['nama_brg'] . "';";
                echo "}";
            }
            ?>
        }

        // Panggil fungsi autofill saat combo box berubah
        document.getElementById("kode_brg").addEventListener("change", autofillBrg);
    </script>

    <div class="form-group">
        <h4><label for="qty">Qty</label></h4>
        <input type="number" class="form-control input-default" name="qty" id="qty" min="1" required>
    </div>

    <div class="form-group">
        <h4><label for="tanggal_kirim">Tanggal Kirim</label></h4>
        <input type="date" class="form-control input-default" name="tanggal_kirim" placeholder="Masukkan Tanggal Kirim">
    </div>

    <div class="mt-4"></div>
    <button class="btn btn-primary mr-2" name="simpan_kedua">Simpan</button>
    <a href="index.php" class="btn btn-danger">Batal</a>
</form>

</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content body end -->

        <?php include "../theme-footer.php"; ?>
    </div>
    <!-- Main wrapper end -->

    <!-- Scripts -->
    <!-- Required vendors -->
    <script src="../vendor/global/global.min.js"></script>
    <script src="../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="../js/custom.min.js"></script>
    <script src="../js/deznav-init.js"></script>
</body>

</html>

<?php
include "../koneksi.php";
if (isset($_POST['simpan'])) {
    $nm_cust = $_POST['nm_cust'];
    $no_telpon = $_POST['no_telpon'];
    $alamat_cust = $_POST['alamat_cust'];
    $kelurahan = $_POST['kelurahan'];
    $rute = $_POST['rute'];
    $input = "INSERT INTO tb_surat (nm_cust, no_telpon, alamat_cust, kelurahan, rute) VALUES ('$nm_cust', '$no_telpon', '$alamat_cust', '$kelurahan', '$rute')";
    mysqli_query($conn, $input) or die(mysqli_error($conn));

    echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang Disimpan....</h5></div>";
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/RDO/surat/index.php'>";
}
?>

