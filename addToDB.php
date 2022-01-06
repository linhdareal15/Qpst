<?php
    session_start();
    require_once('db/dbhelper.php');
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
    $sqlTotal = " select COUNT(id)  FROM shipping";
    $totalShippingId=executeResult($sqlTotal, true);
    $sqlShipping= 'insert INTO `shipping` (`id`, `name`, `phone`, `address`) VALUES ('.$totalShippingId.', '.$name.', '.$phone.', '.$address;
    $sqlShipping+=")";
    $a="adsads";
    print_r($a);
    execute($sqlShipping);

?>