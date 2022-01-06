<?php
    session_start();   
    // $name; 
    // $phone; 
    // $email; $address;
    if(isset($_SESSION['account'])){
        $product;
        if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
            $product=$_SESSION['cart'];
            $tong=$_SESSION['tong'];
        }
        if($_POST['name'] !=null && $_POST['phone']!=null && $_POST['email']!=null  && $_POST['address']!=null){
            $name= $_POST['name'];
            $phone=$_POST['phone'];
            $email=$_POST['email'];
            $address=$_POST['address'];
            if($_POST['note'] !=null) $note = $_POST['note'];
        }
    }else{
        header("Location: login.php");
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="img/logo.png" />
        <link rel="stylesheet" href="css/styleALL.css" />
        <link rel="stylesheet" href="css/NavbarCSS.css" />
        <script crossorigin="anonymous" src="https://kit.fontawesome.com/c8e4d183c2.js"></script>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
              integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <link rel="stylesheet" href="static/css/main.css">
        <title>Prepare Shipping</title>
    </head>

    <body>
        <?php
            include_once('layout/header.php');
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card">
                        <div class="card-body mt-5" style="border: 1px solid #ced4da;border-radius: 5px">
                            <h4 class="mt-3">DANH SÁCH SẢN PHẨM</h4>
                            <table class="w-100 table table-striped mt-3">
                                <tbody>
                                    <tr>
                                        <th>Id</th>
                                        <th>ẢNH</th>
                                        <th>TÊN SẢN PHẨM</th>
                                        <th>GIÁ</th>
                                        <th>SỐ LƯỢNG</th>
                                        <th>TỔNG</th>
                                    </tr>
                                    <?php
                                        foreach($product as $item){
                                            $id=1;
                                            ?>
                                            <tr>
                                            <td><?php echo($id++); ?></td>
                                            <td>
                                                <img src="<?php echo($item['image_url']); ?>" style="width: 100px">
                                            </td>
                                            <td><?php echo($item['name']); ?></td>
                                            <td>
                                                <?php echo($item['price']); ?> VNĐ
                                            </td>
                                            <td>
                                                <?php echo($item['quantity']); ?>
                                            </td>
                                            <td>
                                            <?php echo($item['quantity'] * $item['price']); ?>
                                            </td>
                                        </tr>
                                    <?php    }
                                    ?>
                            
                                </tbody>
                            </table>
                            <hr>
                            <div class="text-right">
                                <h4>TỔNG: VNĐ <?php echo($tong); ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mt-5"><a onclick="document.getElementById('inf').submit()" class="btn btn-outline-success ml-auto w-100">Vận chuyển đến địa chỉ này
                        </a></div>
                            <div class="mt-3"><a onclick="document.getElementById('address').style.display = 'block'"
                                                 class="btn btn-outline-info ml-auto w-100">Vận chuyển đến địa chỉ khác</a>
                            </div>
                        </div>

                        <div class="col-md-9 mt-3">
                            <form id="inf" action="Shipping.php" method="post"
                                  style="border: 1px solid #ced4da !important; border-radius: 5px !important">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 style="color: orange">Ship to address</h4>
                                        <h6 style="overflow: visible !important">YOUR ORDER WILL BE SHIPPING TO THIS</h6><br>
                                        <div>YOUR NAME:<span class="ml-4"> <b><?php echo($name); ?></b><span></span></span></div>
                                        <input type="hidden" name="name" value="<?php echo($name); ?>">
                                        <input type="hidden" name="phone" value="<?php echo($phone); ?>">
                                        <input type="hidden" name="email" value="<?php echo($email); ?>">
                                        <input type="hidden" name="address" value="<?php echo($address); ?>">
                                        <input type="hidden" name="note" value="<?php if(isset($note)) echo($note); ?>">
                                        <div>YOUR EMAIL: <span class="ml-4"><?php echo($email); ?><span></span></span></div>
                                        <div>YOUR PHONE NUMBER: <span class="ml-4"><?php echo($phone); ?><span></span></span></div>
                                        <div>YOUR ADDRESS: <span class="ml-4"><?php echo($address); ?></span></div>
                                        <div>NOTE:  <span class="ml-4"><?php if(isset($note)) echo($note); ?></span></div>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                    <div class="row">

                        <div class="col-md-3">

                        </div>
                        <div id="address" class="col-md-9 mt-5" style="display: none;">
                            <div class="card">
                                <div class="card-body" style="border: 1px solid #ced4da;border-radius: 5px !important">
                                    <h4 class="mt-3" style="color: black">Infomation of Customer</h4>
                                    <div class="card mt-3">
                                        <div class="card-body">
                                            <form action="Shipping.php" method="POST">
                                                <div class="form-group">
                                                    <label for="name">Full Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                           placeholder="Enter name">
                                                    <label for="name">EMAIL</label>
                                                    <input type="text" name="email" class="form-control" placeholder="Enter email"
                                                           value=""
                                                           required="">
                                                    <small id="emailHelp" class="form-text text-muted"></small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="sdt">Phone number</label>
                                                    <input type="number" name="mobile" class="form-control"
                                                           placeholder="enter phone number">
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <textarea class="form-control" rows="3" name="address"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="address">Note</label>
                                                    <textarea class="form-control" rows="3" name="note"></textarea>
                                                </div>

                                                <button type="submit" class="btn btn-success w-100">Accept</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            include_once('layout/footer.php');
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/styleCarousel.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
    </body>
</html>