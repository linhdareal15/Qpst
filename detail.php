<?php
    require_once('db/dbhelper.php');
	if(isset($_GET['productId'])){
    $productId=$_GET['productId'];
    $product;
                     $sqlProduct="select * from `product` where id=".$productId;
                     $result1=executeResult($sqlProduct);
                            foreach($result1 as $item){
                                $product=array(
                                    'id' => $item['id'],
                                    'image_url' => $item['image_url'],
                                    'name' => $item['name'],
                                    'price' => $item['price'],
                                    'des' =>$item['description'],
                                    'quantity' => $item['quantity'],
                                    'sale' => $item['sale']
                                );
                            }
    $listImage;
    $sqlImage="select * from `image` where product_id=".$productId;
    $listImage=executeResult($sqlImage);
				$giaSauSale=0;
				if($product['sale']>0){
					$giaSauSale=$product['sale']*$product['price'];
				}
	}else{
		header('Location: index.php');
	}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="css/styleProductDetail.css">       
        <link rel="stylesheet" href="css/NavbarCSS.css"> 
        <link rel="stylesheet" href="css/styleALL.css"> 
        <title>JSP Page</title>
        <style>
            body {
                margin: 0px;
                padding: 0px;
                font-family: poppins;
                background-color: #ffffff;
            }
        </style>
    </head>
    
<body>
<?php
        include("layout/header.php");
    ?>
    <div class="pd-wrap">

        <!--Important link from https://bootsnipp.com/snippets/XqvZr-->

        <div class="container mt-4">
            <!--            <div class="heading-section">
                            <h2>Product Details</h2>
                        </div>-->
            <!-- <c:if test="${product==null}"><h3>Not found</h3></c:if> -->
            <div class="row">
	        	<div class="col-md-6">
	        		<div id="slider" class="owl-carousel product-slider">
                    <div class="item">
						  	<img src="<?php echo($product['image_url'])?>" />
						</div>
						<?php
                            foreach($listImage as $image){
                                echo('<div class="item">
                                <img src="'.$image['image_url'].'" />
                          </div>');
                            }
                        ?>
					</div>
					<div id="thumb" class="owl-carousel product-thumb" style="margin-top: 20px;">
                    <div class="item">
						  	<img src="<?php echo($product['image_url'])?>" />
						</div>
                    <?php
                            foreach($listImage as $image){
                                echo('<div class="item">
                                <img src="'.$image['image_url'].'" />
                          </div>');
                            }
                        ?>
					</div>
	        	</div>
	        	<div class="col-md-6">
	        		<div class="product-dtl">
        				<div class="product-info">
		        			<div class="product-name"><?php echo($product['name'])?></div>
		        			<div class="reviews-counter">
								<div class="rate">
								    <input type="radio" id="star5" name="rate" value="5" checked />
								    <label for="star5" title="text">5 stars</label>
								    <input type="radio" id="star4" name="rate" value="4"  />
								    <label for="star4" title="text">4 stars</label>
								    <input type="radio" id="star3" name="rate" value="3"  />
								    <label for="star3" title="text">3 stars</label>
								    <input type="radio" id="star2" name="rate" value="2"  />
								    <label for="star2" title="text">2 stars</label>
								    <input type="radio" id="star1" name="rate" value="1" />
								    <label for="star1" title="text">1 star</label>
								  </div>
								<span>15 Reviews</span>
							</div>
		        			<div class="product-price-discount">
								<?php
									if($product['sale']>0 && isset($giaSauSale)){
										echo('<span>'.$giaSauSale.'</span>');
										echo('<span class="line-through">'.$product['price'].'</span>');
									}else{
										echo('<span>'.$product['price'].'</span>');
									}
								?>
							</div>
		        		</div>
	        			<p><?php echo($product['des']); ?></p>
	        			<div class="row">
	        				<!-- <div class="col-md-6">
	        					<label for="size">Size</label>
								<select id="size" name="size" class="form-control">
									<option>S</option>
									<option>M</option>
									<option>L</option>
									<option>XL</option>
								</select>
	        				</div> -->
	        				<div class="col-md-6">
	        					<label for="color">Màu</label>
								<select id="color" name="color" class="form-control">
									<option>Xanh Dương</option>
									<option>Xanh Lá</option>
									<option>Đỏ</option>
								</select>
	        				</div>
	        			</div>
	        			<div class="product-count">
	        				<label for="size">Số lượng</label>
	        				<form action="#" class="display-flex">
							    <div class="qtyminus">-</div>
							    <input type="text" name="quantity" value="1" class="qty">
							    <div class="qtyplus">+</div>
							</form>
							<a href="#" class="round-black-btn">Thêm vào giỏ hàng</a>
	        			</div>
	        		</div>
	        	</div>
	        </div>
	        <div class="product-info-tabs">
		        <ul class="nav nav-tabs" id="myTab" role="tablist">
				  	<li class="nav-item">
				    	<a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
				  	</li>
				  	<li class="nav-item">
				    	<a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews (0)</a>
				  	</li>
				</ul>
				<div class="tab-content" id="myTabContent">
				  	<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
					  	<?php if(!empty($product['des']))
						 		 echo($product['des']); 
						  ?>
				  	</div>
				  	<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
				  		<div class="review-heading">REVIEWS</div>
				  		<p class="mb-20">There are no reviews yet.</p>
				  		<form class="review-form">
		        			<div class="form-group">
			        			<label>Your rating</label>
			        			<div class="reviews-counter">
									<div class="rate">
									    <input type="radio" id="star5" name="rate" value="5" />
									    <label for="star5" title="text">5 stars</label>
									    <input type="radio" id="star4" name="rate" value="4" />
									    <label for="star4" title="text">4 stars</label>
									    <input type="radio" id="star3" name="rate" value="3" />
									    <label for="star3" title="text">3 stars</label>
									    <input type="radio" id="star2" name="rate" value="2" />
									    <label for="star2" title="text">2 stars</label>
									    <input type="radio" id="star1" name="rate" value="1" />
									    <label for="star1" title="text">1 star</label>
									</div>
								</div>
							</div>
		        			<div class="form-group">
			        			<label>Your message</label>
			        			<textarea class="form-control" rows="10"></textarea>
			        		</div>
			        		<div class="row">
				        		<div class="col-md-6">
				        			<div class="form-group">
					        			<input type="text" name="" class="form-control" placeholder="Name*">
					        		</div>
					        	</div>
				        		<div class="col-md-6">
				        			<div class="form-group">
					        			<input type="text" name="" class="form-control" placeholder="Email Id*">
					        		</div>
					        	</div>
					        </div>
					        <button class="round-black-btn">Submit Review</button>
			        	</form>
				  	</div>
				</div>
			</div>
		</div>
    </div>
    <?php
        include('layout/footer.php');
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="	sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/ProductDetailJS.js"></script>

	</body>	
</html>