<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
              integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="icon" href="img/logo.png" />
        <link rel="stylesheet" href="css/NavbarCSS.css"> 
        <!-- <link rel="stylesheet" href="css/CartDetail.css">  -->
        <link rel="stylesheet" href="css/styleALL.css"> 
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- <link rel="stylesheet" href="static/css/main.css"> -->
        <title>ThankYou for Shopping</title>
    </head>

    <body>
        <?php
            include_once('layout/header.php');
        ?>
        <div class="container" style="margin-top: 7rem">
            <div class="alert alert-success" role="alert">
                THANK YOU FOR SHOPPING WITH US
            </div>
            <div><a href="shop.php" class="btn btn-outline-success">BACK TO SHOP</a></div>
        </div>

        <?php
            include_once('layout/footer.php');
    
        ?>
        <script src="js/navbar.js"></script>
    </body>

</html>