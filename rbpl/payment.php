<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "ahlitanian");

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Proses upload jika tombol submit ditekan
if (isset($_POST['submit'])) {
    $nama_file = $_FILES['bukti']['name'];
    $tmp_file = $_FILES['bukti']['tmp_name'];
    $target_dir = "uploads/";

    // Pastikan folder 'uploads' ada
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($nama_file);

    if (move_uploaded_file($tmp_file, $target_file)) {
        $insert = "INSERT INTO bukti_pembayaran (nama_file) VALUES ('$nama_file')";
        if (mysqli_query($koneksi, $insert)) {
            echo "<script>alert('Upload berhasil!');</script>";
        } else {
            echo "<script>alert('Gagal menyimpan ke database');</script>";
        }
    } else {
        echo "<script>alert('Upload file gagal');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Organic Agriculture</title>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="daspet.css" />
  </head>
  <body>
    <!-- Navbar -->
    <header class="header">
      <div class="logo">AHLITANIAN.COM</div>
      <nav class="nav">
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="dashboardpetani.html">Home</a>
        <a href="about.html">About</a>
        <a href="service.html">Services</a>
        <a href="projectpetani.html">Projects</a>
        <a href="news.html">News</a>
        <a href="#">Contact</a>
      </nav>
      <div class="contact-info">Call Anytime: +98 (000) - 9630</div>
    </header>

    <!-- Hero Section -->
    <section class="hero" style="position: relative; text-align: center; color: white;">
      <img src="newstrak.png" alt="Tractor" class="hero-image" style="width: 100%; height: auto; display: block;" />
      <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
                  display: flex; flex-direction: column; align-items: center; gap: 10px;">
        <p style="font-size: 18px; margin: 0;">Home / Service</p>
        <h1 style="font-size: 48px; margin: 0;">Service</h1>
      </div>
    </section>

    <!-- Section Upload Pembayaran -->
    <section style="padding: 60px 20px; background-color: #fff;">
      <div class="container" style="max-width: 900px; margin: 0 auto; text-align: center;">

        <!-- QR Code -->
        <div style="background-color: #e5bf56; padding: 40px; border-radius: 15px; margin-bottom: 50px;">
          <img src="qr.png" alt="QR Code" style="width: 250px; height: 250px; object-fit: contain;
              box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 10px;" />
        </div>

        <!-- Judul -->
        <p style="color: #c89c00; font-weight: 500; margin: 0;">Proof of Payment</p>
        <h2 style="font-size: 32px; font-weight: bold; margin-top: 10px;">Upload Bukti Pembayaran</h2>

        <!-- Form Upload -->
        <form action="payment.php" method="POST" enctype="multipart/form-data" style="margin-top: 30px;">
          <div style="display: flex; justify-content: center;">
            <label style="width: 500px; height: 300px; background-color: #ccc; border-radius: 10px;
                display: flex; justify-content: center; align-items: center; cursor: pointer; position: relative;">
              <input type="file" name="bukti" accept="image/*" required style="opacity: 0; position: absolute;
                  width: 100%; height: 100%; cursor: pointer;" />
              <i class="fa fa-camera" style="font-size: 50px; color: #666;"></i>
            </label>
          </div>

          <!-- Tombol Upload -->
          <button type="submit" name="submit" style="margin-top: 20px; background-color: #4CAF50;
              color: white; padding: 10px 25px; border: none; border-radius: 8px; font-weight: bold;">
            UPLOAD
          </button>
        </form>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
      <div class="footer-left">
        <h3>AHLITANIAN.COM</h3>
        <p>There are many variations of passages...</p>
        <div class="socials">🔗</div>
      </div>
      <div class="footer-center">
        <h4>Explore</h4>
        <ul>
          <li>About</li>
          <li>Services</li>
          <li>Our Projects</li>
          <li>Meet the Farmers</li>
          <li>Latest News</li>
          <li>Contact</li>
        </ul>
      </div>
      <div class="footer-news">
        <h4>News</h4>
        <p>Bringing Food Production Back To Cities<br /><small>July 5, 2022</small></p>
        <p>The Future of Farming...<br /><small>July 5, 2022</small></p>
      </div>
      <div class="footer-contact">
        <h4>Contact</h4>
        <p>📞 666 888 0000</p>
        <p>📧 needhelp@company.com</p>
        <p>📍 80 brooklyn golden street line, New York</p>
        <input type="email" placeholder="Your Email Address" />
      </div>
    </footer>
  </body>
</html>
