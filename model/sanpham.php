<?php
    function select_page_home(){
        $sql = "SELECT count(id_pro) as sl_sp FROM products" ;
        $Total_Sp = pdo_query_one($sql);
        // tổng sản phẩm trong bảng sản phẩm 
        $Total_Product_On_Page = 12;
        // số lượng sản phẩm trên page
        $Total_Page = ceil($Total_Sp['sl_sp']/$Total_Product_On_Page) ;
        // tổng lượng page sản phẩm hiển thị lên website 

    

        $Curent_Page = 1 ;
        // page hiện tại 

        if(isset($_GET['curent_page'])){
        $Curent_Page = $_GET['curent_page'];
        }
        else { $Curent_Page = 1 ;} ;
        // bắt sự kiện next trang 

        $Limit_Start = ($Total_Product_On_Page - 1)*($Curent_Page-1) ;

        // lấy sản phẩm bắt đầu từ $limit_start 

    
        $sql = "SELECT * FROM products LIMIT $Limit_Start,$Total_Product_On_Page";
        $Products = pdo_query($sql) ;
        return $Products;
    }
?>