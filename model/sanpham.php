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
    function load_one_pro($id){
        $sql = "SELECT * FROM products WHERE id_pro=".$id;
        return pdo_query_one($sql);
    }
    function insert_pro($name, $price, $status, $category, $date, $des_pro, $targets){
        $sql = "INSERT INTO `products`(`pro_name`, `created_date`, `description`, `status`, `id_cate`, `price_default`, `images_default`)
         VALUES ('$name','$date', '$des_pro', '$status', '$category', '$price', '$targets')";
        pdo_execute($sql);
    }
    function select_pro_name($name){
        $sql = "SELECT * FROM `products` WHERE pro_name='$name'";
        // $sql = "SELECT * FROM `products` WHERE pro_name='aaa'";
        return pdo_query_one($sql);
    }
    function select_all_pro(){
        $sql = "SELECT * FROM `products`";
        return pdo_query($sql);
    }
    function update_pro($name,$created_date,$description,$status,$id_cate,$price_default,$images_default,$id){
        if($images_default == '' && $created_date == ''){
            $sql = "UPDATE `products` SET `pro_name`='".$name."',
            `description`='".$description."',`status`='".$status."',`id_cate`='".$id_cate."',
            `price_default`='".$price_default."' WHERE id_pro=".$id;
        }
        else if($images_default == ''){
            $sql = "UPDATE `products` SET `pro_name`='".$name."',`created_date`='".$created_date."',
            `description`='".$description."',`status`='".$status."',`id_cate`='".$id_cate."',
            `price_default`='".$price_default."' WHERE id_pro=".$id;
        }
        else if($created_date == ''){
            $sql = "UPDATE `products` SET `pro_name`='".$name."',
            `description`='".$description."',`status`='".$status."',`id_cate`='".$id_cate."',
            `price_default`='".$price_default."',`images_default`='".$images_default."' WHERE id_pro=".$id;
        }else{
            $sql = "UPDATE `products` SET `pro_name`='".$name."',`created_date`='".$created_date."',
            `description`='".$description."',`status`='".$status."',`id_cate`='".$id_cate."',
            `price_default`='".$price_default."',`images_default`='".$images_default."' WHERE id_pro=".$id;
        }
        pdo_execute($sql);
    }
    function delete_pro($id){
        $sql  = "DELETE FROM `products` WHERE id_pro=".$id;
        pdo_execute($sql);
    }
    function select_all_pro_var(){
        $sql = "SELECT * FROM `products_attribute` as p JOIN products as pr ON p.id_pro = pr.id_pro 
        JOIN variant as v ON v.id_variant = p.id_variant";
        return pdo_query($sql);
    }
    function select_one_var($id,$id_var){
        $sql = "SELECT * FROM `products_attribute` WHERE id_pro='".$id."' AND id_variant='".$id_var."'";
        // echo $sql;die;
        return pdo_query_one($sql);
    }
    function update_pro_var($id_pro,$id_var,$quantity,$price,$sale,$spec){
        $sql = "UPDATE `products_attribute` SET 
        `quantity`='".$quantity."',`price`='".$price."',`sale`='".$sale."',
        `special_features`='".$spec."' WHERE id_pro='".$id_pro."' AND id_variant=".$id_var;
        pdo_execute($sql);
    }
    function update_img_var($id_pro,$id_var,$image){
        $sql = "UPDATE `images_products_attribute` SET
        `images_pro_attri`='".$image."' WHERE id_pro='".$id_pro."' AND id_variant=".$id_var;
        pdo_execute($sql);
    }
    function delete_pro_var($p,$v){
        $sql = "DELETE FROM `images_products_attribute` WHERE id_pro='".$p."' AND id_variant=".$v;
        pdo_execute($sql);
        $sql = "DELETE FROM `products_attribute` WHERE id_pro='".$p."' AND id_variant=".$v;
        pdo_execute($sql);
    }
    function select_sp($keyword,$iddm){
        $sql = "SELECT * FROM products where 1";
        if($keyword!=""){
            $sql.=" and pro_name like '%".$keyword."%'";
        }
        if($iddm > 0){
            $sql.=" and id_cate='".$iddm."'";
        }
        
        $sql.=" ORDER BY id_pro DESC";
        return pdo_query($sql);
    }
?>