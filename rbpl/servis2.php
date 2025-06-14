<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Input Complaints - AHLITANIAN</title>
  <link rel="stylesheet" href="servis2.css" />
</head>
<body>
  <header class="header">
    <div class="logo">AHLITANIAN.COM</div>
    <nav class="nav">
      <a href="dashboardpetani.html">Home</a>
      <a href="aboutpetani.html">About</a>
      <a href="service.html">Services</a>
      <a href="projectpetani.html">Projects</a>
      <a href="newspetani.html">News</a>
      <a href="#">Contact</a>
    </nav>
    <div class="contact-info">Call Anytime: +98 (000) - 9630</div>
  </header>

  <main class="container">
    <h1>Input Complaints</h1>

    <form action="submit_laporan.php" method="POST" enctype="multipart/form-data">
      <label for="deskripsi">Deskripsi Masalah</label>
      <textarea name="deskripsi" id="deskripsi" placeholder="Tulis keluhan Anda..." required></textarea>

      <label for="foto">Upload Foto</label>
      <input type="file" name="foto" id="foto" accept="image/*" required />

      <label for="id_pakar">Pilih Pakar</label>
      <select name="id_pakar" id="id_pakar" required>
        <option value="">-- Pilih Pakar --</option>
        <option value="2">Pakar 1</option>
        <option value="3">Pakar 2</option>
        <option value="4">Pakar 3</option>
      </select>

      <button type="submit">Kirim Keluhan</button>
    </form>

    <!-- Menampilkan solusi jika ada -->
    <section class="solusi-section">
      <h2>Solusi Dari Pakar</h2>
      <?php
      include 'koneksi.php';
      $query = mysqli_query($conn, "SELECT * FROM laporan ORDER BY id DESC LIMIT 1");
      $data = mysqli_fetch_assoc($query);
      if ($data && $data['solusi']) {
        echo "<div class='solusi-box'>{$data['solusi']}</div>";
      } else {
        echo "<p>Belum ada solusi diberikan oleh pakar.</p>";
      }
      ?>
    </section>
  </main>
</body>
</html>
