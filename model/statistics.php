<?php
    function Statistics_cate_pro($date){
        if ($date == "") {
            $sql = "SELECT c.id_cate, c.cate_name, COUNT(p.id_pro) AS dem, min(p.price_default) AS nho,
            MAX(p.price_default) AS lon, AVG(p.price_default) AS tb,MIN(p.created_date) as nnb, 
            MAX(p.created_date) nnx FROM `categories` as c JOIN products AS p ON c.id_cate = p.id_cate GROUP BY c.id_cate"; 
        }else{
            $sql = "SELECT c.id_cate, c.cate_name, COUNT(p.id_pro) AS dem, min(p.price_default) AS nho,
            MAX(p.price_default) AS lon, AVG(p.price_default) AS tb,MIN(p.created_date) as nnb, 
            MAX(p.created_date) nnx FROM `categories` as c JOIN products AS p ON c.id_cate = p.id_cate 
            WHERE p.created_date LIKE '%".$date."%' GROUP BY c.id_cate";
        }
         return pdo_query($sql);
    }
    function statistics_user($date){
        if($date != ''){
            $sql = "SELECT COUNT(id_user) as sums, created_date_user FROM `user` WHERE created_date_user 
            LIKE '%".$date."%' GROUP BY created_date_user";
        }else{
            $sql = "SELECT COUNT(id_user) as sums, created_date_user FROM `user` WHERE 1 GROUP BY created_date_user";
        }
        return pdo_query($sql);
    }
?>