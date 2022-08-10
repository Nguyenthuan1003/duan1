<?php
    function insert_bl($noidung,$ma_hh,$ma_kh,$ngay_bl){
        $sql="INSERT INTO `comment`( `id_pro`, `id_user`, `created_date_comment`, `description_comment`) 
        VALUES('$ma_hh','$ma_kh','$ngay_bl','$noidung')";
        pdo_execute($sql);
    }
    function select_bl($id){
        $sql = "SELECT * FROM comment LEFT JOIN user ON comment.id_user=user.id_user";
        if($id > 0){
            $sql.=" WHERE id_pro='".$id."'";
        }
        $sql.=" ORDER BY id_comment ASC";
        $listbl = pdo_query($sql);
        return $listbl;
    }
    function delete_bl($id){
        $sql = "DELETE FROM binhluan WHERE ma_bl=".$id;
        pdo_execute($sql);
    }
    function synthetic_bl(){
        $sql = "SELECT hanghoa.ten_hh, count(binhluan.ma_hh) as sobl, min(binhluan.ngay_bl) as minbl, max(binhluan.ngay_bl) as maxbl,hanghoa.ma_hh
        FROM hanghoa RIGHT JOIN binhluan ON hanghoa.ma_hh=binhluan.ma_hh GROUP BY hanghoa.ma_hh ORDER BY hanghoa.ma_hh DESC";
        $sum = pdo_query($sql);
        return $sum;
    }
?>