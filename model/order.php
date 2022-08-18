<?php
function select_all_order(){
    $sql="SELECT * FROM `orders`";
    return pdo_query($sql);
    
}
?>