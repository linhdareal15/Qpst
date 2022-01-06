<nav class=hed>
    <!--social-links-and-phone-number----------------->
    <div class="social-call">
        <!--social-links--->
        <div class="social">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div>
        <!--phone-number------>
        <div class="phone">
            <span>Call: +84 345291510</span>
        </div>
    </div>
    <!--menu-bar----------------------------------------->
    <div class="navigation">
        <!--logo------------>
        <a href="index.php" class="logo"><img src="AnhWeb/img/logo.png" /></a>
        <!--menu-icon------------->
        <div class="itog">
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
            </a>
        </div>
        <!--menu----------------->
        <ul id="menu" class="menu">
            <li><a style="text-decoration: none;" href="index.php">Home</a></li>
            <li class="shop"><a style="text-decoration: none;" href="shop.php">SHOP</a></li>
            <li>
                <a style="text-decoration: none;" href="#">TOP</a>
                <!--lable---->
                <span class="sale-lable">Sale</span>
            </li>
            <li><a style="text-decoration: none;" href="#">BOTTOM</a></li>
            <li><a style="text-decoration: none;" href="#">ACCESSORIES</a></li>
            <li><a style="text-decoration: none;" href="#">COLLECTION</a></li>
            <li><a style="text-decoration: none;" href="#">OTHER</a></li>
        </ul>
        <!--right-menu----------->
        <div class="right-menu">
            <a href="javascript:void(0);" class="search" style="text-decoration: none;">
                <i class="fas fa-search"></i>
            </a>
            <a href="cart.php" style="text-decoration: none;margin-right: 25px">
                <i class="fas fa-shopping-cart">
                    <?php
                        // session_start();
                        if(!isset($_SESSION['cart']) && empty($_SESSION['cart'])){
                            echo('<span class="num-cart-product">
                                     0
                                </span>');
                        }else{
                            echo('<span class="num-cart-product">
                                     '.sizeof($_SESSION['cart']).'
                                </span>');
                        }
                    ?>
                    
                </i>
            </a>
            <?php
                if(!isset($_SESSION['account']) && empty($_SESSION['account'])){
                    echo('<a href="login.php"style="text-decoration: none;" class="user">
                                <i class="far fa-user"></i> LOGIN
                          </a>');
                }else{
            ?>
                    <div class="ml-0">
                        <i class="dropdown">
                            <button class="btn btn-secondary " type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-bars"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <?php
                                    if($_SESSION['account']['role_id']!=1){
                                        echo('<li><a class="dropdown-item" href="manage">ManageProfile</a></li>');
                                    }elseif($_SESSION['account']['role_id']==1){
                                        echo('<li><a class="dropdown-item" href="ManagerProduct.php">Manage Product</a></li>
                                        <li><a class="dropdown-item" href="#">Manage Account</a></li>
                                        <li><a class="dropdown-item" href="Manage">Manage Order</a></li>');
                                    }
                                ?>
                                <?php
                                    if($_SESSION['account']['role_id']!=1){
                                        echo('<li><a class="dropdown-item" href="#">Order detail</a></li>');
                                    }
                                ?>
                                <li><a class="dropdown-item" href="logout.php">LOGOUT</a></li>
                            </ul>
                        </i>
                    </div>
                
            <?php
                }
            ?>
        </div>
</nav>