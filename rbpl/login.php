<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "ahlitanian"); // Ganti nama database sesuai milikmu

$email = $_POST['email'];
$password = $_POST['password'];

// Query ke database
$query = $koneksi->query("SELECT * FROM user WHERE email='$email' AND password='$password'");

if ($query->num_rows > 0) {
    $data = $query->fetch_assoc();

    $_SESSION['email'] = $data['email'];
    $_SESSION['nama'] = $data['nama'];

    // Tentukan role berdasarkan nama (jika tidak ada kolom 'role')
    $nama = strtolower($data['nama']);
    if ($nama == 'admin') {
        header("Location: dashboardadmin.html");
    } elseif (strpos($nama, 'petani') !== false) {
        header("Location: dashboardpetani.html");
    } elseif (strpos($nama, 'pakar') !== false) {
        header("Location: dashboardpakar.html");
    } else {
        echo "Role tidak dikenali.";
    }
} else {
    echo "<script>alert('Email atau password salah!'); window.location.href='login.php';</script>";
}
?>
