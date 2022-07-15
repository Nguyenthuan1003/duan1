<?php
    function select_all_dm(){
        $sql = "SELECT * FROM categories";
        $Categories = pdo_query($sql) ;
        return $Categories;
    }
?>