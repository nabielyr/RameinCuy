<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?php echo htmlspecialchars($event['nama_event']); ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="\RameinCuy\public\HomepageStyle.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f5f5f5;
      padding-bottom: 70px;
    }

    .top-nav-fixed {
      max-width: 400px;
      left: 50%;
      transform: translateX(-50%);
      background-color: white;
      padding: 10px 15px;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      z-index: 1000;
      display: flex;
      align-items: center;
    }
    
    .back-button {
      background: none;
      border: none;
      padding: 0;
      cursor: pointer;
    }
    
    .back-button img {
      width: 35px;
      height: 35px;
    }

    .nav-tabs {
      border-bottom: 1px solid #dee2e6;
    }

    .nav-tabs .nav-link {
      border: none;
      color: #6c757d;
      font-weight: 500;
      padding: 15px;
      margin-bottom: -1px;
      font-size: 14px;
      text-transform: uppercase;
    }

    .nav-tabs .nav-link.active {
      border-bottom: 2px solid #212529;
      color: #212529;
      font-weight: bold;
      background-color: transparent;
    }

    .tab-content {
      padding-top: 15px;
      margin-bottom: 20px;
    }

    .btn-dark {
      background-color: #212529;
    }

    .btn-secondary {
      background-color: #e9ecef;
      color: #212529;
      border: none;
    }

    .button-container {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background-color: rgba(255, 255, 255, 0.9); 
      padding: 10px 0;
      box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
      z-index: 1000;
    }

    .main-container {
      margin-bottom: 60px; 
    }
  </style>
</head>

<body class="d-flex flex-column align-items-center">

  <div class="position-fixed top-0 w-100 bg-white shadow-sm d-flex justify-content-between align-items-center px-3 py-2 top-nav-fixed z-3">
    <button class="back-button" onclick="window.location.href='index.php'">
      <img src="\RameinCuy\View\Images\arrow_back.png" alt="Back">
    </button>
    <div class="ms-3"></div>
    <div class="d-flex gap-2">
      <img src="\RameinCuy\View\Images\info.png" alt="Info" style="width: 35px; height: 35px; cursor: pointer;">
      <img src="\RameinCuy\View\Images\share.png" alt="Share" style="width: 35px; height: 35px; cursor: pointer;">
    </div>
  </div>

  <div class="container mt-5 pt-4 main-container" style="max-width: 400px;">
    <div class="bg-secondary-subtle text-center p-3 rounded shadow-sm">
      <div class="d-flex justify-content-center">
        <img src="<?php echo BASE_URL . htmlspecialchars($event['poster']); ?>" alt="Event" class="mb-3" style="width: 200px;">
      </div>
      <div class="bg-white p-3 rounded shadow-sm text-start">
        <h1 class="fs-5 text-secondary"><?php echo htmlspecialchars($event['nama_event']); ?></h1>
        <p class="d-flex align-items-center text-secondary mb-1">
          <img src="\RameinCuy\View\Images\Calendar_Days.png" class="me-2" style="width: 16px;"> <?php echo htmlspecialchars($event['tanggal_event']); ?>
        </p>
        <p class="d-flex align-items-center text-secondary mb-1">
          <img src="\RameinCuy\View\Images\Clock.png" class="me-2" style="width: 16px;"> <?php echo htmlspecialchars($event['waktu_event']); ?>
        </p>
        <p class="d-flex align-items-center text-secondary mb-0">
          <img src="\RameinCuy\View\Images\location.png" class="me-2" style="width: 16px;"> <?php echo htmlspecialchars($event['lokasi_event']); ?>
        </p>
      </div>
    </div>
  </div>

  <div class="container mt-3 main-container" style="max-width: 400px;">
    <ul class="nav nav-tabs w-100" id="eventTabs" role="tablist">
      <li class="nav-item flex-fill" role="presentation">
        <button class="nav-link active w-100 text-center" id="deskripsi-tab" data-bs-toggle="tab" data-bs-target="#deskripsi-content" type="button" role="tab" aria-controls="deskripsi-content" aria-selected="true">DESKRIPSI</button>
      </li>
      <li class="nav-item flex-fill" role="presentation">
        <button class="nav-link w-100 text-center" id="tiket-tab" data-bs-toggle="tab" data-bs-target="#tiket-content" type="button" role="tab" aria-controls="tiket-content" aria-selected="false">TIKET</button>
      </li>
    </ul>
    <div class="tab-content mt-2"> <!-- Reduced margin-top -->
      <div class="tab-pane fade show active" id="deskripsi-content" role="tabpanel" aria-labelledby="deskripsi-tab">
        <div class="card p-3">
          <h5 class="card-title text-secondary mb-3">Tentang <?php echo htmlspecialchars($event['nama_event']); ?></h5>
          <p class="card-text text-secondary mb-2"><?php echo htmlspecialchars($event['deskripsi_event']); ?></p>
        </div>
      </div>
      <div class="tab-pane fade" id="tiket-content" role="tabpanel" aria-labelledby="tiket-tab">
        <div class="card p-3">
          <h5 class="card-title text-secondary mb-3">Detail Tiket</h5>
          <div class="ticket-detail bg-light p-3 rounded shadow-sm">
            <p class="fw-bold mb-2">Nama Tiket: <?php echo htmlspecialchars($event['nama_tiket']); ?></p>
            <p class="mb-2">Jumlah Tiket: <?php echo htmlspecialchars($event['jumlah_tiket']); ?></p>
            <p class="mb-2">Harga Tiket: Rp. <?php echo number_format($event['harga_tiket'], 0, ',', '.'); ?></p>
            <p class="mb-2">Deskripsi Tiket: <?php echo htmlspecialchars($event['deskripsi_tiket']); ?></p>
            <hr>
            <p class="fw-bold mb-2">Tanggal Penjualan</p>
            <p class="mb-2">Mulai: <?php echo htmlspecialchars($event['tanggal_mulai_jual']); ?>, <?php echo htmlspecialchars($event['waktu_mulai_jual']); ?></p>
            <p class="mb-2">Berakhir: <?php echo htmlspecialchars($event['tanggal_berakhir_jual']); ?>, <?php echo htmlspecialchars($event['waktu_berakhir_jual']); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="button-container">
    <div class="d-flex justify-content-center">
      <a href="index.php?page=homepage&action=checkout&id=<?php echo htmlspecialchars($event['id']); ?>" class="btn btn-dark btn-lg rounded-pill px-5 py-2" style="width: 90%;">Pesan Tiket</a>
    </div>
  </div>

</body>

</html>