<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "ahlitanian");

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari tabel
$query = "SELECT * FROM bukti_pembayaran ORDER BY uploaded_at DESC";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Bukti Pembayaran</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="daspet.css" />
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        background-color: #fff8e1;
      }

      h2.title {
        text-align: center;
        color: #6d4c41;
        margin-top: 40px;
        margin-bottom: 20px;
      }

      table {
        width: 90%;
        margin: 0 auto 60px;
        border-collapse: collapse;
        background-color: #fff3e0;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      }

      th, td {
        padding: 12px 16px;
        border: 1px solid #d7ccc8;
        text-align: center;
      }

      th {
        background-color: #a1887f;
        color: #fff;
      }

      tr:nth-child(even) {
        background-color: #fbe9e7;
      }

      img.bukti {
        width: 120px;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      }
    </style>
  </head>
  <body>

    <!-- Navbar -->
    <header class="header">
      <div class="logo">AHLITANIAN.COM</div>
      <nav class="nav">
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="dashboardadmin.html">Home</a>
        <a href="aboutadmin.html">About</a>
        <a href="control.php">Control</a>
        <a href="projectadmin.html">Projects</a>
        <a href="newsadmin.html">News</a>
        <a href="#">Contact</a>
      </nav>
      <div class="contact-info">Call Anytime: +98 (000) - 9630</div>
    </header>

    <!-- Hero Section -->
    <section class="hero" style="position: relative; text-align: center; color: white;">
      <img src="newstrak.png" alt="Tractor" class="hero-image" style="width: 100%; height: auto; display: block;" />
      <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
        display: flex; flex-direction: column; align-items: center; gap: 10px;">
        <p style="font-size: 18px; margin: 0;">Home / Control</p>
        <h1 style="font-size: 48px; margin: 0;">Control</h1>
      </div>
    </section>

    <!-- Tabel Bukti Pembayaran -->
    <h2 class="title">Bukti Pembayaran yang Telah Diupload</h2>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Nama File</th>
          <th>Gambar</th>
          <th>Waktu Upload</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        while ($data = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $no++ . "</td>";
            echo "<td>" . htmlspecialchars($data['nama_file']) . "</td>";
            echo "<td><img src='uploads/" . htmlspecialchars($data['nama_file']) . "' class='bukti' alt='Bukti Pembayaran'></td>";
            echo "<td>" . $data['uploaded_at'] . "</td>";
            echo "</tr>";
        }
        ?>
      </tbody>
    </table>

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
        <p>
          Bringing Food Production Back To Cities<br /><small>July 5, 2022</small>
        </p>
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
