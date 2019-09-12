<?php 
require_once './config/database.php';
require_once './config/config.php';
spl_autoload_register(function($class_name) {
	require	'./app/Models/' . $class_name . '.php';
});

$productModel = new ProductModel();
$products = $productModel->getItemById($_GET['id']);

$CategoryModel = new CategoryModel();
$categories = $CategoryModel->getAllItems();

if(isset($_POST['editItem'])) {
    if($productModel->editItem($_GET['id'], $_POST['itemName'], $_POST['type_id'])) {
        echo "Edit Successfully.";
        header("Location: " . BASE_URL);
    } else {
        echo "Edit Failed.";
    }
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
    <link href="../public/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

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
        
        <li>
            <div id="breadcrumb"> 
            <a href="index.php" title="Go to Home" class="tip-bottom current"><i class="icon-home"></i> Home</a>
        </div></li>
        <li class=""><a title="" href="index.php"><i class="icon icon-share-alt"></i> <span class="text">Đăng Xuất</span></a></li>
    </ul>
</div>

<!--start-top-serch-->
<div id="search">
    <form action="result.html" method="get">
    <input type="text" placeholder="Search here..." name="key"/>
    <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</form>
</div>
<!--close-top-serch-->

<!--sidebar-menu-->



<!-- BEGIN CONTENT -->
<div id="content">
    <div id="content-header">
        
        <h1>Add New Product</h1>
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                        <h5>Product Detail</h5>
                    </div>
                    <div class="widget-content nopadding">

                        <!-- BEGIN USER FORM -->

                        <form action="editproduct.php/?id=<?php echo $products[0]['product_id']; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label">Name :</label>
                                <div class="controls">
                                    <input type="text" class="span11" placeholder="Product name" name="itemName" value="<?php echo $products[0]['product_name']; ?>"/> *
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Choose a product type :</label>
                                <div class="controls">
                                    <select name="type_id">
                                        <?php foreach ($categories as $category): ?>
                                            <option value="<?php echo $category['category_id'] ?>">
                                                <?php echo $category['category_name']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select> *
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="control-group">
                                    <label class="control-label">Choose an image :</label>
                                    <div class="controls">
                                        <input type="file" name="fileUpload" id="fileUpload">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label"  >Description</label>
                                    <div class="controls">
                                        <textarea class="span11" placeholder="Description" name = "description"></textarea>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Price :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" placeholder="price" name = "price" /> *
                                        </div>

                                    </div>

                                    <div class="form-actions">
                                        <button type="submit" name="editItem" class="btn btn-success">Update</button>
                                    </div>
                                </div>

                        </form>
                        <!-- END USER FORM -->


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