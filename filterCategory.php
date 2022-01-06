<?php
session_start();
$sub_category_id = $_GET['sub_category_id'];
require_once('db/dbhelper.php');
$sql = "select product.* from product inner join sub_category on product.sub_category_id =sub_category.id WHERE sub_category.id=" . $sub_category_id;
$result = executeResult($sql);

// $product;
// var_dump($result);
if (!empty($result)) {
    $_SESSION['product']=$result;
    // if($sub_category_id==1){
    //     $_SESSION['cate_name']="BÁN TẢI";
    // }elseif($sub_category_id==2){
    //     $_SESSION['cate_name']="5-7 CHỖ";
    // }else{
    //     $_SESSION['cate_name']="TẢI CHỞ HÀNG";
    // }
    header('Location: shop.php?filter=1');
}else{
    $_SESSION['message']="KHONG CO SAN PHAM NAO";
    print_r($_SESSION['message']);
}