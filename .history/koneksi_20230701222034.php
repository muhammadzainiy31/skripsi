<?php
$conn = mysqli_connect ("localhost", "root","","db_report_delivery_order");
date_default_timezone_set("Asia/Singapore");
?>

<?php
session_start();
include "koneksi.php";

// Fungsi untuk memeriksa apakah pengguna telah login
function checkLogin() {
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }
}

// Fungsi untuk memperbarui waktu terakhir tindakan pengguna
function updateLastAction() {
    $_SESSION["last_action"] = time();
}

// Fungsi untuk memeriksa apakah pengguna telah keluar karena tidak aktif
function checkInactiveTimeout($timeout = 300) {
    $lastAction = $_SESSION["last_action"] ?? 0;
    $inactiveTimeout = $timeout; // Waktu tidak aktif dalam detik (default: 300 detik / 5 menit)

    if (time() - $lastAction > $inactiveTimeout) {
        logout();
    } else {
        updateLastAction();
    }
}

// Fungsi untuk logout pengguna
function logout() {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

// Memeriksa status login
checkLogin();

// Memeriksa apakah pengguna tidak aktif dan melakukan logout jika perlu
checkInactiveTimeout();

if (isset($_POST["login"])) {
    // ... kode login yang ada ...

    // Memperbarui waktu terakhir tindakan pengguna setelah login
    updateLastAction();
}
?>
