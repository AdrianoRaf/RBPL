<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "ahlitanian");

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Validasi input
if (isset($_POST['deskripsi']) && isset($_POST['id_pakar']) && isset($_FILES['foto'])) {
    $deskripsi = $_POST['deskripsi'];
    $id_pakar = $_POST['id_pakar'];

    // Upload gambar
    $foto = $_FILES['foto']['name'];
    $tmp_foto = $_FILES['foto']['tmp_name'];
    $folder = "uploads/";

    if (!file_exists($folder)) {
        mkdir($folder, 0755, true);
    }

    if (move_uploaded_file($tmp_foto, $folder . $foto)) {
        $query = "INSERT INTO complaints (deskripsi, foto, id_pakar) VALUES ('$deskripsi', '$foto', '$id_pakar')";
        $result = mysqli_query($koneksi, $query);

        if ($result) {
            header("Location: payment.php");
            exit;
        } else {
            echo "Gagal menyimpan data ke database: " . mysqli_error($koneksi);
        }
    } else {
        echo "Gagal upload foto.";
    }
} else {
    echo "Data belum lengkap.";
}
?>
