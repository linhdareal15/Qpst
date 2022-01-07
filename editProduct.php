<?php
session_start();
require_once('db/dbhelper.php');
$id = $_GET['id'];
$sql = "select * from product WHERE id=" . $id;
$product = executeResult($sql);
$sqlImage="select * from `image` WHERE product_id=".$id;
$listImage=executeResult($sqlImage);
// $_SESSION['mess'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Manager Product</title>
    <link rel="stylesheet" href="css/mangeProfile.css">
</head>

<body>
    <?php
    foreach ($product as $item) {


    ?>
        <div class="container rounded bg-white mt-5 mb-5">
            <form action="editController.php?id=<?php echo ($item['id']) ?>" method="get">
                <input hidden name="action" value="update">
                <div class="row">
                    <div class="col-md-2 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" style="height: 180px; width: 170px" src="<?php echo ($item['image_url']) ?>">
                            <span class="font-weight-bold"><?php echo ($item['name']) ?></span><span> </span>
                        </div>
                    </div>

                    <div class="col-md-4 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">PRODUCT MANAGER</h4>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"><label class="labels">Name</label><input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo ($item['name']) ?>"></div>
                                <!-- <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="" placeholder="surname"></div> -->
                            </div>
                            <div class="row mt-3">
                                <input name="id" type="hidden" class="form-control" value="<?php echo ($item['id']) ?>">
                                <div class="col-md-12">
                                    <label class="labels">Id</label>
                                    <input name="id" type="text" class="form-control" value="<?php echo ($item['id']) ?>" disabled="">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Code</label>
                                    <input name="code" type="text" class="form-control" placeholder="enter url" value="<?php echo ($item['code']) ?>">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">ImageUrl</label>
                                    <input name="image_url" type="text" class="form-control" placeholder="enter url" value="<?php echo ($item['image_url']) ?>">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Price</label>
                                    <input name="price" type="text" class="form-control" placeholder="enter price" value="<?php echo ($item['price']) ?>">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Quantity</label>
                                    <input name="quantity" type="text" class="form-control" placeholder="${product.getQuantity()}" value="<?php echo ($item['quantity']) ?>">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Status</label>
                                    <input name="status" type="text" class="form-control" value="<?php echo ($item['status']) ?>">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Subcategory ID</label>
                                    <input name="subcate" type="text" class="form-control" value="<?php echo ($item['sub_category_id']) ?>">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Description</label>
                                    <input name="descript" type="text" class="form-control" value="<?php echo ($item['description']) ?>">
                                </div>
                                <div class="col-md-12">
                                    <label class="labels">Sale</label>
                                    <input type="text" name="sale" class="form-control" value="<?php echo ($item['sale']) ?>">
                                </div>
                            </div>
                                <div class="mt-5 text-center">
                                    <button type="submit" class="btn btn-primary profile-button" type="button">Update Product</button>
                                </div>
                        <?php
                            }
                            if(isset($_SESSION['mess'])){
                                echo('<h3>'.$_SESSION['mess'].'</h3>');
                            }
                        ?>
                        
                        </div>
                    </div>
                    <div class="col-md-5 border-right" >
                    <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">IMAGE MANAGE</h4>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-12" hidden><label class="labels">Name</label><input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo ($item['name']) ?>"></div>
                                <!-- <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="" placeholder="surname"></div> -->
                            </div>
                            <div class="row mt-3">
                                <?php
                                // $count;
                                    if(!empty($listImage)){
                                        foreach($listImage as $image){
                                            // $count=0;
                                            echo('<div class="col-md-12">
                                                <label class="labels">Anh '.$image['id'].' URL</label>
                                                <input type="text" name="image'.$image['id'].'" class="form-control" value="'.$image['image_url'].'">
                                                <div class="mt-2 text-center">
                                                    <a href="editController.php?productId='.$product[0]['id'].'&idAnh='.$image['id'].'&action=delete"><span>Delete Image</span></a>
                                                </div>
                                            </div>');
                                            // ++$count;
                                        }
                                    }
                                ?>
                                <div class="col-md-12">
                                    <label class="labels">Anh moi</label>
                                    <input type="text" name="imageNew" class="form-control" value="">
                                </div>
                                
                            </div>
                            
                            </div>
                            
                    </div>
                    </div>

                </div>
            </form>
        </div>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>