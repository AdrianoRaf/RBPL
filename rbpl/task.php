<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Task - Ahli Tanian</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Monoton&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="daspet.css" />
  <style>
    table {
      width: 90%;
      margin: 30px auto;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    th, td {
      padding: 12px 15px;
      border: 1px solid #ddd;
      text-align: center;
    }
    th {
      background-color: #4CAF50;
      color: white;
    }
    textarea {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      resize: vertical;
    }
    button {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 10px;
    }
    form {
      margin: 0;
    }
    h2 {
      text-align: center;
      margin-top: 40px;
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
          <a href="dashboardpakar.html">Home</a>
          <a href="aboutpakar.html">About</a>
          <a href="task.php">Task</a>
          <a href="projectpakar.html">Projects</a>
          <a href="newspakar.html">News</a>
          <a href="#">Contact</a>
        </nav>
    <div class="contact-info">Call Anytime: +98 (000) - 9630</div>
  </header>

  <!-- Hero Section -->
  <section class="hero" style="position: relative; text-align: center; color: white;">
    <img src="newstrak.png" alt="Tractor" class="hero-image" style="width: 100%; height: auto; display: block;" />
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); display: flex; flex-direction: column; align-items: center; gap: 10px;">
      <p style="font-size: 18px; margin: 0;">Home / Task</p>
      <h1 style="font-size: 48px; margin: 0;">Task</h1>
    </div>
  </section>

  <!-- PHP Logic -->
  <?php
  $koneksi = mysqli_connect("localhost", "root", "", "ahlitanian");
  if (!$koneksi) { die("Koneksi gagal: " . mysqli_connect_error()); }
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['solusi'])) {
    $id = $_POST['id'];
    $solusi = mysqli_real_escape_string($koneksi, $_POST['solusi']);
    $update_query = "UPDATE complaints SET solusi='$solusi' WHERE id=$id";
    mysqli_query($koneksi, $update_query);
    echo "<script>alert('Solusi berhasil ditambahkan!'); window.location.href='task.php';</script>";
    exit;
  }
  $query = "SELECT * FROM complaints WHERE solusi IS NULL OR solusi = '' ORDER BY created_at DESC";
  $result = mysqli_query($koneksi, $query);
  ?>

  <!-- Table Content -->
  <h2>Daftar Complaints yang Belum Memiliki Solusi</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Deskripsi</th>
        <th>Foto</th>
        <th>ID Pakar</th>
        <th>Tanggal</th>
        <th>Input Solusi</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_assoc($result)) : ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></td>
        <td>
          <?php if (!empty($row['foto'])): ?>
            <img src="uploads/<?= htmlspecialchars($row['foto']) ?>" alt="foto" width="100">
          <?php else: ?>
            Tidak ada
          <?php endif; ?>
        </td>
        <td><?= $row['id_pakar'] ?></td>
        <td><?= $row['created_at'] ?></td>
        <td>
          <form method="POST" action="">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <textarea name="solusi" rows="4" placeholder="Tulis solusi di sini..." required></textarea>
            <button type="submit">Simpan Solusi</button>
          </form>
        </td>
      </tr>
      <?php endwhile; ?>
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