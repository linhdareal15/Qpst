<?php
    session_start();
    require_once('db/dbhelper.php');
    if(isset($_GET["action"]) && $_GET['action']=='remove' && isset($_GET['id'])){
        $id=$_GET['id'];
        unset($_SESSION['cart'][$id]);
        header("Location: cart.php");
    }

    if(isset($_GET["action"]) && $_GET['action']=='removeProduct' && isset($_GET['id'])){
        $id=$_GET['id'];
        $sqlDeleteImage='DELETE FROM `image` WHERE product_id='.$id;
        execute($sqlDeleteImage);
        $sqlRemoveProduct='DELETE FROM `product` WHERE id='.$id;
        execute($sqlRemoveProduct);
        header("location: ManagerProduct.php");
    }