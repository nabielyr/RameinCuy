<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RameinCuy - Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="Public/Css/styles.css">
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
            <button class="btn btn-light btn-sm rounded-circle" title="Buat Event Baru">
            <img src="App/View/event/gambar/addevent.png" alt="Add Event" class="icon-img">
            </button>
          <button class="btn btn-light btn-sm rounded-circle" title="Notifikasi">
            <img src="App/View/event/gambar/notification.png" alt="Notification" class="icon-img">
          </button>
          <button class="btn btn-light btn-sm rounded-circle" title="Profil">
            <img src="App/View/event/gambar/profil.png" alt="Profile" class="icon-img">
          </button>
        </div>
      </div>
    </div>
  </header>


  <main class="py-3">
    <div class="container-fluid" style="max-width: 480px;">
      <div class="mb-3 search-container">
        <input type="text" class="form-control search-bar" placeholder="Cari event yang kamu inginkan...">
        <img src="App/View/event/gambar/search.png" alt="Search" class="search-icon">
      </div>

      <h6 class="fw-bold mb-2">Temukan yang baru hari ini!</h6>
      <div class="hero-placeholder mb-3">
        <a href="index.php?action=detail&id=1" style="cursor: pointer; display: block;">
    <img src="App/View/event/gambar/imagepng.png" alt="Event placeholder" class="img-fluid placeholder-img" style="max-width: 200px; height: auto;">
        </a>
    </div>

      <div class="d-flex justify-content-between">
        <div class="small-placeholder"></div>
        <div class="small-placeholder"></div>
        <div class="small-placeholder"></div>
      </div>
    </div>
  </main>


  <nav id="bottom-nav" class="fixed-bottom bg-white border-top py-2">
    <div class="container-fluid" style="max-width: 480px;">
      <div class="d-flex justify-content-around text-center">
        <a href="index.php" class="btn nav-btn" title="Beranda">
          <img src="App/View/event/gambar/home.png" alt="Home" class="nav-icon-img">
        </a>
        <a href="index.php?action=history" class="btn nav-btn" title="Riwayat">
          <img src="App/View/event/gambar/history.png" alt="History" class="nav-icon-img">
        </a>
        <a href="index.php?action=tickets" class="btn nav-btn" title="Tiket">
          <img src="App/View/event/gambar/Ticket.png" alt="Ticket" class="nav-icon-img">
        </a>
      </div>
    </div>
  </nav>

</body>
</html>
