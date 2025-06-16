<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RameinCuy - Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/RameinCuyPostingEvent/public/css/styles.css">
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
          <a href="index.php?action=createEventForm" class="btn btn-light btn-sm rounded-circle" title="Buat Event Baru">
            <img src="/RameinCuyPostingEvent/app/views/event/images/addevent.png" alt="Add Event" class="icon-img">
          </a>
          <button class="btn btn-light btn-sm rounded-circle" title="Notifikasi">
            <img src="/RameinCuyPostingEvent/app/views/event/images/notification.png" alt="Notification" class="icon-img">
          </button>
          <button class="btn btn-light btn-sm rounded-circle" title="Profil">
            <img src="/RameinCuyPostingEvent/app/views/event/images/profil.png" alt="Profile" class="icon-img">
          </button>
        </div>
      </div>
    </div>
  </header>

  <main class="py-3">
    <div class="container-fluid" style="max-width: 480px;">
      <div class="mb-3 search-container">
        <input type="text" class="form-control search-bar" placeholder="Cari event yang kamu inginkan...">
        <img src="/RameinCuyPostingEvent/app/views/event/images/search.png" alt="Search" class="search-icon">
      </div>

      <h6 class="fw-bold mb-2">Temukan yang baru hari ini!</h6>
      <div class="hero-placeholder mb-3">
        <img src="/RameinCuyPostingEvent/app/views/event/images/imagepng.png" alt="Event placeholder" class="placeholder-img">
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
        <button class="btn nav-btn" title="Beranda">
          <img src="/RameinCuyPostingEvent/app/views/event/images/home.png" alt="Home" class="nav-icon-img">
        </button>
        <button class="btn nav-btn" title="Riwayat">
          <img src="/RameinCuyPostingEvent/app/views/event/images/history.png" alt="History" class="nav-icon-img">
        </button>
        <button class="btn nav-btn" title="Tiket">
          <img src="/RameinCuyPostingEvent/app/views/event/images/Ticket.png" alt="Ticket" class="nav-icon-img">
        </button>
      </div>
    </div>
  </nav>

  <script>
  document.addEventListener('DOMContentLoaded', function() {
    const navButtons = document.querySelectorAll('.nav-btn');
    
    navButtons.forEach(function(btn) {
      btn.addEventListener('click', function() {
        navButtons.forEach(function(b) {
          b.classList.remove('active');
        });
        
        this.classList.add('active');
        const index = Array.from(navButtons).indexOf(this);
        localStorage.setItem('activeNavButton', index);
      });
    });
    
    const activeIndex = localStorage.getItem('activeNavButton');
    if (activeIndex !== null) {
      navButtons[activeIndex].classList.add('active');
    }
  });
  </script>
</body>
</html>