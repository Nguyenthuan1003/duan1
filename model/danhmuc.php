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
    function select_one_dm($id){
        $sql = "SELECT * FROM `categories` WHERE id_cate=".$id;
        return pdo_query_one($sql);
    }
    function update_dm($name,$id){
        $sql = "UPDATE `categories` SET `cate_name`='".$name."' WHERE id_cate=".$id;
        pdo_execute($sql);
    }
    function delete_dm($id){
        $sql = "DELETE FROM `categories` WHERE id_cate=".$id;
        pdo_execute($sql);
    }
?>