<?php
session_start();
    header('Content-Type: text/html; charset=utf-8');
    require_once('db/dbhelper.php');
    $_SESSION['mess']="";
    
    if(!empty($_GET['idAnh']) && $_GET['action']=="delete"){
        $productId=$_GET['productId'];
        $idAnh=$_GET['idAnh'];
        $sql='DELETE FROM `image` WHERE id='.$idAnh;
        if ($conn->query($sql) === TRUE) {
            echo "update thành công";
            header("Location: editProduct.php?id=".$productId);

            $_SESSION['mess']='Xoa anh '.$idAnh.'thanh cong';
        } else {
            echo "Update thất bại: " . $conn->error;
            $_SESSION['mess']="xoa anh that bai";
        }
    }
    
    if(!empty($_GET['id']) && $_GET['action']=="update" ){
        $id=$_GET['id'];
        $name=$_GET['nameProduct'];
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
        // print_r($sql);
        if ($conn->query($sql) === TRUE) {
            echo "update thành công";
            $_SESSION['mess']="update thanh cong";
        } else {
            echo "Update thất bại: " . $conn->error;
            $_SESSION['mess']="update that bai";
        }
        // ngắt kết nối
        // $conn->close();
        
        $layIdImage='select id from `image` WHERE product_id='.$id;
        $totalImage='select COUNT(id) as id  FROM `image`';
        $ImageLastID=executeResult($totalImage);
        $listIDImage=executeResult($layIdImage);
        
        foreach($listIDImage as $image){
            $imageUrl=$_GET['image'.$image['id']];
            $sqlUpdateImage='UPDATE `image` 
            SET `id`='.$image['id'].',`product_id`='.$id.',`image_url`="'.$image_url.
            '",`status`= 1 WHERE product_id='.$id;
            execute($sqlUpdateImage);
        }
        $id=$_GET['id'];
        
        
        //them anh moi
        if(isset($_GET['imageNew']) && !empty($_GET['imageNew'])){
            $addImage='INSERT INTO `image`(`id`, `product_id`, `image_url`, `status`) 
                VALUES ('.++$ImageLastID[0]['id'].','.$id.',"'.$_GET['imageNew'].'",1)';
                print_r($addImage);
            if ($conn->query($addImage) === TRUE) {
            echo "update thành công";
            $_SESSION['mess']="update thanh cong";
        } else {
            echo "Update thất bại: " . $conn->error;
            $_SESSION['mess']="update that bai";
        }
        // ngắt kết nối
        $conn->close();
        }
        header("Location: editProduct.php?id=".$id);
    }
    // else{
    //     print_r("Co Loi");
    // }
?>