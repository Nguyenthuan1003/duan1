<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="./css/style_client.css">
    <link rel="stylesheet" href="./css/details_product.css">
    <meta name="viewport"
        content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=0" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
   
    
</head>
<?php 
    extract($wst);
?>
<body>
 <div class="header border w-100 m-0 px-3">
       <div class="logo">
        <a href=""><img style="width:160px" src="./upload/logo.png" alt="" class="img"></a>
       </div>
       <nav class="navbar navbar-expand-lg navbar-light">
         <div class="container-fluid">
           <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav" id="nav-bar">
                <li class="nav-item">
                  <a class="nav-link" href="index.php">HOME</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?act=blog">BLOG</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?act=introduce">GIỚI THIỆU</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?act=contact">LIÊN HỆ</a>
                </li>
             </ul>
            </div>
          </div>
        </nav>
        <div class="icon"> 
          <a href="index.php?act=cart"><i class="fa-solid fa-cart-shopping" id="icon"></i></a> 
        </div>
        <?php if(isset($_SESSION['user']) && !empty($_SESSION['user'])): ?>
          <div class="mt-3 mb-2">
            <section class="ms-2"><i class="fa fa-user"></i>
            <span><?= $_SESSION['user']['user_name'] ?></span>
           </section>
            <section>
              <a href="index.php?act=info-user" class="btn btn-outline-primary btn-sm">chi tiết tài khoản</a>
              <a href="" class="btn btn-outline-danger btn-sm">log out</a>
            </section>
          </div>
          <?php else :  ?>
       <form class="form mt-2">
          <?php if(isset($_SESSION['user'])&&is_array($_SESSION['user'])) : ?>
            <div class="user">
              <a href="index.php?act=info-user&id=<?=$_SESSION['user']['id_user']?>">
                <span class="p-2">Xin chào</span>
                <span><?=$_SESSION['user']['user_name']?></span>
              </a>
            </div>
          <?php else : ?>
          <div class="login ">  
            <a href="index.php?act=login">
              <button type="button" class="btn btn-outline-primary">Đăng nhập </button>
            </a>
          </div>
         <div class="register">
            <a href="index.php?act=registe"> <button type="button" class="btn btn-outline-danger">Đăng kí</button></a>
         </div>
         <?php endif; ?>
       </form>
       <?php endif ?>
 </div>

