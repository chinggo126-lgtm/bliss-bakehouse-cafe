<?php
require_once __DIR__ . '/../config/functions.php';
$pageTitle = 'Products';
?>

<?php include __DIR__ . '/../includes/header.php'; ?>
<?php include __DIR__ . '/../includes/navbar.php'; ?>

<section class="section">
    <div class="container">
        <h1 class="section-title">Our Products</h1>
        
        <div style="margin-bottom: 30px; display: flex; gap: 10px; justify-content: center; flex-wrap: wrap;">
            <button class="btn" data-category="all" style="background-color: var(--accent-color);">All Products</button>
            <button class="btn btn-secondary" data-category="pastries">Pastries</button>
            <button class="btn btn-secondary" data-category="bread">Bread</button>
            <button class="btn btn-secondary" data-category="coffee">Coffee</button>
            <button class="btn btn-secondary" data-category="desserts">Desserts</button>
        </div>
        
        <?php
        global $conn;
        $stmt = $conn->prepare("SELECT id, name, description, price, image_url, category FROM products WHERE status = 'active' ORDER BY created_at DESC");
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0):
        ?>
        <div class="products-grid">
            <?php while ($product = $result->fetch_assoc()): ?>
                <div class="product-card" data-category="<?php echo $product['category']; ?>">
                    <img src="<?php echo !empty($product['image_url']) ? '/uploads/products/' . $product['image_url'] : '/images/placeholder.jpg'; ?>" alt="<?php echo $product['name']; ?>" class="product-image">
                    <div class="product-info">
                        <h3 class="product-name"><?php echo $product['name']; ?></h3>
                        <p style="font-size: 12px; color: #999; margin-bottom: 10px;"><?php echo ucfirst($product['category']); ?></p>
                        <p class="product-description"><?php echo $product['description']; ?></p>
                        <p class="product-price"><?php echo formatCurrency($product['price']); ?></p>
                        <div class="product-footer">
                            <button class="btn btn-small" onclick="addToCart(<?php echo $product['id']; ?>)">Add to Cart</button>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <?php else: ?>
            <p style="text-align: center; color: #666; font-size: 18px;">No products available at the moment.</p>
        <?php endif; ?>
    </div>
</section>

<script>
document.querySelectorAll('[data-category]').forEach(button => {
    if (button.classList.contains('btn')) {
        button.addEventListener('click', function() {
            const category = this.dataset.category;
            const products = document.querySelectorAll('.product-card');
            
            products.forEach(product => {
                if (category === 'all' || product.dataset.category === category) {
                    product.style.display = 'block';
                } else {
                    product.style.display = 'none';
                }
            });
            
            document.querySelectorAll('[data-category]').forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
        });
    }
});

function addToCart(productId) {
    showAlert('Product added to cart!', 'success');
}
</script>

<?php include __DIR__ . '/../includes/footer.php'; ?>
