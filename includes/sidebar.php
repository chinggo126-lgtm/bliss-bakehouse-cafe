<?php
require_once __DIR__ . '/../config/functions.php';
$currentUser = getCurrentUser();
?>

<aside class="sidebar">
    <div style="margin-bottom: 30px;">
        <p style="color: var(--secondary-color); font-size: 12px; margin-bottom: 5px;">Logged in as</p>
        <p style="font-weight: bold;"><?php echo isset($currentUser['username']) ? $currentUser['username'] : 'User'; ?></p>
        <p style="font-size: 12px; color: #ccc;"><?php echo isset($currentUser['role']) ? ucfirst($currentUser['role']) : ''; ?></p>
    </div>
    
    <ul class="sidebar-menu">
        <?php if (hasRole('admin')): ?>
            <li><a href="/admin/dashboard.php" class="<?php echo basename($_SERVER['PHP_SELF']) === 'dashboard.php' && dirname($_SERVER['PHP_SELF']) === '/admin' ? 'active' : ''; ?>">📊 Dashboard</a></li>
            <li><a href="/admin/manage-products.php" class="<?php echo basename($_SERVER['PHP_SELF']) === 'manage-products.php' ? 'active' : ''; ?>">🥐 Manage Products</a></li>
            <li><a href="/admin/manage-orders.php" class="<?php echo basename($_SERVER['PHP_SELF']) === 'manage-orders.php' ? 'active' : ''; ?>">📦 Manage Orders</a></li>
            <li><a href="/admin/manage-reservations.php" class="<?php echo basename($_SERVER['PHP_SELF']) === 'manage-reservations.php' ? 'active' : ''; ?>">📅 Manage Reservations</a></li>
            <li><a href="/admin/manage-users.php" class="<?php echo basename($_SERVER['PHP_SELF']) === 'manage-users.php' ? 'active' : ''; ?>">👥 Manage Users</a></li>
        <?php elseif (hasRole('cashier')): ?>
            <li><a href="/cashier/dashboard.php" class="<?php echo basename($_SERVER['PHP_SELF']) === 'dashboard.php' && dirname($_SERVER['PHP_SELF']) === '/cashier' ? 'active' : ''; ?>">📊 Dashboard</a></li>
            <li><a href="/cashier/process-order.php" class="<?php echo basename($_SERVER['PHP_SELF']) === 'process-order.php' ? 'active' : ''; ?>">💳 Process Order</a></li>
            <li><a href="/cashier/view-orders.php" class="<?php echo basename($_SERVER['PHP_SELF']) === 'view-orders.php' ? 'active' : ''; ?>">📋 View Orders</a></li>
        <?php endif; ?>
        
        <li><a href="/pages/logout.php" style="margin-top: 20px; color: #ff6b6b;">🚪 Logout</a></li>
    </ul>
</aside>
