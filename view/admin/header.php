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
    <link rel="stylesheet" href="../../css/style_admin.css">
</head>
<body>
<div class="header-admin">
                <div class="header-top">
                    <div class="row" id="row-header">
                        <div class="col-3">
                            <a href=""><img
                                    src="../../upload/logo.png"
                                    alt="" class="logo_img_admin"></a>
                        </div>
                        <div class="col-3"></div>
                        <div class="col-3" id="user_addmin">
                            <div class="icon_name-user d-flex">
                               

                                    <div class="user_icon_admin m-auto">
                                        <i class="fa-solid fa-user" id="user_icon_admin"></i>
                                    </div>
                            
                            </div>

                            <div class="name-user">
                                <h3 class="name_user_text"><?=$_SESSION['user']['user_name'] ?></h3>
                                <a href="" class="btn btn-danger btn-sm">đăng xuất</a>
                                <a href="../../index.php" class="btn btn-primary btn-sm ms-3">xem website</a>
                            </div>

                        </div>
                        <div class="col-3" id="icon-header">
                            <div class="search mt-4 ">
                                <input type="search" class="input_header_admin" placeholder="Tìm Kiếm ">
                                <div class="icon-search-admin">
                                    
                                </div>
                            </div>
                            <div class="icon_header_addmin ">
                                <i id="bell_addmin" class="fa-solid fa-bell"></i>
                                <i class="fa-solid fa-gear" id="setting_header_addmin"></i>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="menu-admin">
                    <ul class="meu-ul-li">
                        <li><a class="dropdown-item" href="index.php?id_menu=website">Quản Lý Website </a></li>
                        <li><a class="dropdown-item" href="index.php?id_menu=type">Quản Lý Loại Hàng </a></li>
                        <li><a class="dropdown-item" href="index.php?id_menu=product">Quản Lý Hàng Hóa </a></li>
                        <li><a class="dropdown-item" href="index.php?id_menu=user">Quản Lý Khách Hàng </a></li>
                        <li><a class="dropdown-item" href="index.php?id_menu=variant">Quản Lý Biến Thể </a></li>
                        <li><a class="dropdown-item" href="index.php?id_menu=comment">Quản Lý Bình Luận </a></li>
                        <li><a class="dropdown-item" href="index.php?id_menu=order">Quản lý đơn hàng</a></li>
                        <li><a class="dropdown-item" href="index.php?id_menu=statistic">Thống Kê </a></li>
                        <li><a class="dropdown-item" href="index.php?id_menu=vorcher">Quản Lý Vorcher </a></li>
                        <li><a class="dropdown-item" href="index.php?id_menu=order">Quản Lý Đơn Hàng </a></li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="index.php?id_menu=statistic" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Thống kê
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?id_menu=productStatistics">Thống kê hàng hóa</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="index.php?id_menu=userStatistics">Thống kê người dùng</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="commentStatistics">Thống kê bình luận</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="turnoverStatistics">Thống kê doanh thu</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="orderStatistics">Thống kê đơn hàng</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
</div>