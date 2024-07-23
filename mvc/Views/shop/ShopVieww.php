<?php
// Xác định số sản phẩm trên mỗi trang
$productsPerPage = 8;

// Tính tổng số trang
$totalProducts = count($data['noidung']);
$totalPages = ceil($totalProducts / $productsPerPage);

// Xác định trang hiện tại
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = (int) $_GET['page'];
} else {
    $currentPage = 1;
}

// Kiểm tra trang hiện tại hợp lệ
if ($currentPage > $totalPages) {
    $currentPage = $totalPages;
}
if ($currentPage < 1) {
    $currentPage = 1;
}

$startIndex = ($currentPage - 1) * $productsPerPage;
$endIndex = min($startIndex + $productsPerPage - 1, $totalProducts - 1);

// Lấy các sản phẩm cho trang hiện tại
$currentProducts = array_slice($data['noidung'], $startIndex, $productsPerPage);
?>

<?php
if (isset($_SESSION['success_message'])) {
    echo "<div class='alert alert-success'>" . $_SESSION['success_message'] . "</div>";
    unset($_SESSION['success_message']);
}
?>
<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Shop</h1>
                </div>
            </div>
            <div class="col-lg-7">
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<div class="untree_co-section product-section before-footer-section">
    <div class="container">
        <div class="row">
            <?php foreach ($currentProducts as $product) : ?>
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item item_detail" href="<?= WEB_ROOT ?>/cart/detail/<?php echo $product['id'] ?>">
                        <img src="<?= WEB_ROOT ?>/public/css2/images/<?= $product['img_url'] ?>" class="img-fluid product-thumbnail">
                        <h3 class="product-title"><?= $product['product_name'] ?></h3>
                        <strong class="product-price">$<?= $product['price'] ?></strong>

                        <span class="icon-cross btn_addcart" data-url="<?= WEB_ROOT ?>/cart/addocart/<?php echo $product['id'] ?>">
                            <img src="<?= WEB_ROOT ?>/public/css2/images/cross.svg" class="img-fluid" alt="">
                        </span>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Phân trang -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <?php if ($currentPage > 1) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $currentPage - 1 ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <li class="page-item <?= ($i == $currentPage) ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($currentPage < $totalPages) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $currentPage + 1 ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</div>

<script>
    const item_detail = document.querySelectorAll('.item_detail');
    item_detail.forEach((item) => {
        item.addEventListener('click', (e) => {
            if (e.target.closest(".btn_addcart")) {
                e.preventDefault();
                let url = e.target.closest(".btn_addcart").getAttribute('data-url');
                window.location.href = url;
            }
        })
    })
</script>
