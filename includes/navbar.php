<?php
require_once __DIR__ . '/../config/functions.php';
?>

<nav class="navbar">
  <div class="navbar-container">
    <a href="/index.php" class="navbar-logo">B.L.I.S.S Bakehouse & Cafe</a>
    
    <div class="hamburger">
      <span></span>
      <span></span>
      <span></span>
    </div>
    
    <ul class="nav-menu">
      <li>
        <a href="/index.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) === 'index.php' ? 'active' : ''; ?>">Homepage</a>
      </li>
      <li>
        <a href="/pages/products.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) === 'products.php' ? 'active' : ''; ?>">Products</a>
      </li>
      <li>
        <a href="/pages/whats-new.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) === 'whats-new.php' ? 'active' : ''; ?>">What's New</a>
      </li>
      <li>
        <a href="/pages/about.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) === 'about.php' ? 'active' : ''; ?>">About Us</a>
      </li>
      <li>
        <a href="/pages/contact.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) === 'contact.php' ? 'active' : ''; ?>">Contact Us</a>
      </li>
      <li>
        <a href="/pages/reservation.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) === 'reservation.php' ? 'active' : ''; ?>">Reservation</a>
      </li>
      <?php if (isLoggedIn()): ?>
        <li>
          <a href="/pages/logout.php" class="nav-link">Logout</a>
        </li>
      <?php else: ?>
        <li>
          <a href="/pages/login.php" class="nav-link">Login</a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>
