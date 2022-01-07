<?php
session_start();
require_once('db/dbhelper.php');
if(isset($_SESSION['account'])&&$_SESSION['account']['role_id']==1){
    $sqlPagging = ("select count(id) as total from `product`");
$result = mysqli_query($conn, $sqlPagging);
$row = mysqli_fetch_assoc($result);
$total_record = $row['total'];

//tim limit va current page
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 10;
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
unset($_SESSION['mess']);

}else{
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/logo.png" />
        <title>PRODUCT MANAGER</title>
        <link rel="stylesheet" href="css/styleALL.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
        <!--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
        <link rel="stylesheet" href="css/NavbarCSS.css">
        <link rel="stylesheet" href="css/styleALL.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="css/manager.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />

    <body>
        <?php
            include_once('layout/header.php');
        ?>
        <div class="container">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Product</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="add"  class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New Product</span></a>
                            <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll">
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <!-- <c:if test="${listproducts==null}"><h5>NOT FOUND</h5></c:if> -->
                    <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td>
                                <span class="custom-checkbox">
                                    <input type="checkbox" name="checkbox${product.id}" value="${product.id}">
                                    <label for="checkbox${product.id}"></label>
                                </span>
                            </td>

                            <td><?php echo($row['id']) ?></td>
                            <td><?php echo($row['name']) ?></td>
                            <td>
                                <img style="width: 200px;
                                        height: 120px;"  src="<?php echo($row['image_url']) ?>">
                            </td>
                            <td><?php echo($row['price']) ?></td>
                            <td>

                                <a href="editProduct.php?id=<?php echo($row['id']) ?>"  class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                <a href="remove.php?action=removeProduct&id=<?php echo($row['id'])?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>

            </div>
            <div class="row" style="float:right">
                <ul class="pagination">
            <?php
            if ($current_page > 1 && $total_page > 1) {
                echo '<li><a href="ManagerProduct.php?page=' . ($current_page - 1) . '">Prev</a><li> ';
            }
            // Lặp khoảng giữa
            for ($i = 1; $i <= $total_page; $i++) {
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page) {
                    echo '<span>' . $i . '</span> ';
                } else {
                    echo '<li><a href="ManagerProduct.php?page=' . $i . '">' . $i . '</a></li> ';
                }
            }
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
            if ($current_page < $total_page && $total_page > 1) {
                echo '<li><a href="ManagerProduct.php?page=' . ($current_page + 1) . '">Next</a></li> ';
            }
        ?>  </ul></div>
            <a href="home"><button type="button" class="btn btn-primary">Back to home</button></a>

        </div>
        
        <script src="js/manager.js" type="text/javascript"></script>
        <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>