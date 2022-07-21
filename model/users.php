<?php
    function select_one_user($email,$password){
        $sql="SELECT * FROM user where 1";
        if(($email != '')&&($password != '')){
            $sql.= " AND email = '$email'AND password = '$password'";
        }
        $user = pdo_query_one($sql);
        return $user;
    }
    function insert_user($name,$email,$parrword){
        $sql="INSERT INTO `user`(`user_name`,`email`,`password`) VALUES('$name','$email','$parrword')";
        pdo_execute($sql);
    }
    

   
?>