<header class="site-header">
  <div class="container">
    <!-- Logo -->
    <div class="site-branding">
      <a class="site-logo" href="{{ home_url('/') }}">
        <img src="https://placehold.co/150x40/dc3545/ffffff?text=LIVE+SPORTS" alt="Live Sports" class="footer-logo">
      </a>
    </div>

    <!-- Main Navigation -->
    <nav class="main-navigation">
      <ul class="nav-menu">
        <li class="nav-item active"><a href="{{ home_url('/') }}">Trang chủ</a></li>
        <li class="nav-item"><a href="#">Lịch thi đấu</a></li>
        <li class="nav-item"><a href="#">Kết quả</a></li>
        <li class="nav-item"><a href="#">Giải đấu</a></li>
        <li class="nav-item"><a href="#">Tin tức</a></li>
      </ul>
    </nav>

    <!-- User Actions -->
    <div class="user-actions">
      <div class="language-selector">
        <select>
          <option value="vi">Tiếng Việt</option>
          <option value="en">English</option>
        </select>
      </div>

      <!-- Mobile Menu Toggle -->
      <button class="mobile-menu-toggle" aria-label="Toggle mobile menu" aria-expanded="false">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <line x1="3" y1="12" x2="21" y2="12"></line>
          <line x1="3" y1="6" x2="21" y2="6"></line>
          <line x1="3" y1="18" x2="21" y2="18"></line>
        </svg>
      </button>
    </div>
  </div>
</header>
