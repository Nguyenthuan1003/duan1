<?php
    function insert_variant($name, $image){
        $sql = "INSERT INTO `variant`(`color_variant`, `version_variant`) 
        VALUES ('$name', '$image')";
        // echo $sql;die;
        pdo_execute($sql);
    }
    function select_all_variant(){
        $sql = "SELECT * FROM `variant`";
        return pdo_query($sql);
    }
    function insert_img_var($id_pro,$id_var,$img){
        $sql = "INSERT INTO `images_products_attribute`(`id_pro`, `id_variant`, `images_pro_attri`) 
        VALUES('$id_pro', '$id_var', '$img')";
        pdo_execute($sql);
    }
    function insert_variant_pro($pro,$var,$quantity,$price,$sale,$special){
        $sql = "INSERT INTO `products_attribute`(`id_pro`, `id_variant`, `quantity`, `price`, `sale`, `special_features`) 
        VALUES('$pro','$var','$quantity','$price','$sale','$special')";
        pdo_execute($sql);
    }
    function select_one_variant($id){
        $sql = "SELECT * FROM variant WHERE id_variant=".$id;
        return pdo_query_one($sql);
    }
    function update_variant($id,$color,$version){
        $sql = "UPDATE `variant` SET `color_variant`='".$color."',`version_variant`='".$version."' WHERE id_variant=".$id;
        pdo_execute($sql);
    }
    function delete_variant($id){
        $sql = "DELETE FROM variant WHERE id_variant=".$id;
        pdo_execute($sql);
    }
?>