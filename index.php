<?php
    session_start();
    include './header.php';
    include './model/PDO.php';
    include './model/danhmuc.php';
    include './model/sanpham.php';
    $CategoriesHome = select_all_dm();
    $ProductsHome = select_all_Pro();
    if(isset($_GET[''])){
        switch ($_GET['']){
            case '':
                break;
            default:
                include './main.php';
        }
    }else{
        include './main.php';
    }
    include './footer.php';
    
?>