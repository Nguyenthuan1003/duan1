<?php
    function select_all_dm(){
        $sql = "SELECT * FROM categories";
        $Categories = pdo_query($sql) ;
        return $Categories;
    }
    function insert_cate($cate_name){
        $sql = "INSERT INTO `categories`(`cate_name`) VALUES ('$cate_name')";
        pdo_execute($sql);
    }
?>