<?php
    function select_add_websetting(){
        $sql = "SELECT * FROM websetting";
        $wst = pdo_query($sql);
        return $wst;
    }
?>