<?php
session_start();
require_once('db/dbhelper.php');
$sqlPagging = ("select count(id) as total from `product`");
$result = mysqli_query($conn, $sqlPagging);
$row = mysqli_fetch_assoc($result);
$total_record = $row['total'];

//tim limit va current page
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 20;
//tinh toan total page va start
$total_page = ceil($total_record / $limit);

//gioi han current_page trong khoang 1 den total_page
if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}
//tim start
$start = ($current_page - 1) * $limit;
$result = mysqli_query($conn, "SELECT * FROM `product` LIMIT $start, $limit ");

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Bootstrap CSS -->
    <!--linh icon-->
    <link rel="icon" href="AnhWeb/img/logo.png" />
    <link rel="stylesheet" href="css/styleALL.css" />
    <link rel="stylesheet" href="css/productCart.css" />
    <link rel="stylesheet" href="css/NavbarCSS.css" />
    
    <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
    <style>
        body {
            margin: 0px;
            padding: 0px;
            font-family: poppins;
            background-color: #ffffff;
        }
    </style>
    <title>SHOPPING</title>
</head>

<body>

    <?php
    include('layout/header.php');
    ?>

    <div class=" mt-1">
        <div class="lv-filters-bar-new__title">
            <div class="lv-category__title">
                <h1 class="text-center">
                    LV Fall
                </h1>
                <div class="vue-portal-target"></div>
            </div>
        </div>
    </div>



    <!-- <c:if test="${listProducts==null||listProducts.size()==0}">
        <h3>Not found</h3>
    </c:if> -->


    <div class="product-show">
        <section class="feature-item">
            <!--                <div class="feature-heading">  
                <strong style="text-transform:uppercase;">Featured Items</strong>
                <p>We Provide You New Fasion Design Clothes</p>
            </div>-->
            <div class="product-container">
                <?php
                // $sql="select * from product";
                // $result=executeResult($sql);
                while ($row = mysqli_fetch_assoc($result)) {

                    echo ('<div class="product-box">
                        
                        <div class="product-img">
                            
                            <a href="addtocart.php?action=add&id='.$row['id'].'" class="add-cart"><i class="fas fa-shopping-cart"></i></a>
                            
                            <a href="detail.php?productId=' . $row['id'] . '"><img src="' . $row['image_url'] . '"></a>
                        </div>
                        
                        <div class="product-details">
                            <a href="detail?productId=${product.id}" class="p-name">' . $row['name'] . '</a>
                            <span class="p-price">$' . $row['price'] . '</span>
                        </div>
                    </div>');
                }
                ?>

            </div>
        </section>

        <section class="categories">
            <!--                <div class="col-md-2">-->
            <h5 class="labelhead">
                <div class="alert alert-success" role="alert">
                    Category
                </div>
            </h5>
            <div class="category">
                <a href="#" class="pt-3" style="color: #d71e1e; font-size: 20px">All
                    Product</a>
                <?php
                $sql = "select * from category";
                $result = executeResult($sql);
                $sqlsubcate="";
                    foreach($result as $item){
                        echo('<a class="pt-4" href="filter?categoryId=${category.id}" style="color: #8400e7 !important; margin-left: 5px;font-size: 20px">'.$item['category_name'].'</a>');
                        
                    }
                ?>
                <!-- <c:forEach items="${listCategories}" var="category">
                    
                    <c:forEach items="${category.getListSubCategories()}" var="subCategory">
                        <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Hand Tools">
                            <a class="pl-3 subCategory" href="filter?subCategoryId=${subCategory.id}">
                                <li>${subCategory.subCategoryName}</li>
                            </a>
                        </span>
                    </c:forEach>
                </c:forEach> -->

                <!--</div>-->
            </div>
        </section>

    </div>
    <!-- <%@include file="components/pagging.jsp" %> -->
    <!-- pagging -->
    <div class="row" style="float:right">
        <ul class="pagination">
            <?php
            // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
            if ($current_page > 1 && $total_page > 1) {
                echo '<li><a href="shop.php?page=' . ($current_page - 1) . '">Prev</a><li> ';
            }
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++) {
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page) {
                    echo '<span>' . $i . '</span> ';
                } else {
                    echo '<li><a href="shop.php?page=' . $i . '">' . $i . '</a></li> ';
                }
            }
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1) {
                echo '<li><a href="shop.php?page=' . ($current_page + 1) . '">Next</a></li> ';
            }
            ?>
        </ul>
    </div>
    <!--foooter-->
    <?php
    include('layout/footer.php');
    ?>
    <script src="js/navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/styleCarousel.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
</body>

</html>