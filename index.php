<?php
    session_start();
    include './model/webSetting.php';
    $wst = select_add_websetting();
    include './header.php';
    include './model/PDO.php';
    include './model/danhmuc.php';
    include './model/sanpham.php';
    $CategoriesHome = select_all_dm();
    $ProductsHome = select_page_home();
    $Curent_Page = 1 ;
    $sql = "SELECT count(id_pro) as sl_sp FROM products" ;
    $Total_Sp = pdo_query_one($sql);
     // tổng sản phẩm trong bảng sản phẩm 
     $Total_Product_On_Page = 12;
     // số lượng sản phẩm trên page
     $Total_Page = ceil($Total_Sp['sl_sp']/$Total_Product_On_Page) ;
     // tổng lượng page sản phẩm hiển thị lên website 
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