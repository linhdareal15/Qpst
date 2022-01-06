<?php 
session_start();
require_once('db/dbhelper.php');
    if(isset($_GET['action']) && $_GET['action']=="add"){ 
        $id=intval($_GET['id']); 
        if(isset($_SESSION['cart'][$id]) && $_SESSION['cart'][$id]['id']==$id){ 
              
            $_SESSION['cart'][$id]['quantity']+=1; 
            header("Location: shop.php");
        }else{ 
            $sql_s="select * FROM `product` WHERE id=".$id; 
            $query_s=mysqli_query($conn,$sql_s); 
            if(mysqli_num_rows($query_s)!=0){ 
                $row_s=mysqli_fetch_array($query_s); 
                  
                $_SESSION['cart'][$row_s['id']]=array( 
                        "id" => $row_s['id'],
                        "image_url" => $row_s['image_url'],
                        "name" => $row_s['name'],
                        "quantity" => 1, 
                        "price" => $row_s['price'] 
                    );
               header("Location: shop.php");
                    
            }else{ 
                $message="This product id it's invalid!";    
                print_r($message);
            }   
        } 
    } 
?>