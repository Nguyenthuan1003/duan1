<?php 

     function get_all_order(){
         $sql = "SELECT * FROM orders";
         return pdo_query($sql);
     }
     ;
     function get_all_order_with_id_user($id_user){
        $sql = "SELECT * FROM orders where id_user='".$id_user."'";
        return pdo_query($sql);
    }
    ;
     function get_all_order_details($id){
        $sql = "SELECT * FROM order_details where id_order='".$id."'";
        return pdo_query($sql);
    }
    ;
    function delete_order($id){
        $sql  = "DELETE FROM `orders` WHERE id_order=".$id;
        pdo_execute($sql);
    };
    function delete_order_details($id){
        $sql  = "DELETE FROM `order_details` WHERE id_order=".$id;
        pdo_execute($sql);
    };

     function insert_order($name_order,$address,$created_date_order,$status_order,$name_voucher,$total_price,$phone,$email,$id_user)
     {
         $sql = "INSERT INTO orders (`name_order`,`address_order`,`created_date_order`,`status_order`,`name_voucher`,`total_price`,`sdt`,`email`,`id_user`) value 
         ('$name_order','$address','$created_date_order','$status_order','$name_voucher','$total_price','$phone','$email','$id_user')";
         return pdo_execute($sql);
     };
     function select_one_order($email,$date)
     {
         $sql = "SELECT * FROM orders WHERE  email='".$email."' AND created_date_order='".$date."' ORDER BY id_order DESC ";
         return pdo_query_one($sql);
     };
     function select_one_order_id($id)
     {
         $sql = "SELECT * FROM orders WHERE  id_order='".$id."' ";
         return pdo_query_one($sql);
     };
     function insert_order_details($id_order,$id_pro,$quantity_order,$price_order,$unit_price,$id_var)
     {
         $sql = "INSERT INTO order_details (`id_order`,`id_pro`,`quantity_order`,`price_order`,`unit_price`,`id_variant`) value ('$id_order','$id_pro','$quantity_order','$price_order','$unit_price','$id_var')";
         return pdo_execute($sql);
     };
     function select_all_od(){
        $sql = "SELECT * FROM `order_details` as od JOIN orders as o ON od.id_order = o.id_order JOIN products as p ON od.id_pro = p.id_pro JOIN variant as v ON od.id_variant = v.id_variant";
        return pdo_query($sql);
     }
     function select_one_od($id){
        $sql = "SELECT * FROM `orders` WHERE id_order=".$id;
        return pdo_query_one($sql);
     }
    function edit_od($id,$name,$address,$status){
        $sql = "UPDATE `orders` SET `name_order`='".$name."',`address_order`='".$address."'
        ,`status_order`=".$status." WHERE id_order=".$id;
        pdo_execute($sql);
    }
    function delete_od($id,$id_var){
        $sql = "DELETE FROM `order_details` WHERE id_order=".$id." AND id_variant=".$id_var;
        pdo_execute($sql);
        $sql = "SELECT count(id_order) as od FROM `order_details` WHERE id_order=".$id;
        $c = pdo_query_value($sql);
        foreach ($c as $c){
            $d = $c;
        }
        echo $d;
        if($d < 1){
            $sql = "DELETE FROM `orders` WHERE id_order=".$id;
            pdo_execute($sql);
        }
    }

?>