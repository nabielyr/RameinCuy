  <!DOCTYPE html>
  <html lang="id">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RameinCuy - Event Berhasil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/RameinCuyPostingEvent/public/css/styles.css">
  </head>
  <body class="body-page1 bg-light d-flex flex-column justify-content-between">
    <main class="flex-grow-1 d-flex flex-column justify-content-center align-items-center text-center px-3">
      <div class="container-fluid" style="max-width: 480px;">
        <h5 class="mb-4">Event telah diposting</h5>
        
        <div class="success-icon-container mb-4">
          <div class="success-circle mx-auto">
            <img src="/RameinCuyPostingEvent/app/views/event/images/check_circle.png" alt="Sukses" class="success-icon">
          </div>
        </div>
        
        <p class="text-muted mb-5">Event kamu telah berhasil dibuat dan akan segera ditampilkan di RameinCuy</p>
        
        <div class="d-grid gap-2 col-12 col-md-8 mx-auto">
          <a href="index.php?action=viewEvent" class="btn btn-secondary">Lihat Event Anda</a>
          <a href="index.php" class="btn btn-outline-secondary">Selesai</a>
        </div>
      </div>
    </main>

    <nav id="bottom-nav" class="fixed-bottom bg-white border-top py-2">
      <div class="container-fluid" style="max-width: 480px;">
        <div class="d-flex justify-content-around text-center">
          <a href="index.php" class="btn nav-btn" title="Beranda">
            <img src="/RameinCuyPostingEvent/app/views/event/images/home.png" alt="Home" class="nav-icon-img">
          </a>
          <button class="btn nav-btn" title="Riwayat">
            <img src="/RameinCuyPostingEvent/app/views/event/images/history.png" alt="History" class="nav-icon-img">
          </button>
          <button class="btn nav-btn" title="Tiket">
            <img src="/RameinCuyPostingEvent/app/views/event/images/Ticket.png" alt="Ticket" class="nav-icon-img">
          </button>
        </div>
      </div>
    </nav>
  </body>
  </html>