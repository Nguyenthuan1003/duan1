<?php
    function insert_wishlist($pro,$user,$variant){
        $sql = "INSERT INTO `wishlist`(`id_pro`, `id_user`, `id_variant`) VALUES ('".$pro."','".$user."','".$variant."')";
        pdo_execute($sql);
    }
    function select_all_wishlist($id){
        $sql = "SELECT * FROM `wishlist` as w JOIN products as p ON w.id_pro = p.id_pro 
        JOIN variant as v ON w.id_variant = v.id_variant WHERE id_user=".$id;
        return pdo_query($sql);
    }
    function delete_wishlish($id){
        $sql = "DELETE FROM `wishlist` WHERE id_wishlist=".$id;
        pdo_execute($sql);
    }
?>