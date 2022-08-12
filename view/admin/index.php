<?php
    include_once '../../model/PDO.php';
    include_once '../../model/users.php';
    include_once '../../model/danhmuc.php';
    include_once '../../model/sanpham.php';
    include_once '../../model/variant.php';
    include_once '../../model/statistics.php';
    include_once '../../model/comment.php';
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
                $product = select_all_pro();
                include './product/list.php';
                break;
            case 'aad_product':
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
                    if(!preg_match('/^[A-Za-z][\w\s][^_]+$/', $name)){
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
                        }else{
                            move_uploaded_file($image['tmp_name'], $targets);
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
            case 'edit_product':
                if(isset($_GET['id'])){
                    $pro = load_one_pro($_GET['id']);
                    $cate = select_all_dm();
                }
                include_once './product/edit.php';
                break;
            case 'update_products':
                if(isset($_POST['edit_pro'])){
                    $id = $_POST['id_pro'];
                    $name = $_POST['name_pro'];
                    $price = $_POST['price_pro'];
                    $status = $_POST['status_pro'];
                    echo $status ;
                    $category = $_POST['category_pro'];
                    $date = $_POST['date_pro'];
                    $image = $_FILES["image_pro"];
                    $des_pro = $_POST['des_pro'];
                    $dir = '../../image/';
                    $targets =  $image['name'];
                    $imgs = ['jpg','jpeg','png'];
                    $path = pathinfo($image['name'],PATHINFO_EXTENSION);
                    $er = [];
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
                    if(!empty($date)){
                        if(!preg_match('/^20[\d]{2}[-][\d]{2}[-][\d]{2}$/', $date)){
                            $er['date'] = $date. ' ngày tháng năm không hợp lệ';
                        }
                    }else{
                        $date = '';
                    }
                    if($image['size'] > 0){
                        if(!in_array(strtolower($path),$imgs)){
                            $er['img'] = ' Ảnh vừa nhập không đúng định dạng jpg, jpeg hoặc png';
                        }else{
                            move_uploaded_file($image['tmp_name'],$dir.$targets);
                        }
                    }else{
                        $targets = '';
                    }
                    if(array_filter($er)){
                        $pro = load_one_pro($id);
                        $cate = select_all_dm();
                        include_once './product/edit.php';
                    }
                    if(!array_filter($er)){
                        update_pro($name,$date,$des_pro,$status,$category,$price,$targets,$id);
                        $message = 'Sản phẩm đã được cập nhật';
                        $product = select_all_pro();
                        $cate = select_all_dm();
                        include_once './product/list.php';
                    
                    }
                }
                break;
            case 'delete_product':
                if(isset($_GET['id'])){
                    delete_pro($_GET['id']);
                    $product = select_all_pro();
                    $cate = select_all_dm();
                    include_once './product/list.php';
                }
                break;
            case 'add_cate':
                if(isset($_POST['add_cate']) && $_POST['add_cate']){
                    $cate_name = $_POST['cate_name'];
                    $cate = select_all_dm();
                    $er = [];
                    foreach ($cate as $k) {
                        if($cate_name == $k['cate_name']){
                            $er['name'] = 'Danh mục đã tồn tại';
                        }
                    }
                    if(!preg_match('/^[A-Z][a-zA-Z\s]+$/', $cate_name)){
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
            case 'edit_cate': 
                if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $cate = select_one_dm($id);
                }
                include_once './categories/edit.php';
                break;
            case 'update_dm':
                if(isset($_POST['edit_cate'])){
                    $id_cate = $_POST['idcate'];   
                    $cate_name = $_POST['cate_name'];
                    $er = [];
                    if(!preg_match('/^[A-Z][a-zA-Z\s]+$/', $cate_name)){
                        $er['name'] = 'Tên danh mục không hợp lệ';
                    }
                    if(!array_filter($er)){
                        update_dm($cate_name, $id_cate);
                        $message = 'Danh mục đã được cập nhật';
                        $cate = select_all_dm();
                        include_once './categories/list.php';
                    }else{
                        $cate = select_one_dm($id_cate);
                        include_once './categories/edit.php';
                    }
                }
                break;
            case 'delete_cate':
                if(isset($_GET['id'])){
                    delete_dm($_GET['id']);
                }
                $cate = select_all_dm();
                $message = 'Xóa danh mục thành công';
                include './categories/list.php';
                break;
            case 'variant':
                $variant = select_all_variant();
                    include_once './variant/list.php';
                break;
            case 'aad_variant':
                if(isset($_POST['add_variant']) && $_POST['add_variant']){
                    $color = $_POST['color_variant'];
                    $version = $_POST['version_variant'];
                    $er = [];
                    if(!preg_match('/^Màu[A-Za-z\s][^0-9_]+$/u', $color)){
                        $er['color'] = 'Màu sắc biến thể không hợp lệ';
                    }
                    if(!preg_match('/^[0-9][\w][^_]+$/', $version)){
                        $er['version'] = 'Phiên bản biến thể không hợp lệ';
                    }
                    if(!array_filter($er)){
                        insert_variant($color, $version);
                        $message = "Biến thể đã được thêm mới";
                    }
                }
                include_once './variant/add.php';
                break;
            case 'edit_variant':
                if(isset($_GET['id'])){
                    $variant = select_one_variant($_GET['id']);
                    include_once './variant/edit.php';
                }
                break;
            case 'update_variant':
                if(isset($_POST['edit_variants'])){
                    $id = $_POST['id_var'];
                    $color = $_POST['color_variant'];
                    $version = $_POST['version_variant'];
                    $er = [];
                    if(!preg_match('/^Màu[A-Za-z\s][^0-9_]+$/u', $color)){
                        $er['color'] = 'Màu sắc biến thể không hợp lệ';
                    }
                    if(!preg_match('/^[0-9][\w][^_]+$/', $version)){
                        $er['version'] = 'Phiên bản biến thể không hợp lệ';
                    }
                    if(array_filter($er)){
                        $variant = select_one_variant($id);
                        include_once './variant/edit.php';
                    }
                    if(!array_filter($er)){
                        update_variant($id,$color,$version);
                        $message = "Biến thể đã được cập nhật";
                        $variant = select_all_variant();
                        include_once './variant/list.php';
                    }
                }
                break;
            case 'delete_variant':
                if(isset($_GET['id'])){
                    delete_variant($_GET['id']);
                    $variant = select_all_variant();
                    include_once './variant/list.php';
                }
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


                        if(!preg_match('/^(0|\+84)[0-9]{9}$/', $phone)){
                            $_err_add_khach_hang['phone'] = "bạn chưa nhập số điện thoại của khách hàng";
                        };
                        foreach($user as $users){
                            if( $users['sdt'] == $phone){
                                $_err_add_khach_hang['name-login'] = "tên user đã tồn tại";
                            }

                        };
                        
                        if(!preg_match('/[A-Za-z0-9-_\!\@\#\$\%\^\&\*\(\)\+\=\/]{8,30}/', $password)){
                            $_err_add_khach_hang['password'] = "bạn chưa nhập mật khẩu của khách hàng";
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
                case 'edit_user':
                    if(isset($_GET['id'])){
                        $user = select_one_ad($_GET['id']);
                        include_once './user/edit_client_2.php';
                    }
                    break;
                case 'update_user':
                    if(isset($_POST['edit_user'])){
                        $id = $_POST['id_user'];
                        $fullname = $_POST['name'] ;
                        $useName = $_POST['name-login'] ;
                        $email_user = $_POST['email_user'] ;
                        $accont = $_POST['accont_balance'] ;
                        $phone =  $_POST['phone'] ;
                        $password = $_POST['password'] ;
                        $role =  $_POST['role'] ;
                        $created_date_user = $_POST['created_date_user'] ;
                        $_err_add_khach_hang = [];
                        if(empty($fullname)){
                            $_err_add_khach_hang['fullname_user'] = "Tên khách hàng chưa đúng";
                        };

                        if(!preg_match('/^[A-Za-z\s]+$/u',$useName)){
                            $_err_add_khach_hang['name-login'] = "bạn chưa nhập tên đăng nhập của khách hàng";
                        };

                        if($email_user == ""){
                            $_err_add_khach_hang['email_user'] = "bạn chưa nhập email của khách hàng";
                        }
                        else if(!filter_var($email_user, FILTER_VALIDATE_EMAIL))
                        {
                            $_err_add_khach_hang['email_user'] = "bạn chưa nhập đúng định dạng email của khách hàng";
                        }
                        
                        ;


                        if(!preg_match('/^(0|\+84)[0-9]{9}$/', $phone)){
                            $_err_add_khach_hang['phone'] = "bạn chưa nhập số điện thoại của khách hàng";
                        };
                        
                        if(!preg_match('/[A-Za-z0-9-_\!\@\#\$\%\^\&\*\(\)\+\=\/]{8,30}/', $password)){
                            $_err_add_khach_hang['password'] = "bạn chưa nhập mật khẩu của khách hàng";
                        } ;

                        if($role == ""){
                            $_err_add_khach_hang['role'] = "bạn chưa nhập vai trò của khách hàng";
                        };
                        if($created_date_user == ""){
                            $_err_add_khach_hang['created_date_user'] = "bạn chưa nhập ngày đăng ký";
                        };
                        if($accont > 0 || $accont < 0){
                            if(!preg_match('/^\d+$/',$accont) || $accont < 0){
                                $_err_add_khach_hang['accont'] = "Số dư tài khoản sai";
                            }
                        }
                        
                        if(array_filter($_err_add_khach_hang)){
                            $user = select_one_ad($id);
                            include_once './user/edit_client_2.php';
                        }
                        if(!array_filter($_err_add_khach_hang))
                        {
                            // insert_user_ad($useName,$email_user,$password,$fullname,$phone,$role,$created_date_user) ;
                            edit_user($useName,$fullname,$email_user,$phone,$password,$accont,$role,$created_date_user,$id);
                            $user=select_all();
                            include 'user/list_client.php';
                            $mesages = "thêm khách hàng thành công" ;    
                        }
                    }
                    break;
                case 'delete_user':
                    if(isset($_GET['id'])){
                        delete_user($_GET['id']);
                        $user=select_all();
                        include 'user/list_client.php';
                    }
                    break;
                case 'add_variant':
                        $variant = select_all_variant();
                        $product = select_all_pro();
                        if(isset($_POST['add_variant_detail'])&& $_POST['add_variant_detail']){
                            $product = $_POST['product'];
                            $variant = $_POST['variant'] ;
                            $quantity_variant = $_POST['quantity_variant'];
                            $price_variant = $_POST['price_variant'];
                            $sale_variant = $_POST['sale_variant'];
                            $special_features = $_POST['special_features'];
                            $image_variant = $_FILES['image_variant'];
                            $dir = '../../upload/';
                            $imgs = ['jpg','jpeg','png'];
                            $er = [];
                            if(!preg_match('/^\d+$/',$product)){
                                $er['pro'] = 'Bạn chưa chọn sản phẩm';
                            }
                            if(!preg_match('/^\d+$/',$variant)){
                                $er['var'] = 'Bạn chưa chọn phiên bản';
                            }
                            if(!preg_match('/^\d+$/',$quantity_variant)){
                                $er['quantity'] = 'Bạn chưa nhập số lượng sản phẩm';
                            }
                            if(!preg_match('/^\d+$/',$price_variant)){
                                $er['quantity'] = 'Bạn chưa nhập giá sản phẩm';
                            }
                            if(!empty($special_features)){
                                if(!preg_match('/^[A-Za-z0-9\s]+$/', $special_features)){
                                    $er['special_features'] = 'TÍnh năng đặc biệt không đúng';
                                }
                            }else{
                                $special_features = "";
                            }
                            if(!empty($sale_variantle)){
                                if(!preg_match('/^\d+$/',$sale_variante)){
                                    $er['sale'] = 'Giảm giá không đúng';
                                }
                            }else{
                                $sale_variantle = "";
                            }
                            foreach($image_variant['size'] as $sz){
                                if($sz <= 0){
                                    $er['image'] = 'Bạn chưa nhập hình ảnh';
                                }
                            }
                            foreach($image_variant['name'] as $na=>$val){
                                    $path = pathinfo($val,PATHINFO_EXTENSION);
                                if(!in_array(strtolower($path),$imgs)){
                                    $er['images'] = 'Ảnh không đúng định dạng';
                                }else{
                                    if(!array_filter($er)){
                                        move_uploaded_file($image_variant['tmp_name'][$na],$dir.$val);
                                        insert_img_var($product,$variant,$val);
                                    }
                                }
                                }
                            if(!array_filter($er)){
                                insert_variant_pro($product,$variant,$quantity_variant,$price_variant,$sale_variant,$special_features);
                                $mesages = "Thêm biến thể thành công";
                                $variant = select_all_variant();
                                $product = select_all_pro();
                            }
                        }
                        include_once './product/add_variant.php';
                    break;
                case 'pro_variant':
                    $var = select_all_pro_var();
                    include_once './product/list_variant.php';
                    break;
                case 'edit_pro_var':
                    if(isset($_GET['id'])&&isset($_GET['id_var'])){
                        $variant = select_all_variant();
                        $product = select_all_pro();
                        $var = select_one_var($_GET['id'],$_GET['id_var']);
                        include_once './product/edit_var.php';
                    }
                    break;
                case 'upload_pro_var':
                    if(isset($_POST['edit_var_detail'])){
                        $product = $_POST['product'];
                        $variant = $_POST['variant'] ;
                        $quantity_variant = $_POST['quantity_variant'];
                        $price_variant = $_POST['price_variant'];
                        $sale_variant = $_POST['sale_variant'];
                        $special_features = $_POST['special_features'];
                        $image_variant = $_FILES['image_variant'];
                        $dir = '../../upload/';
                        $imgs = ['jpg','jpeg','png'];
                        $v = (int)$variant;
                        $p = (int)$product;
                        $er = [];
                        if(!preg_match('/^\d+$/',$product)){
                            $er['pro'] = 'Bạn chưa chọn sản phẩm';
                        }
                        if(!preg_match('/^\d+$/',$variant)){
                            $er['var'] = 'Bạn chưa chọn phiên bản';
                        }
                        if(!preg_match('/^\d+$/',$quantity_variant)){
                            $er['quantity'] = 'Bạn chưa nhập số lượng sản phẩm';
                        }
                        if(!preg_match('/^\d+$/',$price_variant)){
                            $er['quantity'] = 'Bạn chưa nhập giá sản phẩm';
                        }
                        if(!empty($special_features)){
                            if(!preg_match('/^[A-Za-z0-9\s]+$/', $special_features)){
                                $er['special_features'] = 'TÍnh năng đặc biệt không đúng';
                            }
                        }else{
                            $special_features = "";
                        }
                        if(!empty($sale_variantle)){
                            if(!preg_match('/^\d+$/',$sale_variante)){
                                $er['sale'] = 'Giảm giá không đúng';
                            }
                        }else{
                            $sale_variantle = "";
                        }
                            foreach($image_variant['name'] as $na=>$val){
                                if($val != ''){
                                    $path = pathinfo($val,PATHINFO_EXTENSION);
                                    if(!in_array(strtolower($path),$imgs)){
                                        $er['images'] = 'Ảnh không đúng định dạng';
                                    }else{
                                        move_uploaded_file($image_variant['tmp_name'][$na],$dir.$val);
                                        if(!array_filter($er)){
                                            update_img_var($p,$v,$val);
                                        }
                                    }
                                }
                            }
                        if(array_filter($er)){
                            $variant = select_all_variant();
                            $product = select_all_pro();
                            $var = select_one_var($p,$v);
                            include_once './product/edit_var.php';
                        }
                        if(!array_filter($er)){
                            // insert_variant_pro($product,$variant,$quantity_variant,$price_variant,$sale_variant,$special_features);
                            $mesages = "Thêm biến thể thành công";
                            update_pro_var($p,$v,$quantity_variant,$price_variant,$sale_variant,$special_features);
                            $var = select_all_pro_var();
                            include_once './product/list_variant.php';

                        }
                    }
                    break;
                case 'delete_pro_var':
                    if(isset($_GET['id'])&&isset($_GET['id_var'])){
                        delete_pro_var($_GET['id'],$_GET['id_var']);
                        $var = select_all_pro_var();
                        include_once './product/list_variant.php';
                    }
                    break;
                case 'productStatistics':
                    if(isset($_POST['month_btn'])){
                        $date = $_POST['month'];
                        $product_cate = Statistics_cate_pro($date);
                    }else{
                        $date = date('Y-m');
                        $product_cate = Statistics_cate_pro($date);
                    }
                    include_once './statistics/product.php';
                    break;
                case 'chartPro':
                    $date = $_GET['date'];
                    if($date != ''){
                        $product_cate = Statistics_cate_pro($date);
                    }else{
                        $product_cate = Statistics_cate_pro('');
                    }
                    include_once './statistics/proChart.php';
                    break;
                case 'userStatistics':
                    if(isset($_POST['month_btn'])){
                        $date = $_POST['month'];
                        $user = statistics_user($date);
                    }else{
                        $date = date('Y-m');
                        $user = statistics_user($date);
                    }
                    include_once './statistics/userStatistics.php';
                    break;
                case 'chartuser':
                    $date = $_GET['date'];
                    $df = 0;
                    if($date != ''){
                        $user = statistics_user($date);
                    }else{
                        $user = statistics_user('');
                    }
                    // for ($j=0; $j < count($user); $j++) { 
                        
                        // for($i = 1; $i <= 12; $i++){
                        //     if($i==12) $sign=""; else $sign=",";
                        //     for ($j=0; $j < count($user);$j++){
                        //         if($i < 10 ){
                        //             $s = "0$i";
                        //             // echo $s;
                        //             // echo substr($user[$j]['created_date_user'],5,2);
                        //             if(($s == substr($user[$j]['created_date_user'],5,2))){
                        //                 echo "['".$i."', ".$user[$j]['sums']."]".$sign;
                        //                 echo $j;
                        //                 // $j++;
                        //             }else{
                        //                 echo "['".$i."', ".$df." ]".$sign;
                        //                 // $j++;
                        //             }
                        //         }else{
                        //             // echo $i;
                        //             if($i == substr($user[$j]['created_date_user'],5,2)){
                        //                 echo "['".$i."', ".$user[$j]['sums']."]".$sign;
                        //             }else{
                        //                 echo "['".$i."', ".$df." ]".$sign;
                                        
                        //             }
                        //         }
                        // }
                        // continue;
                        // if($i <= count($user)){
                        //     if($user[$i]['sums'] > 0){
                        //         $a = $i+1;
                        //         echo "['".$a."', ".$user[$i]['sums']."]".$sign;
                        //     }else{
                        //         $a = $i+1;
                        //         echo "['".$a."', ".$df." ]".$sign;
                        //     }
                        // }else{
                        //     $a = $i+1;
                        //     echo "['".$a."', ".$df." ]".$sign;
                        // }
                            // }
                        // }
                    // echo '<pre>';
                    // print_r($user);
                    include_once './statistics/chartUser.php';
                    break;
                case 'comment':
                    $comments = synthetic_bl();
                    include_once './comment/listpro.php';
                    break;
                case 'comment_pro':
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $comment = select_bl($id);
                        include_once './comment/list.php';
                    }
                    break;
                case 'delete_comment':
                    if(isset($_GET['id'])){
                        $id = $_GET['id'];
                        $id_pro = $_GET['id_pro'];
                        delete_bl($id);
                        $comment = select_bl($id_pro);
                        include_once './comment/list.php';
                    }
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