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
        $note = $_POST['note'];
    }
    $sqlTotal = " select COUNT(id)  FROM shipping";
    $totalShippingId=executeResult($sqlTotal, true);
    $ShippingId=$totalShippingId['COUNT(id)'];
    $sqlShipping= 'insert INTO `shipping` (`id`, `name`, `phone`, `address`) VALUES ('.++$ShippingId.'," '.$name.'", "'.$phone.'", "'.$address.'")';
    print_r($sqlShipping);
    execute($sqlShipping);
    

    //add to order
    $status=1;
    $date=date('Y-m-d');
    $sqlTotalOrder= " select COUNT(id)  FROM `order`";
    $ok=executeResult($sqlTotalOrder, true);
    $idOrder=$ok['COUNT(id)'] +1;
    $sqlOrder='insert INTO `order`(`id`, `Customer`, `shipping_id`, `create_date`, `total_price`, `note`, `status`) VALUES ('.$idOrder.',"'.$name.'", '.
    $ShippingId.', "'.$date. '", '.$tong.', "'.$note.'", '.$status.')';
    execute($sqlOrder);
    

    //add to order detail
    $sqlTotalOrderDetail=" select COUNT(id)  FROM `order_detail`";
    $ok1=executeResult($sqlTotalOrderDetail, true);
    $idOrderDetail=$ok['COUNT(id)']+1;
    foreach($product as $item){
        
        $sqlOrderDetail='insert INTO `order_detail`(`id`, `order_id`, `product_id`, `product_name`, `product_price`, `quantity`, `product_image`) 
        VALUES ('.$idOrderDetail.', '.$idOrder.', '.$item['id'].', "'.$item['name'].'", '.$item['price'].', '.$item['price'].', "'.$item['image_url'].'")';
        // print_r($sqlOrderDetail);
        print_r("</br>");
        print_r("</br>");
        if ($conn->query($sqlOrderDetail) === TRUE) {
            ++$idOrderDetail;
            echo "New record created successfully";
          } else {
            echo "Error: " . $sqlOrderDetail . "<br>" . $conn->error;
          }
          
        //   $conn->close();
    }
?>