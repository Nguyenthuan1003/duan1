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

     function insert_order($name_order,$address,$created_date_order,$name_voucher,$total_price,$phone,$email,$id_user)
     {
         $sql = "INSERT INTO orders (`name_order`,`address_order`,`created_date_order`,`name_voucher`,`total_price`,`sdt`,`email`,`id_user`) value 
         ('$name_order','$address','$created_date_order','$name_voucher','$total_price','$phone','$email','$id_user')";
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


?>