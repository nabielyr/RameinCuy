<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RameinCuy - Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="\RameinCuy\public\HomepageStyle.css">
</head>

<body class="body-page1 bg-light">
  <header class="bg-white border-bottom py-2">
    <div class="container-fluid" style="max-width: 480px;">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <span id="location" class="small">Malang</span>
        </div>
        <div class="fw-bold fs-5 text-center">RameinCuy</div>
        <div id="header-icons" class="d-flex gap-2">
          <a href="index.php?page=postingEvent&action=createEventForm" class="btn btn-light btn-sm rounded-circle" title="Buat Event Baru">
            <img src="\RameinCuy\View\Images\addevent.png" alt="Add Event" class="icon-img">
          </a>
          <button class="btn btn-light btn-sm rounded-circle" title="Notifikasi">
            <img src="\RameinCuy\View\Images\notification.png" alt="Notification" class="icon-img">
          </button>
          <button class="btn btn-light btn-sm rounded-circle" title="Profil">
            <img src="\RameinCuy\View\Images\profil.png" alt="Profile" class="icon-img">
          </button>
        </div>
      </div>
    </div>
  </header>

  <main class="py-3">
    <div class="container-fluid" style="max-width: 480px;">
      <div class="search-container mb-3">
        <input type="text" class="form-control search-bar" placeholder="Cari event yang kamu inginkan...">
        <img src="\RameinCuy\View\Images\search.png" alt="Search" class="search-icon">
      </div>

      <h6 class="fw-bold mb-3">Event Terbaru</h6>
      <?php if (!empty($events)): ?>
        <?php foreach ($events as $event): ?>
          <div class="card event-card mb-3">
            <a href="index.php?page=homepage&action=detail&id=<?php echo $event['id']; ?>" class="text-decoration-none">
              <img src="<?php echo BASE_URL . $event['poster']; ?>" alt="<?php echo $event['nama_event']; ?>" class="card-img-top">
              <div class="card-body">
                <h6 class="card-title fw-bold"><?php echo $event['nama_event']; ?></h6>
                <div class="d-flex align-items-center mb-1">
                  <img src="\RameinCuy\View\Images\Calendar_Days.png" class="me-2" style="width: 16px;">
                  <span class="text-muted"><?php echo $event['tanggal_event']; ?></span>
                </div>
                <div class="d-flex align-items-center mb-1">
                  <img src="\RameinCuy\View\Images\Clock.png" class="me-2" style="width: 16px;">
                  <span class="text-muted"><?php echo $event['waktu_event']; ?></span>
                </div>
                <div class="d-flex align-items-center">
                  <img src="\RameinCuy\View\Images\location.png" class="me-2" style="width: 16px;">
                  <span class="text-muted"><?php echo $event['lokasi_event']; ?></span>
                </div>
              </div>
            </a>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="text-muted">Belum ada event yang tersedia.</p>
      <?php endif; ?>
    </div>
  </main>

  <nav id="bottom-nav" class="fixed-bottom bg-white border-top py-2">
    <div class="container-fluid" style="max-width: 480px;">
      <div class="d-flex justify-content-around text-center">
        <a href="index.php?page=homepage" class="btn nav-btn" title="Beranda">
          <img src="\RameinCuy\View\Images\home.png" alt="Home" class="nav-icon-img">
        </a>
        <a href="index.php?page=homepage&action=history" class="btn nav-btn" title="Riwayat">
          <img src="\RameinCuy\View\Images\history.png" alt="History" class="nav-icon-img">
        </a>
        <a href="index.php?page=homepage&action=tickets" class="btn nav-btn" title="Tiket">
          <img src="\RameinCuy\View\Images\Ticket.png" alt="Ticket" class="nav-icon-img">
        </a>
      </div>
    </div>
  </nav>
</body>
</html>