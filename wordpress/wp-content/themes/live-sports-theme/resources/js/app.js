import.meta.glob([
  '../images/**',
  '../fonts/**',
]);

document.addEventListener('DOMContentLoaded', function() {
  setupMobileMenu();
});

/**
 * Thiết lập menu mobile
 */
function setupMobileMenu() {
  const menuToggle = document.querySelector('.mobile-menu-toggle');
  const mainNav = document.querySelector('.main-navigation');
  const menuLinks = mainNav.querySelectorAll('a');

  // Đóng menu khi click ra ngoài
  document.addEventListener('click', (event) => {
    const isClickInside = mainNav.contains(event.target) || menuToggle.contains(event.target);
    
    if (!isClickInside && mainNav.classList.contains('show')) {
      closeMenu();
    }
  });

  // Đóng menu khi hover ra ngoài
  let timeoutId;
  mainNav.addEventListener('mouseleave', () => {
    if (window.innerWidth <= 768 && mainNav.classList.contains('show')) {
      timeoutId = setTimeout(() => {
        closeMenu();
      }, 500); // Đợi 500ms trước khi đóng menu
    }
  });

  mainNav.addEventListener('mouseenter', () => {
    if (timeoutId) {
      clearTimeout(timeoutId);
    }
  });

  // Toggle menu khi click button
  menuToggle.addEventListener('click', (event) => {
    event.stopPropagation(); // Ngăn event click lan ra document
    const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
    
    if (isExpanded) {
      closeMenu();
    } else {
      openMenu();
    }
  });

  // Đóng menu khi click vào links
  menuLinks.forEach(link => {
    link.addEventListener('click', () => {
      closeMenu();
    });
  });

  // Hàm mở menu
  function openMenu() {
    menuToggle.setAttribute('aria-expanded', 'true');
    menuToggle.classList.add('active');
    mainNav.classList.add('show');
  }

  // Hàm đóng menu
  function closeMenu() {
    menuToggle.setAttribute('aria-expanded', 'false');
    menuToggle.classList.remove('active');
    mainNav.classList.remove('show');
  }
}

/**
 * Xử lý chuyển tab giữa các bộ lọc trận đấu
 */
document.addEventListener('DOMContentLoaded', () => {
  const filterButtons = document.querySelectorAll('.filter-btn');
  
  filterButtons.forEach(button => {
    button.addEventListener('click', () => {
      // Gỡ bỏ trạng thái active từ tất cả các nút
      filterButtons.forEach(btn => btn.classList.remove('active'));
      
      // Thêm trạng thái active cho nút được chọn
      button.classList.add('active');
    });
  });
});
