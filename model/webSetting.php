<?php
    function select_all_websetting(){
        $sql = "SELECT * FROM `websetting`";
        $wst = pdo_query($sql);
        return $wst;
    }
?>