<?php
    function select_one_user($email,$password){
        $sql="SELECT * FROM user where 1";
        if(($email != '')&&($password != '')){
            $sql.= " AND email = '$email'AND password = '$password'";
        }
        $user = pdo_query_one($sql);
        return $user;
    }
    
    function insert_user($name,$email,$parrword,$createDate){
        // if($fullName != "" && $phone != "" && $role != ""){
           
        // }else{
            $sql="INSERT INTO `user`(`user_name`,`email`,`password`, `created_date_user`) VALUES('$name','$email','$parrword','$createDate')";
        // }
        pdo_execute($sql);
    }
    function select_all(){
        $sql="SELECT * FROM user";
        return pdo_query($sql);
    }
    function delete_user($id){
        $sql="DELETE FROm user WHERE id_user=".$id;
        pdo_execute($sql);
    }
    function edit_user($name,$full_name,$email,$sdt,$parrword,$accont_balance,$role,$created_data_user,$id){
        $sql="UPDATE `user` SET `user_name`='$name',`full_name`='$full_name',`email`='$email',
        `sdt`='$sdt',`password`='$parrword',`accont_balance`='$accont_balance',`role`='$role',`created_date_user`='$created_data_user' WHERE id_user='$id'";
        pdo_execute($sql);

    }
    function insert_user_ad($name,$email,$parrword,$fullName,$phone,$role,$createDate){
        $sql = "INSERT INTO `user`(`user_name`, `full_name`, `email`, `sdt`, `password`, `accont_balance`, `role`, `created_date_user`) 
        VALUES ('$name', $fullName', '$email', '$phone','$parrword', '$role', '$createDate')";
        pdo_execute($sql);
    }

   
?>