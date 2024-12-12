<!DOCTYPE html>
<html lang="en">

<?php
	include_once "component/head.php";
	include 'component/pagination.php';
?>

<body class="goto-here">
  <?php include_once "component/header.php" ?>

	<div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate text-center">
					<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Products</span>
					</p>
					<h1 class="mb-0 bread">Products</h1>
				</div>
			</div>
		</div>
	</div>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 mb-5 text-center">
					<ul class="product-category">
						<?php
							$selectedCategory = isset($_GET['category']) ? $_GET['category'] : 'All';

							foreach ($categories as $category):
						?>
							<li>
								<a href="?category=<?= urlencode($category) ?>&page=1"
								class="<?= ($category === $selectedCategory) ? 'active' : '' ?>">
									<?= htmlspecialchars($category) ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			</div>
			<div class="row">
				<?php

					// Lọc dữ liệu theo danh mục
					$filteredData = ($selectedCategory === 'All')
						? $products
						: array_filter($products, function ($item) use ($selectedCategory) {
							return $item['category'] === $selectedCategory;
						});
					
					// Phân trang
					$itemsPerPage = 12;
					$totalItems = count($filteredData);
					$totalPages = ceil($totalItems / $itemsPerPage);
					
					// Lấy trang hiện tại từ query string (mặc định là trang 1)
					$currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
					
					// Tính toán dữ liệu hiển thị cho trang hiện tại
					$offset = ($currentPage - 1) * $itemsPerPage;
					$paginatedData = array_slice($filteredData, $offset, $itemsPerPage);
					if (!empty($paginatedData)):
				?>
						<?php foreach ($paginatedData as $product): ?>
							<div class="col-md-6 col-lg-3 ftco-animate">
								<div class="product">
									<a href="product-single.php" class="img-prod">
										<img class="img-fluid" src="<?= $product['image'] ?>" alt="<?= htmlspecialchars($product['name']) ?>">
										<?php if ($product['discount']): ?>
											<span class="status"><?= $product['discount'] ?>%</span>
										<?php endif; ?>
										<div class="overlay"></div>
									</a>
									<div class="text py-3 pb-4 px-3 text-center">
										<h3><a href="product-single.php"><?= htmlspecialchars($product['name']) ?></a></h3>
										<div class="d-flex">
											<div class="pricing">
												<p class="price">
													<?php if ($product['sale_price']): ?>
														<span class="mr-2 price-dc">$<?= number_format($product['original_price'], 2) ?></span>
														<span class="price-sale">$<?= number_format($product['sale_price'], 2) ?></span>
													<?php else: ?>
														<span>$<?= number_format($product['original_price'], 2) ?></span>
													<?php endif; ?>
												</p>
											</div>
										</div>
										<div class="bottom-area d-flex px-3">
											<div class="m-auto d-flex">
												<a href="product-single.php" class="add-to-cart d-flex justify-content-center align-items-center text-center">
													<span><i class="ion-ios-menu"></i></span>
												</a>
												<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
													<span><i class="ion-ios-cart"></i></span>
												</a>
												<a href="#" class="heart d-flex justify-content-center align-items-center">
													<span><i class="ion-ios-heart"></i></span>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					<?php else: ?>
						<div class="col text-center">
							<p>No products found in this category.</p>
						</div>
					<?php endif; ?>
			</div>
			<?php
				$urlPattern = 'shop.php?category=' . $selectedCategory . '&page=%d';
				renderPagination($currentPage, $totalPages, $urlPattern);
			?>
		</div>
	</section>

	<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
		<div class="container py-4">
			<div class="row d-flex justify-content-center py-5">
				<div class="col-md-6">
					<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
					<span>Get e-mail updates about our latest shops and special offers</span>
				</div>
				<div class="col-md-6 d-flex align-items-center">
					<form action="#" class="subscribe-form">
						<div class="form-group d-flex">
							<input type="text" class="form-control" placeholder="Enter email address">
							<input type="submit" value="Subscribe" class="submit px-3">
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>

	<?php
		include_once 'component/footer.php';
		include_once 'component/script.php';
	?>
</body>

</html>