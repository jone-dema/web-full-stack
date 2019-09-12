<?php 
require_once './config/database.php';
require_once './config/config.php';
spl_autoload_register(function($class_name) {
	require	'./app/Models/' . $class_name . '.php';
});
$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
$perPage = 3;

$productModel = new ProductModel();
$q = $_GET['q'];
$products = $productModel->searchItem($q, $page, $perPage);

//Tổng số dòng
$totalRow = $productModel->countSearchItem($q);
$pageLinks = $productModel->createPageLinks($totalRow, $perPage, "search.php?q=$q");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Mobile Admin</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="public/css/bootstrap.min.css" />
	<link rel="stylesheet" href="public/css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="public/css/uniform.css" />
	<link rel="stylesheet" href="public/css/select2.css" />
	<link rel="stylesheet" href="public/css/matrix-style.css" />
	<link rel="stylesheet" href="public/css/matrix-media.css" />
	<link href="public/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
	<style type="text/css">
		ul.pagination{
			list-style: none;
			float: right;
		}
		ul.pagination li.active{
			font-weight: bold
		}
		ul.pagination li{
		  float: left;
		  display: inline-block;
		  padding: 10px
		}
	</style>
</head>
<body>

<!--Header-part-->
<div id="header">
	<h1><a href="dashboard.html">Dashboard</a></h1>
</div>
<!--close-Header-part-->

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">

	<ul class="nav">
		
			<div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a></div>
		<li class=""><a title="" href="index.php"><i class="icon icon-share-alt"></i> <span class="text">Đăng Xuất</span></a></li>
        <li class=""><a title="" href="login.php"><i class="icon icon-share-alt"></i> <span class="text">Đăng Nhập</span></a></li>
        <li class=""><a title="" href="register.php"><i class="icon icon-cog"></i> <span class="text">Đăng ký</span></a></li>
	</ul>
</div>

<!--start-top-serch-->
<div id="search">
	<form action="search.php" method="get">
	<input type="text" placeholder="Search here..." name="q"/>
	<button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</form>
</div>
<!--close-top-serch-->

<!--sidebar-menu-->
<!-- BEGIN CONTENT -->
<div id="content">
	<div id="content-header">
		
		<h1>Manage Products</h1>
	</div>
	<div class="container-fluid">
		<hr>
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					<div class="widget-title"> <span class="icon"><a href=""> <i class="icon-plus"></i> </a></span>
						<h5>Products</h5>
					</div>
					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped">
							<thead>
							<tr>
								<th>images</th>
								<th>Name</th>
								<th>Type</th>
								<th>Manufactures</th>
								<th>Description</th>
								<th>Price (VND)</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>

							<?php foreach ($products as $key => $product) {
							?>
							
							<tr class="">
								<td><img src="../public/images/lenovo-phab-2gb-400x460-400x460.png" /></td>
								<td><?php echo $product['product_name']; ?></td>
								<td>Tablet</td>
								<td>SamSung</td>
								<td>Bút S-pen giúp Galaxy Tab A Plus trở thành 1 trợ thủ đắc lực cho người dùng văn phòng. Có thể phác thảo nhanh, tốc ký hay đơn giản là những ghi chú.
									Galaxy Tab A có thiết kế đẹp, khung viền kim loại sáng bóng tạo cảm giác chắc chắn. Màn hình lớn đến 9.7 inch cho bạn giải trí, xem phim thú vị hơn.
									Hỗ trợ khe Sim giúp Tab A có thể nghe gọi, nhắn tin như 1 chiếc smartphone</td>
								<td>5,490,000</td>
								<td>
									<a href="./editproduct.php?id=<?php echo $product['product_id'] ?>" class="btn btn-success btn-mini">Edit</a>
									<a href="#" class="btn btn-danger btn-mini">Delete</a>
								</td>
							</tr>

							<?php 
							}
							?>

							
					
						</tbody>
						</table>

						
						<ul class="pagination">
							<?php echo $pageLinks; ?>
						</ul>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END CONTENT -->
<!--Footer-part-->
<div class="row-fluid">
	<div id="footer" class="span12"> 2017 &copy; TDC - Lập trình web 1</div>
</div>
<!--end-Footer-part-->
<script src="public/js/jquery.min.js"></script>
<script src="public/js/jquery.ui.custom.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/jquery.uniform.js"></script>
<script src="public/js/select2.min.js"></script>
<script src="public/js/jquery.dataTables.min.js"></script>
<script src="public/js/matrix.js"></script>
<script src="public/js/matrix.tables.js"></script>
</body>
</html>

