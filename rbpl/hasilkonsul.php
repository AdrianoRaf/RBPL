<?php
$koneksi = new mysqli("localhost", "root", "", "ahlitanian");

if ($koneksi->connect_error) {
  die("Koneksi gagal: " . $koneksi->connect_error);
}

$query = "SELECT deskripsi, foto, id_pakar, solusi, created_at FROM complaints";
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Organic Agriculture</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="daspet.css" />

  <!-- Bootstrap (opsional jika ingin lebih fleksibel) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

  <style>
    .complaints-section {
      background-color: #f9fbe7;
      padding: 50px 20px;
    }
    .complaints-section h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #33691e;
      font-weight: bold;
    }
    .complaints-table {
      background-color: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    .complaints-table th {
      background-color: #33691e;
      color: white;
      text-align: center;
    }
    .complaints-table td {
      vertical-align: middle;
    }
    .img-thumb {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 8px;
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
      <a href="dashboardpetani.html">Home</a>
      <a href="aboutpetani.html">About</a>
      <a href="service.html">Services</a>
      <a href="projectpetani.html">Projects</a>
      <a href="newspetani.html">News</a>
      <a href="hasilkonsul.php">Konsultasi</a>
    </nav>
    <div class="contact-info">Call Anytime: +98 (000) - 9630</div>
  </header>

  <!-- Hero Section -->
  <section class="hero" style="position: relative; text-align: center; color: white;">
    <img src="newstrak.png" alt="Tractor" class="hero-image" style="width: 100%; height: auto; display: block;" />
    <div style="
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 10px;
    ">
      <p style="font-size: 18px; margin: 0;">Home / Konsultasi</p>
      <h1 style="font-size: 48px; margin: 0;">Konsultasi</h1>
    </div>
  </section>

  <!-- Complaints Section -->
  <section class="complaints-section">
    <div class="container">
      <h2>Daftar Keluhan</h2>
      <div class="table-responsive complaints-table">
        <table class="table table-bordered table-hover align-middle">
          <thead>
            <tr>
              <th>Deskripsi</th>
              <th>Foto</th>
              <th>ID Pakar</th>
              <th>Solusi</th>
              <th>Dibuat Pada</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
              <tr>
                <td><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></td>
                <td>
                  <?php if (!empty($row['foto'])): ?>
                    <img src="uploads/<?= htmlspecialchars($row['foto']) ?>" alt="Foto" class="img-thumb">
                  <?php else: ?>
                    <span class="text-muted">Tidak ada</span>
                  <?php endif; ?>
                </td>
                <td><span class="badge bg-success">#<?= $row['id_pakar'] ?></span></td>
                <td><?= $row['solusi'] ? nl2br(htmlspecialchars($row['solusi'])) : '<span class="text-danger">Belum ada</span>' ?></td>
                <td><?= date("d M Y H:i", strtotime($row['created_at'])) ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
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
