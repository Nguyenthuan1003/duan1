<?php
    include '../../model/PDO.php';
    include  '../../model/users.php';
    include './header.php';
    if(isset($_GET['id_menu'])){
        $id_menu=$_GET['id_menu'];
        switch ($id_menu) {
            case 'user':
                $user=select_all();
                include 'user/list_client.php';
                break;
            case 'add_user':
                    if(isset($_POST['add_khach_hang']))
                    { 
                        $fullname = $_POST['fullname_user'] ;
                        $useName = $_POST['name-login'] ;
                        $email_user = $_POST['email_user'] ;
                        $phone =  $_POST['phone'] ;
                        $password = $_POST['password'] ;
                        $role =  $_POST['role'] ;
                        $created_date_user = $_POST['created_date_user'] ;
                        $_err_add_khach_hang = [];
                        if($fullname == ""){
                            $_err_add_khach_hang['fullname_user'] = "bạn chưa nhập họ tên khách hàng";
                        };

                        if($useName == ""){
                            $_err_add_khach_hang['name-login'] = "bạn chưa nhập tên đăng nhập của khách hàng";
                        };

                        $user=select_all();
                        foreach($user as $users){
                            if( $users['user_name'] == $useName){
                                $_err_add_khach_hang['name-login'] = "tên user đã tồn tại";
                            }

                        };
                        // check tồn tại user name 

                        if($email_user == ""){
                            $_err_add_khach_hang['email_user'] = "bạn chưa nhập email của khách hàng";
                        }
                        else if(!filter_var($email_user, FILTER_VALIDATE_EMAIL))
                        {
                            $_err_add_khach_hang['email_user'] = "bạn chưa nhập đúng định dạng email của khách hàng";
                        }
                        
                        ;


                        if($phone == ""){
                            $_err_add_khach_hang['phone'] = "bạn chưa nhập số điện thoại của khách hàng";
                        };
                        foreach($user as $users){
                            if( $users['sdt'] == $phone){
                                $_err_add_khach_hang['name-login'] = "tên user đã tồn tại";
                            }

                        };
                        
                        if($password == ""){
                            $_err_add_khach_hang['password'] = "bạn chưa nhập mật khẩu của khách hàng";
                        } else if ( strlen($password) < 8)
                        {
                            $_err_add_khach_hang['password'] = "mật khẩu phải lớn hơn 8 ký tự ";
                        } ;

                        if($role == ""){
                            $_err_add_khach_hang['role'] = "bạn chưa nhập vai trò của khách hàng";
                        };
                        if($created_date_user == ""){
                            $_err_add_khach_hang['created_date_user'] = "bạn chưa nhập ngày đăng ký";
                        };
                        
                        

                        if(!array_filter($_err_add_khach_hang))
                        {
                            insert_user_ad($useName,$email_user,$password,$fullname,$phone,$role,$created_date_user) ;
                            $mesages = "thêm khách hàng thành công" ;    
                        }
                    }
                    include 'user/add_client.php';
                    break;
            
            default:
                # code...
                break;
        }
    }else{
        include 'main.php';
    }
    include './footer.php';


?>