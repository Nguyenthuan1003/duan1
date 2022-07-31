<?php
    include_once '../../model/PDO.php';
    include_once '../../model/users.php';
    include_once '../../model/danhmuc.php';
    include_once '../../model/sanpham.php';
    include_once '../../model/variant.php';
    include_once './header.php';
    if(isset($_GET['id_menu'])){
        $id_menu=$_GET['id_menu'];
        switch ($id_menu) {
            case 'user':
                $user=select_all();
                include 'user/list_client.php';
                break;
            case 'product':
                $cate = select_all_dm();
                if(isset($_POST['add_pro']) && $_POST['add_pro']){
                    $name = $_POST['name_pro'];
                    $price = $_POST['price_pro'];
                    $status = $_POST['status_pro'];
                    $category = $_POST['category_pro'];
                    $date = $_POST['date_pro'];
                    $image = $_FILES["image_pro"];
                    $des_pro = $_POST['des_pro'];
                    $dir = '../../upload/';
                    $targets =  $dir.$image['name'];
                    $imgs = ['jpg','jpeg','png'];
                    $pro_one = select_pro_name($name);
                    $path = pathinfo($image['name'],PATHINFO_EXTENSION);
                    $er = [];
                    if(is_array($pro_one)){
                        $er['pro'] = $name.' đã tồn tại';
                    }
                    if(!preg_match('/^[A-Z][\w\s][^_]+$/', $name)){
                        $er['name'] = $name.' tên sản phẩm Không hợp lệ';
                    }
                    if(!preg_match('/^[\d]+$/', $price) || $price < 0){
                        $er['price'] = $price. ' giá vừa nhập không hợp lệ';
                    }
                    if(!preg_match('/^[\d]{1}$/', $status)){
                        $er['status'] = $status . ' trạng thái không hợp lệ';
                    }
                    if(!preg_match('/^[\d]{1,}$/', $category)){
                        $er['category'] = $category. ' danh mục không hợp lệ';
                    }
                    if(!preg_match('/^20[\d]{2}[-][\d]{2}[-][\d]{2}$/', $date)){
                        $er['date'] = $date. ' ngày tháng năm không hợp lệ';
                    }
                    if($image['size'] <= 0){
                        $er['img'] = ' Yêu cầu nhập ảnh';
                    }
                    if($image['size'] > 0){
                        if(!in_array(strtolower($path),$imgs)){
                            $er['img'] = ' Ảnh vừa nhập không đúng định dạng jpg, jpeg hoặc png';
                        }
                        move_uploaded_file($image['tmp_name'],$targets);
                    }
                    if(!array_filter($er)){
                        insert_pro($name, $price, $status, $category, $date, $des_pro, $targets);
                        $message = 'Sản phẩm đã được thêm mới';
                    }
                }
                include_once './product/add.php';
                break;
            case 'add_cate':
                if(isset($_POST['add_cate']) && $_POST['add_cate']){
                    $cate_name = $_POST['cate_name'];
                    $er = [];
                    if(!preg_match('/^[A-Z][\w\s][^0-9_\s]+$/', $cate_name)){
                        $er['name'] = 'Tên danh mục không hợp lệ';
                    }
                    if(!array_filter($er)){
                        insert_cate($cate_name);
                        $message = 'Danh mục đã được thêm mới';
                    }
                }
                include_once './categories/add.php';
                break;
            case 'type':
                $cate = select_all_dm();
                    include_once './categories/list.php';
                break;
            case 'variant':
                if(isset($_POST['add_variant']) && $_POST['add_variant']){
                    $name = $_POST['name_variant'];
                    $image = $_FILES["image_variant"];
                    $dir = '../../upload/';
                    $targets =  $dir.$image['name'];
                    $imgs = ['jpg','jpeg','png'];
                    $path = pathinfo($image['name'],PATHINFO_EXTENSION);
                    $er = [];
                    if(!preg_match('/^[A-Z][\w\s][^0-9_]+$/', $name)){
                        $er['name'] = 'Tên biến thể không hợp lệ';
                    }
                    if($image['size'] <= 0){
                        $er['img'] = ' Yêu cầu nhập ảnh';
                    }
                    if($image['size'] > 0){
                        if(!in_array(strtolower($path),$imgs)){
                            $er['img'] = ' Ảnh vừa nhập không đúng định dạng jpg, jpeg hoặc png';
                        }
                        move_uploaded_file($image['tmp_name'], $targets);
                    }
                    if(!array_filter($er)){
                        insert_variant($name, $targets);
                        $message = "Biến thể đã được thêm mới";
                    }
                }
                include_once './variant/add.php';
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
                    include_once './user/add_client.php';
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