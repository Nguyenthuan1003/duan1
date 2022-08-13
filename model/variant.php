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
    function insert_variant_pro($pro,$var,$quantity,$price,$sale){
        $sql = "INSERT INTO `products_attribute`(`id_pro`, `id_variant`, `quantity`, `price`, `sale`) 
        VALUES('$pro','$var','$quantity','$price','$sale')";
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
    function select_version_variant($id_pro){
        $sql = "SELECT * FROM products_attribute p JOIN variant v ON p.id_variant = v.id_variant JOIN images_products_attribute i ON i.id_variant = v.id_variant WHERE p.id_pro='".$id_pro."' GROUP BY v.version_variant ORDER BY i.id_image_pro_attr;" ;
        return pdo_query($sql);
    }
    function select_color_variant($id_pro){
        $sql = "SELECT * FROM products_attribute p JOIN variant v ON p.id_variant = v.id_variant JOIN images_products_attribute i ON i.id_variant = v.id_variant WHERE p.id_pro='".$id_pro."' GROUP BY v.color_variant ORDER BY i.id_image_pro_attr; " ;
        return pdo_query($sql);
    }
    function select_pro_with_idpro_and_version_and_color_variant($id_pro,$version,$color){
        $sql = "SELECT * FROM products_attribute p JOIN variant v ON p.id_variant = v.id_variant JOIN images_products_attribute i ON i.id_variant = v.id_variant WHERE p.id_pro='".$id_pro."' AND v.version_variant='".$version."' AND v.color_variant='".$color."' ORDER BY i.id_image_pro_attr" ;
        return pdo_query($sql);
    }
    function select_id_variant_with_id_pro($id_pro)
    {
        $sql = "SELECT * FROM images_products_attribute WHERE id_pro='".$id_pro."' ORDER BY id_image_pro_attr LIMIT 1";
        return pdo_query($sql);
    }
    function select_img_variant_with_id_variant($id_pro,$id_var)
    {
        $sql = "SELECT * FROM products_attribute p JOIN variant v ON p.id_variant = v.id_variant JOIN images_products_attribute i ON i.id_variant = v.id_variant WHERE p.id_pro='".$id_pro."' AND p.id_variant='".$id_var."' ORDER BY i.id_image_pro_attr";
        return pdo_query($sql);
    }
    function select_all_product_atrri(){
        $sql = "SELECT * FROM products_attribute p JOIN variant v ON p.id_variant = v.id_variant JOIN images_products_attribute i ON i.id_variant = v.id_variant JOIN products pr ON p.id_pro = pr.id_pro GROUP BY p.id_pro , p.id_variant ORDER BY i.id_image_pro_attr" ;
        return pdo_query($sql);
    }
?>