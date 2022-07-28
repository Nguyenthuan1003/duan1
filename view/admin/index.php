<?php
    include_once '../../model/PDO.php';
    include_once '../../model/users.php';
    include_once './header.php';
    if(isset($_GET['menu'])){
        $id_menu=$_GET['menu'];
        switch ($id_menu) {
            case 'user':
                $user=select_all();
                include_once './user/list_client.php';
                break;
            
            default:
                # code...
                break;
        }
    }else{
        include_once 'main.php';
    }
    include_once './footer.php';


?>