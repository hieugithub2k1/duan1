
<?php 
if (isset($_SESSION['success_message'])) {
    // In ra thông báo thành công
    echo "<div class='alert alert-success'>" . $_SESSION['success_message'] . "</div>";
    // Xóa session flash
    unset($_SESSION['success_message']);
}
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap4" />

	<!-- Bootstrap CSS -->
	<link href="<?= WEB_ROOT ?>/public/css2/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link href="<?= WEB_ROOT ?>/public/css2/css/tiny-slider.css" rel="stylesheet">
	<link href="<?= WEB_ROOT ?>/public/css2/css/style.css" rel="stylesheet">
	<title>Furni Free Bootstrap 5 Template for Furniture and Interior Design Websites by Untree.co </title>
</head>

<body>

	<!-- Start Header/Navigation -->
	<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

		<div class="container">
			<a class="navbar-brand" href="index.html">Furni<span>.</span></a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsFurni">
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
					<li class="nav-item active">
						<a class="nav-link" href="http://localhost/testmvc/home/show">Home</a>
					</li>
					<li><a class="nav-link" href="http://localhost/testmvc/shop/show">Shop</a></li>
					<li><a class="nav-link" href="http://localhost/testmvc/home/about">About us</a></li>
					<li><a class="nav-link" href="http://localhost/testmvc/service/show">Services</a></li>
					<li><a class="nav-link" href="http://localhost/testmvc/home/blog">Blog</a></li>
					<li><a class="nav-link" href="http://localhost/testmvc/home/contact">Contact us</a></li>
				</ul>

				<?php
				// Kiểm tra xem phiên session đã được bắt đầu chưa trước khi gọi session_start()
				if (session_status() === PHP_SESSION_NONE) {
					session_start();
				}

				// Tiếp tục với mã PHP khác ở đây
				?>

				<!-- Trích dẫn một phần của mã HTML hiện tại -->
				<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
					<?php
					if (isset($_SESSION['username'])) {
						// Hiển thị tên người dùng và nút đăng xuất
						echo '<li class="nav-item">
                  <span class="nav-link">Xin chào, ' . $_SESSION['username'] . '</span>
              </li>';
						echo '<li class="nav-item">
                  <a class="nav-link" href="' . WEB_ROOT . '/users/logout">Đăng xuất</a>
              </li>';
					} else {
						// Hiển thị biểu tượng đăng nhập
						echo '<li class="nav-item">
                  <a class="nav-link" href="' . WEB_ROOT . '/home/login"><img src="' . WEB_ROOT . '/public/css2/images/user.svg"></a>
              </li>';
					}
					?>
					<li><a class="nav-link" href="http://localhost/testmvc/cart/show"><img src="<?= WEB_ROOT ?>/public/css2/images/cart.svg"></a></li>
				</ul>
			</div>
		</div>

	</nav>
	<!-- End Header/Navigation -->

	<?php
	try {
		$this->view($ct_path, $sub_ct);
	} catch (Exception $err) {
		print_r($err);
	}
	?>

	<!-- đây là bắt đầu phần footer -->
	<!-- footer -->
	<!-- Start Footer Section -->
	<footer class="footer-section">
		<div class="container relative">

			<div class="sofa-img">
				<img src="<?= WEB_ROOT ?>/public/css2/images/sofa.png" alt="Image" class="img-fluid">
			</div>

			<div class="row">
				<div class="col-lg-8">
					<div class="subscription-form">
						<h3 class="d-flex align-items-center"><span class="me-1"><img src="<?= WEB_ROOT ?>/public/css2/images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

						<form action="#" class="row g-3">
							<div class="col-auto">
								<input type="text" class="form-control" placeholder="Enter your name">
							</div>
							<div class="col-auto">
								<input type="email" class="form-control" placeholder="Enter your email">
							</div>
							<div class="col-auto">
								<button class="btn btn-primary">
									<span class="fa fa-paper-plane"></span>
								</button>
							</div>
						</form>

					</div>
				</div>
			</div>

			<div class="row g-5 mb-5">
				<div class="col-lg-4">
					<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Furni<span>.</span></a></div>
					<p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant</p>

					<ul class="list-unstyled custom-social">
						<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
						<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
						<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
						<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
					</ul>
				</div>

				<div class="col-lg-8">
					<div class="row links-wrap">
						<div class="col-6 col-sm-6 col-md-3">
							<ul class="list-unstyled">
								<li><a href="#">About us</a></li>
								<li><a href="#">Services</a></li>
								<li><a href="#">Blog</a></li>
								<li><a href="#">Contact us</a></li>
							</ul>
						</div>

						<div class="col-6 col-sm-6 col-md-3">
							<ul class="list-unstyled">
								<li><a href="#">Support</a></li>
								<li><a href="#">Knowledge base</a></li>
								<li><a href="#">Live chat</a></li>
							</ul>
						</div>

						<div class="col-6 col-sm-6 col-md-3">
							<ul class="list-unstyled">
								<li><a href="#">Jobs</a></li>
								<li><a href="#">Our team</a></li>
								<li><a href="#">Leadership</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

						<div class="col-6 col-sm-6 col-md-3">
							<ul class="list-unstyled">
								<li><a href="#">Nordic Chair</a></li>
								<li><a href="#">Kruzo Aero</a></li>
								<li><a href="#">Ergonomic Chair</a></li>
							</ul>
						</div>
					</div>
				</div>

			</div>

			<div class="border-top copyright">
				<div class="row pt-4">
					<div class="col-lg-6">
						<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>
								document.write(new Date().getFullYear());
							</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a hreff="https://themewagon.com">ThemeWagon</a> <!-- License information: https://untree.co/license/ -->
						</p>
					</div>

					<div class="col-lg-6 text-center text-lg-end">
						<ul class="list-unstyled d-inline-flex ms-auto">
							<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul>
					</div>

				</div>
			</div>

		</div>
	</footer>
	<!-- End Footer Section -->


	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/tiny-slider.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>