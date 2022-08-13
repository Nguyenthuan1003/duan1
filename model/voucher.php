<?php 

     function get_all_voucher(){
         $sql = "SELECT * FROM e_vorcher ";
         return pdo_query($sql);
     }
     


?>