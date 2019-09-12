                 <?php 
require_once './config/database.php';
require_once './config/config.php';
spl_autoload_register(function($class_name) {
	require	'./app/Models/' . $class_name . '.php';
});
$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
$perPage = 3;

$productModel = new ProductModel();

$products = $productModel->getAllItems($page, $perPage);

//Tổng số dòng
$totalRow = $productModel->countAllItems();
$pageLinks = $productModel->createPageLinks($totalRow, $perPage);

if (isset($_POST['submitdelete'])) {
	$productModel->deleteItem($_POST['product_id']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Mobile</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="public/css/bootstrap.min.css" />
	<link rel="stylesheet" href="public/css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="public/css/uniform.css" />
	<link rel="stylesheet" href="public/css/select2.css" />
	<link rel="stylesheet" href="public/css/matrix-style.css" />
	<link rel="stylesheet" href="public/css/matrix-media.css" />
	<link rel="stylesheet" type="text/css" href="public/css/style123.css">
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
	
</div>
<!--close-Header-part-->

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">

	<ul class="nav">
		
		<li>
			<div id="breadcrumb"> 
			<a href="index.php" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a>
		</div></li>
        <li class=""><a title="" href="login.php"><i class="icon icon-share-alt"></i> <span class="text">Đăng Nhập</span></a></li>
        <!-- TÀI KHOẢN ĐĂNG Nhập
        	adminTDC
        mật khẩu 
        	admin
        -->
	</ul>
</div>

<!--start-top-serch-->

<!--close-top-serch-->

<!--sidebar-menu-->

<!-- BEGIN CONTENT -->
<div id="content">
	<div id="content-header">
	
		<h1>TDC Mobile</h1>
	</div>
	<div class="container-fluid">
		<hr>
		<div class="row-fluid">
			<div class="span12">
				<div class="widget-box">
					
					<div class="widget-content nopadding">
						<table class="table table-bordered table-striped">
							<thead>

							<tr>
								

							</tr>
							</thead>
							<tbody>

							<?php foreach ($products as $key => $product) {
							?>
							
							<tr class="">
							
								<ul class="blog column column_1_3">
									<li class="post">
										<a href="chưa làm" title="Iphone "> 
											<img src="public/images/<?php echo $product['product_name']; ?>" style="display: block;"> 
											<?php echo $product['product_name']; ?>
											<?php echo $product['category_name']; ?>
										</a> 
										<h2 class="with_number"> 
											<a href="chưa làm" title=""></a>
											<a href="javascript:void(0);" class="comments_number" title="3 comments">3
												<span class="arrow_comments">
												</span>
											</a>
										</h2>
										<ul class="post_details">
											<li class="category">
												<a href="chưa làm" title="Giam cân"> Mua Hàng Ngay</a></li> >
											</ul> 
											<p>Không chỉ là Điện thoại yêu thích,mà điện thoại này được  được mọi người công nhận là tốt cho sức khẻo nhât hiện tại...nhiều người đã sử dụng cách này và rất hiệu quả.....</p> 
											
												<span class="arrow"></span>
												<span>XEM THÊM A</span>
											</a> 
										</li>
									</ul>
								
							

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
	<div id="footer" class="span12"> 2018 &copy; TDC - Lập trình web 1</div>
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

