<?php
session_start();
    require_once('db/dbhelper.php');
    $_SESSION['mess'];
    $id;
    if(!empty($_GET['id'])){
        $id=$_GET['id'];
        $name=$_GET['name'];
        $code=$_GET['code'];
        $image_url=$_GET['image_url'];
        $price=$_GET['price'];
        $quantity=$_GET['quantity'];
        $status=$_GET['status'];
        $subcate=$_GET['subcate'];
        $des=$_GET['descript'];
        $sale=$_GET['sale'];
        $sql=' update `product` SET `code`="'.$code.'",`name`="'.$name.'",
        `quantity`='.$quantity.',`price`='.$price.',`description`="'.$des.'",`image_url`="'.$image_url.'",
        `status`='.$status.',`sub_category_id`='.$subcate.',`sale`='.$sale.' WHERE id='.$id;
        print_r($sql);
        if ($conn->query($sql) === TRUE) {
            echo "update thành công";
            header("Location: editProduct.php?id=".$id);
            $_SESSION['mess']="update thanh cong";
        } else {
            echo "Update thất bại: " . $conn->error;
            $_SESSION['mess']="update that bai";
        }
        // ngắt kết nối
        $conn->close();
        
        $layIdImage='select id from `image` WHERE product_id='.$id;
        $totalImage='select COUNT(id)  FROM `image`';
        $ImageLastID=executeResult($totalImage);
        $listIDImage=executeResult($layIdImage);
        
        foreach($listIDImage as $image){
            $imageUrl=$_GET['image'.$image['id']];
            $sqlUpdateImage='UPDATE `image` 
            SET `id`='.$image['id'].',`product_id`='.$id.',`image_url`="'.$image_url.
            '",`status`= 1 WHERE product_id='.$id;
            execute($sqlUpdateImage);
        }

        if(isset($_GET['imageNew']) && !empty($_GET['imageNew'])){
            $addImage='INSERT INTO `image`(`id`, `product_id`, `image_url`, `status`) 
                VALUES ('.++$ImageLastID['id'].','.$id.','.$_GET['imageNew'].',1)';
            execute($addImage);
        }
    }else{
        print_r("Co Loi");
    }
?>