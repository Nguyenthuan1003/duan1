<?php 
    function get_all_voucher(){
        $sql = "SELECT * FROM e_vorcher ";
        return pdo_query($sql);
    }
    function insert_vorcher($name,$quantity,$date,$value){
        $sql = "INSERT INTO `e_vorcher`(`name_vorcher`, `quantity_limit`, `expiration_date`, `coupon_value`) 
        VALUES ('".$name."',".$quantity.",'".$date."',".$value.")";
        pdo_execute($sql);
    }
    function get_vorcher_id($id){
        $sql = "SELECT * FROM e_vorcher WHERE id_vorcher=".$id;
        return pdo_query_one($sql);
    }
    function update_vorcher($name,$quantity,$date,$value,$id){
        $sql = "UPDATE `e_vorcher` SET `name_vorcher`='".$name."',`quantity_limit`=".$quantity."
        ,`expiration_date`='".$date."',`coupon_value`=".$value." WHERE id_vorcher=".$id;
        pdo_execute($sql);
    }
    function delete_vorcher($id){
        $sql = "DELETE FROM `e_vorcher` WHERE id_vorcher=".$id;
        pdo_execute($sql);
    }
?>