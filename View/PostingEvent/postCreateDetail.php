<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RameinCuy - Detail Tiket</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="\RameinCuy\RameinCuy\public\PostingEvent.css">
</head>
<body class="body-page3 position-relative">
  <header class="border-bottom bg-white p-2">
    <div class="container-fluid" style="max-width: 480px;">
      <div class="fw-bold fs-4">RameinCuy</div>
    </div>
  </header>

  <?php
  if (isset($_SESSION['error'])) {
      echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
      unset($_SESSION['error']);
  }
  ?>

  <form action="index.php?page=postingEvent&action=saveEvent" method="POST">
    <section id="detail-tiket-section" class="px-3 pt-3">
      <strong class="d-block mb-3 small">Detail Tiket</strong>
      <div class="mb-3">
        <label for="namaTiket" class="fw-bold small">Nama Tiket</label>
        <input type="text" id="namaTiket" name="namaTiket" class="form-control form-control-sm" required>
      </div>
      <div class="mb-3">
        <label for="jumlahTiket" class="fw-bold small">Jumlah Tiket</label>
        <input type="number" id="jumlahTiket" name="jumlahTiket" class="form-control form-control-sm" required>
      </div>
      <div class="mb-3">
        <label for="hargaTiket" class="fw-bold small">Harga Tiket</label>
        <input type="number" id="hargaTiket" name="hargaTiket" class="form-control form-control-sm" required>
      </div>
      <div class="mb-3">
        <label for="deskripsiTiket" class="fw-bold small">Deskripsi Tiket</label>
        <textarea id="deskripsiTiket" name="deskripsiTiket" rows="3" class="form-control form-control-sm" required></textarea>
      </div>
      <input type="hidden" name="posterBase64" value="<?php echo $_SESSION['posterBase64']; ?>">
    </section>

    <hr class="mx-3" style="margin-top: -5px;">

    <section id="tanggal-penjualan" class="px-3 pt-2">
      <strong class="d-block mb-3 small">Tanggal Penjualan</strong>
      <div class="row mb-3">
        <div class="col-6">
          <label for="tglMulaiJual" class="fw-bold small">Tanggal Mulai</label>
          <input type="date" id="tglMulaiJual" name="tglMulaiJual" class="form-control form-control-sm" required>
        </div>
        <div class="col-6">
          <label for="waktuMulaiJual" class="fw-bold small">Pilih Waktu</label>
          <input type="time" id="waktuMulaiJual" name="waktuMulaiJual" class="form-control form-control-sm" required>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-6">
          <label for="tglAkhirJual" class="fw-bold small">Tanggal Berakhir</label>
          <input type="date" id="tglAkhirJual" name="tglAkhirJual" class="form-control form-control-sm" required>
        </div>
        <div class="col-6">
          <label for="waktuAkhirJual" class="fw-bold small">Pilih Waktu</label>
          <input type="time" id="waktuAkhirJual" name="waktuAkhirJual" class="form-control form-control-sm" required>
        </div>
      </div>
    </section>

    <section id="bottom-buttons" class="px-3 pb-5 mt-4">
      <div class="d-flex justify-content-between pt-2">
        <a href="index.php?action=createEventForm" class="btn btn-secondary" id="btn-sebelumnya">Sebelumnya</a>
        <button type="submit" id="btn-buatEvent" class="btn btn-primary">Buat Event</button>
      </div>
    </section>
  </form>
</body>
</html>