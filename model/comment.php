<?php
    function insert_bl($noidung,$ma_hh,$ma_kh,$ngay_bl){
        $sql="INSERT INTO `comment`( `id_pro`, `id_user`, `created_date_comment`, `description_comment`) 
        VALUES('$ma_hh','$ma_kh','$ngay_bl','$noidung')";
        pdo_execute($sql);
    }
    function select_bl($id){
        $sql = "SELECT * FROM comment LEFT JOIN user ON comment.id_user=user.id_user";
        if($id > 0){
            $sql.=" JOIN products as p ON p.id_pro = comment.id_pro WHERE comment.id_pro='".$id."'";
        }
        $sql.=" ORDER BY id_comment ASC";
        $listbl = pdo_query($sql);
        return $listbl;
    }
    function delete_bl($id){
        $sql = "DELETE FROM `comment` WHERE id_comment=".$id;
        pdo_execute($sql);
    }
    function synthetic_bl(){
        $sql = "SELECT p.pro_name, count(c.id_comment) as sobl, min(c.created_date_comment) as minbl, max(c.created_date_comment) as maxbl,p.id_pro
        FROM products as p RIGHT JOIN comment AS c ON p.id_pro = c.id_pro GROUP BY p.id_pro ORDER BY p.id_pro DESC";
        return pdo_query($sql);
    }
?>