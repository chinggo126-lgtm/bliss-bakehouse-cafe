<?php
require_once __DIR__ . '/../config/functions.php';
$pageTitle = 'Homepage';
?>

<?php include __DIR__ . '/../includes/header.php'; ?>
<?php include __DIR__ . '/../includes/navbar.php'; ?>

<section class="hero">
    <div class="hero-content">
        <h1>Welcome to B.L.I.S.S</h1>
        <p>Artisan Baked Goods & Premium Coffee</p>
        <a href="/pages/products.php" class="btn">Shop Now</a>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2 class="section-title">Featured Products</h2>
        
        <?php
        global $conn;
        $stmt = $conn->prepare("SELECT id, name, description, price, image_url FROM products WHERE featured = 1 LIMIT 6");
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0):
        ?>
        <div class="products-grid">
            <?php while ($product = $result->fetch_assoc()): ?>
                <div class="product-card">
                    <img src="<?php echo !empty($product['image_url']) ? '/uploads/products/' . $product['image_url'] : '/images/placeholder.jpg'; ?>" alt="<?php echo $product['name']; ?>" class="product-image">
                    <div class="product-info">
                        <h3 class="product-name"><?php echo $product['name']; ?></h3>
                        <p class="product-description"><?php echo substr($product['description'], 0, 60) . '...'; ?></p>
                        <p class="product-price"><?php echo formatCurrency($product['price']); ?></p>
                        <div class="product-footer">
                            <a href="/pages/products.php?id=<?php echo $product['id']; ?>" class="btn btn-small">View Details</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <?php else: ?>
            <p style="text-align: center; color: #666;">No products available at the moment.</p>
        <?php endif; ?>
    </div>
</section>

<section class="section" style="background-color: var(--secondary-color);">
    <div class="container">
        <h2 class="section-title">Why Choose B.L.I.S.S?</h2>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
            <div style="text-align: center;">
                <h3 style="font-size: 20px; margin-bottom: 10px;">🥐 Artisan Quality</h3>
                <p>Every pastry is handcrafted with premium ingredients and time-honored recipes.</p>
            </div>
            <div style="text-align: center;">
                <h3 style="font-size: 20px; margin-bottom: 10px;">☕ Premium Coffee</h3>
                <p>Sourced from the finest roasters, our coffee is freshly brewed to perfection.</p>
            </div>
            <div style="text-align: center;">
                <h3 style="font-size: 20px; margin-bottom: 10px;">💛 Warm Atmosphere</h3>
                <p>Experience a welcoming space where every visit feels like coming home.</p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container" style="text-align: center;">
        <h2 style="font-size: 32px; margin-bottom: 20px;">Ready to Experience B.L.I.S.S?</h2>
        <p style="font-size: 18px; margin-bottom: 30px; color: #666;">Visit us today or make a reservation for your next special occasion.</p>
        <div style="display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
            <a href="/pages/products.php" class="btn">Browse Products</a>
            <a href="/pages/reservation.php" class="btn btn-secondary">Make Reservation</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
