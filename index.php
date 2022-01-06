<?php
    session_start();
    require_once('db/dbhelper.php');

?>
<html lang="en-SG">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <!--linh icon-->
    <link rel="icon" href="img/logo.png" />
    <link rel="stylesheet" href="css/styleALL.css" />
    <link rel="stylesheet" href="css/NewArrival.css" />
    <link rel="stylesheet" href="css/styleCarousel.css" />
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
    <title>LinhVuShop</title>
</head>

<body>
    <?php
    include_once('layout/header.php');
    ?>


    <!-- carouel-->
    <section class="home">
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-controls">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active" style="background-image: url('AnhWeb/img/louis-vuitton-banner1.jpg')"></li>
                    <li data-target="#carousel" data-slide-to="1" style="background-image: url('AnhWeb/img/louisvuitton-banner2.jpg')">
                    </li>
                    <li data-target="#carousel" data-slide-to="2" style="background-image: url('AnhWeb/img/louisvuitton3.jpg')"></li>
                </ol>
                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <img src="AnhWeb/img/left-arrow.svg" alt="Prev" />
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <img src="AnhWeb/img/right-arrow.svg" alt="Next" />
                </a>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" style="background-image: url('AnhWeb/img/louis-vuitton-banner1.jpg')">
                    <div class="container">
                        <h2>LOUIS VUITION</h2>
                        <p>Summer Collection</p>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('AnhWeb/img/louisvuitton-banner2.jpg')">
                    <div class="container">
                        <h2>TOWARD TO DREAM</h2>
                        <p>Summer Collection</p>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('AnhWeb/img/louisvuitton3.jpg')">
                    <div class="container">
                        <h2>LIVING STYLE</h2>
                        <p>Summer Collection</p>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="Hightlight">
        <section class="lv-homepage__topedits">
            <h2 id="highlight" class="text-uppercase">Highlights</h2>
            <ul class="d-flex justify-content-center">
                <li>
                    <a href="#" class="">
                        <div>
                            <div class="lv-content-push__media">
                                <div class="lv-smart-picture lv-responsive-picture is-loaded" style="background-color: white">
                                    <picture><img sizes="(min-width: 48rem) 33.33vw,(min-width: 0rem) 100vw" class="lv-smart-picture__object" srcset="
                                                  https://ap.louisvuitton.com/images/is/image/lv/1/PP_VP_L/louis-vuitton--HP_SG_Leather_bag_Cluny_DII.jpg?wid=216   216w,
                                                  https://ap.louisvuitton.com/images/is/image/lv/1/PP_VP_L/louis-vuitton--HP_SG_Leather_bag_Cluny_DII.jpg?wid=320   320w,
                                                  https://ap.louisvuitton.com/images/is/image/lv/1/PP_VP_L/louis-vuitton--HP_SG_Leather_bag_Cluny_DII.jpg?wid=456   456w,
                                                  https://ap.louisvuitton.com/images/is/image/lv/1/PP_VP_L/louis-vuitton--HP_SG_Leather_bag_Cluny_DII.jpg?wid=656   656w,
                                                  https://ap.louisvuitton.com/images/is/image/lv/1/PP_VP_L/louis-vuitton--HP_SG_Leather_bag_Cluny_DII.jpg?wid=824   824w,
                                                  https://ap.louisvuitton.com/images/is/image/lv/1/PP_VP_L/louis-vuitton--HP_SG_Leather_bag_Cluny_DII.jpg?wid=1080 1080w,
                                                  https://ap.louisvuitton.com/images/is/image/lv/1/PP_VP_L/louis-vuitton--HP_SG_Leather_bag_Cluny_DII.jpg?wid=1240 1240w,
                                                  https://ap.louisvuitton.com/images/is/image/lv/1/PP_VP_L/louis-vuitton--HP_SG_Leather_bag_Cluny_DII.jpg?wid=2048 2048w
                                                  " src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" /></picture>
                                    <!---->
                                    <style></style>
                                    <noscript><img src="https://ap.louisvuitton.com/images/is/image/lv/1/PP_VP_L/louis-vuitton--HP_SG_Leather_bag_Cluny_DII.jpg" alt="" /></noscript>
                                </div>
                            </div>
                            <h5 class="highlighttitle">NEW IN FOR WOMEN</h5>
                            <!---->
                            <!---->
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#" class="lv-smart-link lv-content-push list-label-xl -vertical">
                        <div>
                            <div class="lv-content-push__media">
                                <div class="lv-smart-picture lv-responsive-picture is-loaded" style="background-color: white">
                                    <picture><img sizes="(min-width: 48rem) 33.33vw,(min-width: 0rem) 100vw" class="lv-smart-picture__object" srcset="
                                                  https://ap.louisvuitton.com/images/is/image/lv/1/PP_VP_L/louis-vuitton--HP_AU_Men_The_Latest_DII.jpg?wid=216   216w,
                                                  https://ap.louisvuitton.com/images/is/image/lv/1/PP_VP_L/louis-vuitton--HP_AU_Men_The_Latest_DII.jpg?wid=320   320w,
                                                  https://ap.louisvuitton.com/images/is/image/lv/1/PP_VP_L/louis-vuitton--HP_AU_Men_The_Latest_DII.jpg?wid=456   456w,
                                                  https://ap.louisvuitton.com/images/is/image/lv/1/PP_VP_L/louis-vuitton--HP_AU_Men_The_Latest_DII.jpg?wid=656   656w,
                                                  https://ap.louisvuitton.com/images/is/image/lv/1/PP_VP_L/louis-vuitton--HP_AU_Men_The_Latest_DII.jpg?wid=824   824w,
                                                  https://ap.louisvuitton.com/images/is/image/lv/1/PP_VP_L/louis-vuitton--HP_AU_Men_The_Latest_DII.jpg?wid=1080 1080w,
                                                  https://ap.louisvuitton.com/images/is/image/lv/1/PP_VP_L/louis-vuitton--HP_AU_Men_The_Latest_DII.jpg?wid=1240 1240w,
                                                  https://ap.louisvuitton.com/images/is/image/lv/1/PP_VP_L/louis-vuitton--HP_AU_Men_The_Latest_DII.jpg?wid=2048 2048w
                                                  " src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" /></picture>
                                    <!---->
                                    <style></style>
                                    <noscript><img src="https://ap.louisvuitton.com/images/is/image/lv/1/PP_VP_L/louis-vuitton--HP_AU_Men_The_Latest_DII.jpg" alt="" /></noscript>
                                </div>
                            </div>
                            <h5 class="highlighttitle">NEW IN FOR MEN</h5>
                            <!---->
                            <!---->
                        </div>
                    </a>
                </li>
            </ul>
        </section>
    </div>


    <!--NEW ARRIVAL-------------------------------->
    <div class="product-show">
        <section class="new-arrival">
            <!--heading-------->
            <div class="arrival-heading">
                <strong>New Arrival</strong>
                <p>We Provide You New Fasion Design Clothes</p>
            </div>

            <!--products----------------------->
            <div class="product-containe">
                <?php
                require_once('db/dbhelper.php');
                $sql = " select * FROM product ORDER BY id DESC LIMIT 5";
                $result = executeResult($sql);
                foreach ($result as $product) {
                    echo ('<div class="product-box">
                            <!--product-img------------>
                            <div class="product-img">
                            <!--add-cart---->
                            <a href="addtocart.php?productId='.$product['id'].'" class="add-cart">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                            <!--img------>
                            <img src="'.$product['image_url'].'">
                            </div>
                        <!--product-details-------->
                        <div class="product-details">
                            <a href="#" class="p-name">'.$product['name'].'</a>
                            <span class="p-price">$'.$product['price'].'</span>
                        </div>
                    </div>');
                }
                ?>
            </div>
        </section>
    </div>
    <!--foooter-->
    <?php
    include_once('layout/footer.php');
    ?>
    <script src="js/navbar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
</body>

</html>