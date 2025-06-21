<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Detail Pemesanan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="\RameinCuy\public\HomepageStyle.css">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f5f5f5;
      padding-bottom: 30px;
    }
    
    .top-nav {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      background-color: white;
      padding: 10px 15px;
      z-index: 1000;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
      display: flex;
      align-items: center;
    }
    
    .back-button {
      background: none;
      border: none;
      padding: 5px;
      cursor: pointer;
    }
    
    .back-button img {
      width: 35px;
      height: 35px;
    }
    
    .container {
      margin-top: 70px;
    }
    
    .detail-section {
      margin-bottom: 20px;
    }
    
    .detail-content {
      background-color: #f8f9fa;
      border-radius: 8px;
    }
    
    .section-title {
      margin-bottom: 10px;
    }
    
    .btn-secondary {
      background-color: #212529;
      color: white;
      border: none;
      margin-bottom: 30px; 
      border-radius: 8px;
      font-weight: 500;
    }
  </style>
</head>
<body>

  <div class="top-nav">
    <button class="back-button" onclick="history.back()">
      <img src="\RameinCuy\View\Images\arrow_back.png" alt="Back">
    </button>
    <h5 class="mb-0 ms-3">Detail Pemesanan</h5>
  </div>

  <div class="container" style="max-width: 400px;">
      <div class="card-body">

        <?php if ($event): ?>
            <div class="detail-section">
                <h5 class="section-title fw-bold">Detail Pemesanan</h5>
                <div class="detail-content p-3 rounded">
                    <p class="mb-1"><?php echo htmlspecialchars($event['nama_tiket']); ?></p>
                    <p class="mb-0">Rp. <?php echo number_format($event['harga_tiket'], 0, ',', '.'); ?> x1</p>
                </div>
            </div>
            <div class="detail-section">
                <h5 class="section-title fw-bold">Detail Pemesan</h5>
                <div class="detail-content p-3 rounded">
                    <p class="mb-1">Nama Pemesan: Qoid Kafi</p>
                    <p class="mb-1">Email Pemesan: qoidkafi@student.ub.ac.id</p>
                    <p class="mb-1">Nomor Telepon: 0895123113</p>
                    <p class="mb-1">Nomor Identitas: 352241245141212</p>
                    <p class="mb-0">Jenis Kelamin: Laki-Laki</p>
                </div>
            </div>
            <div class="detail-section">
                <h5 class="section-title fw-bold">Metode Pembayaran</h5>
                <select class="form-select" aria-label="Metode pembayaran">
                    <option selected>E Wallet</option>
                    <option>Virtual Account</option>
                    <option>Credit Card</option>
                </select> 
            </div>
            <div class="detail-section">
                <div class="detail-content p-3 rounded">
                    <div class="d-flex justify-content-between mb-1">
                        <span>Detail Harga</span>
                        <span>Rp. <?php echo number_format($event['harga_tiket'], 0, ',', '.'); ?></span>
                    </div>
                    <div class="d-flex justify-content-between">
                        <span>Biaya Admin</span>
                        <span>Rp. 1.000</span>
                    </div>
                </div>
                <div class="d-flex justify-content-between mt-3 fw-bold">
                    <span>Total Bayar</span>
                    <span>Rp. <?php echo number_format($event['harga_tiket'] + 1000, 0, ',', '.'); ?></span>
                </div>
            </div>
        <?php else: ?>
            <p class="text-danger">Event tidak ditemukan.</p>
        <?php endif; ?>

        <a href="index.php?page=homepage&action=placeOrder&id=<?php echo htmlspecialchars($event['id']); ?>" class="btn btn-secondary w-100 py-2 mt-3">Beli Tiket</a>
        
      </div>
  </div>
</body>
</html>