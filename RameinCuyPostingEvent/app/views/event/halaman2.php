<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>RameinCuy - Formulir Event</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/RameinCuyPostingEvent/public/css/styles.css">
</head>
<body class="body-page2 bg-light position-relative">
  <header class="bg-white border-bottom py-2">
    <div class="container-fluid" style="max-width: 480px;">
      <div class="d-flex align-items-center justify-content-between">
        <a href="index.php" class="text-decoration-none text-dark">
          <span class="fw-bold fs-5">RameinCuy</span>
        </a>
      </div>
    </div>
  </header>

  <form action="index.php?action=createEventDetails" method="POST" enctype="multipart/form-data">
    <section class="upload-section py-4">
      <input type="file" id="posterUpload" name="posterUpload" accept="image/*" style="display: none;">
      
      <div class="container-fluid" style="max-width: 480px;">
        <div id="imagePreview" class="image-preview-container">
          <div class="d-flex justify-content-center align-items-center h-100">
            <button type="button" id="uploadBtn" class="btn btn-primary rounded-circle d-flex justify-content-center align-items-center upload-btn"></button>
          </div>
          
          <img id="previewImg" src="#" alt="Preview" class="preview-image d-none">
        </div>
        
        <p class="mt-3 text-center small">Unggah Poster/Gambar</p>
      </div>
    </section>
    <hr class="mx-3 mt-0">

    <section class="container-fluid px-3" style="max-width: 480px;">
      <div class="row mb-3">
        <div class="col-6">
          <label for="kategoriEvent" class="fw-bold small">Kategori Event</label>
          <select id="kategoriEvent" name="kategoriEvent" class="form-select form-select-sm" required>
            <option value="">Pilih kategori</option>
            <option value="Seminar">Seminar</option>
            <option value="Konser">Konser</option>
            <option value="Webinar">Webinar</option>
            <option value="Workshop">Workshop</option>
          </select>
        </div>
        <div class="col-6">
          <label for="tanggalEvent" class="fw-bold small">Pilih Tanggal</label>
          <input type="date" id="tanggalEvent" name="tanggalEvent" class="form-control form-control-sm" required>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-6">
          <label for="namaEvent" class="fw-bold small">Nama Event</label>
          <input type="text" id="namaEvent" name="namaEvent" class="form-control form-control-sm" required>
        </div>
        <div class="col-6">
          <label for="waktuEvent" class="fw-bold small">Pilih Waktu</label>
          <input type="time" id="waktuEvent" name="waktuEvent" class="form-control form-control-sm" required>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-6">
          <label for="penyelenggaraEvent" class="fw-bold small">Nama Penyelenggara</label>
          <input type="text" id="penyelenggaraEvent" name="penyelenggaraEvent" class="form-control form-control-sm" required>
        </div>
        <div class="col-6">
          <label for="lokasiEvent" class="fw-bold small">Pilih Lokasi</label>
          <input type="text" id="lokasiEvent" name="lokasiEvent" class="form-control form-control-sm" required>
        </div>
      </div>

      <div class="mb-3">
        <label for="deskripsiEvent" class="fw-bold small">Deskripsi Event</label>
        <textarea id="deskripsiEvent" name="deskripsiEvent" class="form-control form-control-sm" required></textarea>
      </div>
    </section>
    <hr class="mx-3">

    <section class="container-fluid px-3 mb-5" style="max-width: 480px;">
      <strong class="d-block mb-2 small">Info Kontak</strong>
      <div class="mb-3">
        <label for="namaNarahubung" class="fw-bold small">Nama Narahubung</label>
        <input type="text" id="namaNarahubung" name="namaNarahubung" class="form-control form-control-sm" required>
      </div>
      <div class="mb-3">
        <label for="emailNarahubung" class="fw-bold small">Email Narahubung</label>
        <input type="email" id="emailNarahubung" name="emailNarahubung" class="form-control form-control-sm" required>
      </div>
      <div class="mb-3">
        <label for="ponselNarahubung" class="fw-bold small">No. Ponsel</label>
        <input type="tel" id="ponselNarahubung" name="ponselNarahubung" class="form-control form-control-sm" required>
      </div>
    </section>

    <section id="bottom-buttons" class="px-3 pb-5 mt-4">
      <div class="d-flex justify-content-end pt-2">
        <button type="submit" id="btn-berikutnya" class="btn btn-primary">Berikutnya</button>
      </div>
    </section>
  </form>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const uploadBtn = document.getElementById('uploadBtn');
      const fileInput = document.getElementById('posterUpload');
      const previewImg = document.getElementById('previewImg');
      const imagePreview = document.getElementById('imagePreview');
      
      uploadBtn.addEventListener('click', function() {
        fileInput.click();
      });
      
      fileInput.addEventListener('change', function() {
        if (this.files && this.files[0]) {
          const reader = new FileReader();
          
          reader.onload = function(e) {
            previewImg.src = e.target.result;
            previewImg.classList.remove('d-none');
            uploadBtn.parentElement.classList.add('d-none');
          }
          
          reader.readAsDataURL(this.files[0]);
        }
      });
      
      previewImg.addEventListener('click', function() {
        fileInput.click();
      });
    });
  </script>
</body>
</html>