<?php
    try {
        $conn = new PDO('mysql: host=localhost;dbname=duan1team4;charset=utf8','root','');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
?>