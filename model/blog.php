<?php
    function select_all_blog(){
        $sql = "SELECT * FROM news";
        $news = pdo_query($sql) ;
        return $news;
    }
?>