<?php
    function insert_variant($name, $image){
        $sql = "INSERT INTO `variant`(`name_variant`, `images_variant`) 
        VALUES ('$name', '$image')";
        pdo_execute($sql);
    }
?>