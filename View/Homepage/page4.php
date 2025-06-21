<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RameinCuy - Event Berhasil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="\RameinCuy\public\HomepageStyle.css">
</head>
<body class="body-page1 bg-light d-flex flex-column justify-content-between">

  <main class="flex-grow-1 d-flex flex-column justify-content-center align-items-center text-center px-3">
    <div class="container-fluid" style="max-width: 480px;">
      <h5 class="mb-4">Pembayaran telah diproses</h5>
      
      <div class="success-icon-container mb-4">
        <div class="bg-secondary rounded-circle d-flex justify-content-center align-items-center mx-auto" style="width: 80px; height: 80px;">
          <img src="\RameinCuy\View\Images\check_circle.png" width="50" height="50">
        </div>
      </div>
      
      
      <div class="fixed-bottom bg-white border-top py-3" style="bottom: 50px;">
    <div class="container-fluid" style="max-width: 480px;">
      <div class="d-grid gap-2 col-12 col-md-8 mx-auto">
        <button class="btn btn-secondary btn-lg">Cek Tiket</button>
        <a href="index.php" class="btn btn-outline-secondary btn-lg">Selesai</a>
      </div>
    </div>
  </div>
  </main>

  <nav id="bottom-nav" class="fixed-bottom bg-white border-top py-2">
    <div class="container-fluid" style="max-width: 480px;">
      <div class="d-flex justify-content-around text-center">
        <button class="btn nav-btn" title="Beranda">
          <img src="\RameinCuy\View\Images\home.png" alt="Home" class="nav-icon-img">
        </button>
        <button class="btn nav-btn" title="Riwayat">
          <img src="\RameinCuy\View\Images\history.png" alt="History" class="nav-icon-img">
        </button>
        <button class="btn nav-btn" title="Tiket">
          <img src="\RameinCuy\View\Images\Ticket.png" alt="Ticket" class="nav-icon-img">
        </button>
      </div>
    </div>
  </nav>

</body>
</html>