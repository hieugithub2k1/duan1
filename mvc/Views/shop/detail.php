
		<!-- Start Hero Section -->
        <div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1><?= $detail['product_name'] ?></h1>
								<p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>
								<p><a href="" class="btn btn-secondary me-2">Shop Now</a><a href="#" class="btn btn-white-outline">Explore</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="<?= WEB_ROOT ?>/public/css2/images/couch.png" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		
	<div class="product-detail-section py-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="product-image">
						<img src="<?= WEB_ROOT ?>/public/css2/images/<?= $detail['img_url'] ?>" alt="Product Image" class="img-fluid">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="product-detail-content">
						<h1 class="product-title"><?= $detail['product_name'] ?></h1>
						<p class="product-description"><?= $detail['des'] ?></p>
						<strong class="product-price">$<?= $detail['price'] ?></strong>
						<form action="<?= WEB_ROOT ?>/cart/addocart/<?= $detail['id'] ?>" class="mt-4">
							<input type="hidden" name="product_id" value="1">
							<button type="submit" class="btn btn-primary">Add to Cart</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<style>
	body {
font-family: Arial, sans-serif;
}

.product-detail-section {
background-color: #f8f9fa;
}

.product-detail-content {
padding: 20px;
}

.product-title {
font-size: 2.5rem;
font-weight: bold;
margin-bottom: 20px;
}

.product-description {
font-size: 1.1rem;
line-height: 1.5;
margin-bottom: 20px;
}

.product-price {
font-size: 1.5rem;
color: #28a745;
margin-bottom: 20px;
}

.product-detail-content .btn-primary {
padding: 10px 20px;
font-size: 1.1rem;
border-radius: 5px;
}

.footer-section {
background: #3b5d50 !important;

padding-top: 20px;
color: #ffffff;
padding: 50px 0;
}

.footer-section a {
color: #ffffff;
}

.footer-logo-wrap {
margin-bottom: 20px;
}

.footer-logo {
font-size: 2rem;
font-weight: bold;
text-decoration: none;
}

.subscription-form .form-control {
border-radius: 30px;
padding: 10px 20px;
}

.subscription-form .btn-primary {
border-radius: 30px;
padding: 10px 20px;
}

.custom-social a {
font-size: 1.2rem;
margin-right: 15px;
}

.custom-social a:last-child {
margin-right: 0;
}

.links-wrap ul {
padding-left: 0;
}

.links-wrap ul li {
list-style: none;
margin-bottom: 10px;
}

.links-wrap ul li a {
text-decoration: none;
color: #ffffff;
}

.border-top {
border-top: 1px solid #6c757d;
padding-top: 20px;
}

.copyright p {
margin-bottom: 0;
}

.d-inline-flex {
display: inline-flex;
}

.ms-auto {
margin-left: auto;
}

.text-center {
text-align: center;
}

.text-lg-start {
text-align: left !important;
}

.text-lg-end {
text-align: right !important;
}

@media (max-width: 767.98px) {
.text-lg-start,
.text-lg-end {
text-align: center !important;
}
}
</style>