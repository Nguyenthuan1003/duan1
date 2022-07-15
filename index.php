<?php
    session_start();
    include './header.php';
    if(isset($_GET[''])){
        switch ($_GET['']){
            case '':
                break;
            default:
                include './main.php';
        }
    }else{
        include './main.php';
    }
    include './footer.php';
?>