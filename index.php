<?php
// dashboard_menu.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Perkantoran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: url('https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=1950&q=80') no-repeat center center fixed;
      background-size: cover;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }
    .overlay {
      background-color: rgba(255, 255, 255, 0.85);
      min-height: 100vh;
      padding: 2rem;
    }
    .menu-card {
      transition: transform 0.3s ease;
    }
    .menu-card:hover {
      transform: scale(1.05);
    }
    .card {
      border-radius: 20px;
    }
    .card-title {
      font-weight: bold;
      font-size: 1.2rem;
    }
  </style>
</head>
<body>
  <div class="overlay">
    <div class="container">
      <h2 class="text-center mb-4 fw-bold text-primary">Sistem Informasi Perkantoran</h2>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
          $menus = [
            'Karyawan' => 'karyawan/index.php',
            'Absensi Karyawan' => 'absensi_karyawan/index.php',
            'Divisi' => 'divisi/index.php',
            'Gaji' => 'gaji/index.php',
            'Inventaris' => 'inventaris/index.php',
            'Jadwal Meeting' => 'jadwal_meeting/index.php',
            'Keuangan Perkantoran' => 'Keuangan Perkantoran/index.php',
            'Klien' => 'klien/index.php',
            'Proyek' => 'proyek/index.php',
            'Ruangan' => 'ruangan/index.php'
          ];

          $colors = ['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'dark'];
          $i = 0;

          foreach ($menus as $name => $link) {
            $color = $colors[$i % count($colors)];
            echo "<div class='col'>
                    <a href='$link' style='text-decoration: none;'>
                      <div class='card text-white bg-$color shadow menu-card'>
                        <div class='card-body text-center'>
                          <h5 class='card-title'>$name</h5>
                        </div>
                      </div>
                    </a>
                  </div>";
            $i++;
          }
        ?>
      </div>
    </div>
  </div>
</body>
</html>
