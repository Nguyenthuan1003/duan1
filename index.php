<?php

    session_start();
    include './model/PDO.php';
    include './model/blog.php';
    include './model/webSetting.php';
    $wst = select_all_websetting();
    include './header.php';
    include './model/danhmuc.php';
    include './model/sanpham.php';
    include './model/users.php';
    include './model/sendmail.php';
    include "./model/voucher.php";
    include "./model/order.php";
    include "./model/variant.php";
    $CategoriesHome = select_all_dm();
    $ProductsHome = select_page_home();
    $Curent_Page = 1 ;
    $sql = "SELECT count(id_pro) as sl_sp FROM products" ;
    $Total_Sp = pdo_query_one($sql);
     // tổng sản phẩm trong bảng sản phẩm 
     $Total_Product_On_Page = 12;
     // số lượng sản phẩm trên page
     $Total_Page = ceil($Total_Sp['sl_sp']/$Total_Product_On_Page) ;
     // tổng lượng page sản phẩm hiển thị lên website 
    if(isset($_GET['act'])){
            $act = $_GET['act'];
        switch ($act){
                case 'login':
                if(isset($_POST['login'])&&$_POST['login']){
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $user = select_one_user($email,$password);
                    if(is_array($user)){
                        $_SESSION['user'] = $user ;
                        header('Location:index.php');
                        
                    }else{
                        include './view/client/user/login.php';
                    }
                }else{
                    include './view/client/user/login.php';}
                break;
                case 'registe':
                    if(isset($_POST['registe']) && $_POST['registe']){
                        $name=$_POST['name'];
                        $email=$_POST['email'];
                        $password=$_POST['password'];
                        $enterThePassword=$_POST['enterThePassword'];
                        $date = date('Y-m-d');
                        $error=[];
                        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $error['email']='email không đúng';
                        }
                        if(!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[\!\@\#\$%\^\*\(\)-\+]).{8,30}$/',$password)){
                            $error['password']='mật khẩu yếu';
                        }
                        if(!preg_match('/^[A-Z]+[A-Za-z0-9_\-\s]*$/u',$name)){
                            $error['name'] ='bắt buộc bằng chữ cái in hoa';
                        }
                        if($password != $enterThePassword ){
                            $error['enterThePassword']='mật khẩu nhập lại không đúng';
                        }
                        if(!array_filter($error)){
                            insert_user($name,$email,$password,"","","",$date);
                            $message='đăng kí thành công';

                        }
                    }
                    include './view/client/user/registe.php';
                    break;
                case 'pay':

                function get_info_order($city,$ditrict,$ward)
                {
                           
                      $response = file_get_contents('https://provinces.open-api.vn/api/?depth=3');

                      $api = json_decode($response);
                      $arr_thanh_pho = array();
    
                      for($i = 0; $i < count($api) ;$i++)
                      {
                        $arr_thanh_pho[] = (array)$api[$i];
       
                        };

                       $arr_huyen = array();
                       $arr_phuong = $arr_thanh_pho ;
                     for($i = 0; $i < count($arr_thanh_pho) ;$i++)
                    {
       
                             $arr_thanh_pho[$i]['districts']; 
                              $d = $i ;  
                       for($a = 0 ; $a < count($arr_thanh_pho[$d]['districts']); $a++)
                      {
                      $arr_phuong[$d]['districts'][$a] = (array)$arr_thanh_pho[$d]['districts'][$a];    
                       }
        
                       };
    
    
                    $arr_place = $arr_phuong ;
                 for($v = 0; $v < count($arr_phuong) ;$v++)
                 {
                     $arr_phuong[$v]['districts']; 
                     $b = $v ;  
                    for($k = 0 ; $k < count($arr_phuong[$b]['districts']); $k++)
                    {
                      $f = $k ;
                       for($e = 0 ; $e < count($arr_phuong[$b]['districts'][$f]['wards']) ; $e++ )
                      {
                         $arr_place[$b]['districts'][$f]['wards'][$e] = (array)$arr_phuong[$b]['districts'][$f]['wards'][$e] ;
                       }
                    }
        
                   };
    
                $city ;
                $huyen ;
                $phuong ;
        for($v = 0; $v < count($arr_place) ;$v++)
       {
          if($arr_place[$v]['code'] == $city)
          {
          $city = $arr_place[$v]['name'];
            $b = $v ;  
            for($k = 0 ; $k < count($arr_place[$b]['districts']); $k++)
           {
               if($arr_place[$b]['districts'][$k]['code'] == $ditrict)
              {

                 $huyen = $arr_place[$b]['districts'][$k]['name'] ;
                 $f = $k ;
                   for($e = 0 ; $e < count($arr_place[$b]['districts'][$f]['wards']) ; $e++ )
                   {
                      if($arr_place[$b]['districts'][$f]['wards'][$e]['code'] == $ward )
                     {
                       $phuong = $arr_place[$b]['districts'][$f]['wards'][$e]['name'];
                     }
                  }
               }
            }
          }
        
        }
         ;
        $diachi = $phuong . "-". $huyen . "-". $city ;
        return $diachi ;
        ;
         ;
                    };
                    // hàm lấy địa chỉ api .

                    $value_voucher = 0 ;
                    $sl_voucher = 0 ;
                    $voucher = get_all_voucher();
                    $orders = get_all_order();
                    $mesage_voucher = '';
                    if(isset($_POST['add_voucher']) && !empty($_POST['code_voucher']))
                    {
                        $code_voucher = $_POST['code_voucher'];
                        
                       
                        for( $i = 0 ; $i < count($voucher) ; $i++)
                        {
                             
                            
                            if( $code_voucher === $voucher[$i]['name_vorcher'])
                            {
                                foreach($orders as $orders)
                                 {
                                    if($orders['name_voucher'] === $voucher[$i]['name_vorcher']  )
                                    {
                                        $sl_voucher += 1 ;
                                    }
                                 };
                                
                                 $voucher_date = $voucher[$i]['expiration_date'];
                                 $now = date("Y-m-d");
                                 
                                 if($sl_voucher >= $voucher[$i]['quantity_limit'])
                                 {
                                    $mesage_voucher = "Voucher đã hết vui lòng nhập voucher khác ";
                                 }
                                 else if(strtotime($now) > strtotime($voucher_date) )
                                 {
                                    $mesage_voucher = "Voucher đã hết hạn vui lòng nhập voucher khác ";
                                 }
                                 else {
                                    $mesage_voucher = "";
                                    $value_voucher = $voucher[$i]['coupon_value'];
                                    $_SESSION['voucher'] = $voucher[$i]['name_vorcher'] ;
                                    
                                 };
                                 

                                break ;
                            }  
                           else 
                            {
                                
                                $mesage_voucher = "không tồn tại mã voucher";
                            }
                        }

                        

                    };
                    // check voucher 
                    if(isset($_POST['payment']))
                    {
                        $place_pick_up = $_POST['btnradio'] ;
                        $user_name = $_POST['username'];
                        $phoneNumber = $_POST['phoneNumber'];
                        $email = $_POST['email'];
                        $city = $_POST['city'];
                        $district = $_POST['district'];
                        $wards = $_POST['wards'];
                        $apartmentNumber = $_POST['apartmentNumber'];
                        $method_payment = $_POST['vbtn-radio'];
                        $total_price =  $_POST['total_price'];
                        $apartmentNumber = $_POST['apartmentNumber'];
                        $err = [];


                        if($user_name == "")
                        {
                            $err['user'] = "bạn chưa nhập họ tên";
                        }
                        ;
                        if($phoneNumber=="")
                        {
                            $err['phone'] = "bạn chưa nhập Số Điện Thoại";
                        };
                        if($email=="")
                        {
                            $err['email'] = "bạn chưa nhập Email";
                        };
                        if($city =="")
                        {
                            $err['city'] = "bạn chưa chọn thành phố";
                        };
                        if($district =="")
                        {
                            $err['district'] = "bạn chưa chọn Quận / Huyện";
                        };
                        if( $wards == "")
                        {
                            $err['wards'] = "bạn chưa chọn Phường / Xã";
                        };
                        if( $apartmentNumber =="")
                        {
                            $err['apartmentNumber'] = "bạn chưa nhập số nhà";
                        };

                        if(empty($err) && $method_payment === "thanh toán khi nhận hàng"){

                            $loca = get_info_order($city,$district,$wards);
                            $date = date("d/m/Y") ;
                            insert_order($user_name,$apartmentNumber.'-'.$loca,$date,isset( $_SESSION['voucher'])? $_SESSION['voucher']:'', $total_price ,$phoneNumber ,$email, isset($_SESSION['user'])?$_SESSION['user']['id_user']:"");
                            $order = select_one_order($email,$date) ;
                            $id_order = $order['id_order'];

                            
                            $ca = is_array($_SESSION['id_cart'])?count($_SESSION['id_cart']):1 ;
                            for($i = 0 ; $i < $ca ; $i++)
                            {
                                    $sp = select_one_pro_atrri($_SESSION['id_cart'][$i],$_SESSION['id_variant'][$i]) ;
                                    insert_order_details($id_order,$_SESSION['id_cart'][$i],$_SESSION["quantity_pro_cart"][$i],$sp['price'],$sp['price'],$_SESSION['id_variant'][$i]);
                                    //insert thông tin vào bảng chi tiết đơn hàng
                                    $quantity = $sp['quantity'] - $_SESSION["quantity_pro_cart"][$i] ;
                                    update_quantity_pro_var($_SESSION['id_cart'][$i],$_SESSION['id_variant'][$i],$quantity);
                                    // cập nhập lại số lượng của sản phẩm còn lại sau khi mua 
                            }

                            
                            header("location:index.php?act=ordered&&id_order=$id_order");
                            
                           
                            

                        }


                    };
                    $hanghoa = select_all_product_atrri();
                        include './view/client/pay.php';
                    break;
                    case 'blog':
                        $blog = select_all_blog() ;
                        include './view/client/blogs.php';
                    break;
                    case 'ordered':
                        if(isset($_GET['id_order']))
                        {
                            $id_order = $_GET['id_order'];
                            $order = select_one_order_id($id_order);
                            $order_details = get_all_order_details($id_order);
                            
                        };
                        $hanghoa = select_all_product_atrri() ;
                        include './view/client/ordered.php';
                    break;
                case 'info-user':
                    if(isset($_SESSION['user'])&&is_array($_SESSION['user'])){
                        $user = $_SESSION['user'];
                        $order =  get_all_order_with_id_user($user['id_user']);
                        
                    }
                        include './view/client/user/info_user.php';
                    break;
                case 'chitiet':
                        $id = $_GET['id_pro'];
                        $pro = load_one_pro($id);
                        $var = select_id_variant_with_id_pro($id);
                        if(!isset($_GET['version']) && !empty($var) && !isset($_GET['versions']) && !isset($_GET['color']) && !isset($_GET['colors'])  ){
                        
                        $img_var = select_img_variant_with_id_variant($id,$var[0]['id_variant']);
                        $version = select_version_variant($id);
                        $color = select_color_variant($id) ; }
                        else if(isset($_GET['version'])&&isset($_GET['color']))
                        {
                            $versions = $_GET['version'] ;
                            $color = $_GET['color'];
                            $pro_attri = select_pro_with_idpro_and_version_and_color_variant($id,$versions,$color);
                            $img_var = select_img_variant_with_id_variant($id,$pro_attri[0]['id_variant']);
                            $version = select_version_variant($id);
                            $color = select_color_variant($id) ;
                        }
                        else if(empty($var))
                        {
                            
                        }
                        include './view/client/detail_product.php';
                    break;
                case 'quen_mat_khau':
                        include './view/client/forgot_password.php';
                    break;
                case 'cart':
                        
                        
                        if(isset($_COOKIE['id_cart']) && !empty($_COOKIE['id_cart']))
                        {
                            $_SESSION['id_cart'] = json_decode($_COOKIE['id_cart'], true); ;
                            $_SESSION['quantity_pro_cart'] = json_decode($_COOKIE['quantity_pro_cart'], true);
                            $_SESSION['id_variant'] = json_decode($_COOKIE['id_variant'], true);
                        };
                        if(isset($_POST['add_to_cart']) && isset($_GET['id_pro']) && empty($_SESSION['id_cart']) && isset($_POST["version_pro"]) && isset($_POST["color_pro"]))
                            
                        {
                             
                                 $pro = select_pro_with_idpro_and_version_and_color_variant($_GET['id_pro'],$_POST["version_pro"],$_POST["color_pro"]);
                           
                                $arr_cart = [
                                'id' => $pro[0]['id_pro'],
                                'quantity' => 1,
                                'id_variant' => $pro[0]['id_variant']
                                
                               ];
                               $_SESSION['id_cart'] = $arr_cart['id'] ;
                               $_SESSION['quantity_pro_cart'] = $arr_cart['quantity'] ;
                               $_SESSION['id_variant'] = $arr_cart['id_variant'] ;

                               
                               setcookie('id_cart', json_encode($_SESSION['id_cart']), time()+3000000);
                               setcookie('quantity_pro_cart', json_encode($_SESSION['quantity_pro_cart']), time()+3000000);
                               setcookie('id_variant', json_encode($_SESSION['id_variant']), time()+3000000);
                            
                            }
                            else if(isset($_POST['add_to_cart']) && isset($_GET['id_pro']) && isset($_SESSION['id_cart']) && !empty($_SESSION['id_cart']) && isset($_POST["version_pro"]) && isset($_POST["color_pro"])){
                            
                              $pro = select_pro_with_idpro_and_version_and_color_variant($_GET['id_pro'],$_POST["version_pro"],$_POST["color_pro"]);

                               if(!is_array($_SESSION['id_cart'])){
                                   if($pro[0]['id_pro'] == $_SESSION['id_cart'] && $pro[0]['id_variant'] == $_SESSION['id_variant'] ){                 
                                        $_SESSION["quantity_pro_cart"] += 1;
                                        setcookie('quantity_pro_cart', json_encode($_SESSION['quantity_pro_cart']), time()+3000000);
                                 }
                                   else{
                                    
                                    $arr_id_cart = array();
                                    $arr_id_cart[] = $_SESSION['id_cart'];
                                    $arr_id_cart[] = $pro[0]['id_pro'];
                                    // push id product vào mảng
                                    $arr_quantity_pro_cart = array();
                                    $arr_quantity_pro_cart[] =  $_SESSION['quantity_pro_cart'];
                                    $arr_quantity_pro_cart[] = 1 ;

                                    $arr_id_variant = array();
                                    $arr_id_variant[] = $_SESSION['id_variant'];
                                    $arr_id_variant[] = $pro[0]['id_variant'] ;
                                   
                                    $_SESSION['id_cart'] = $arr_id_cart;
                                    $_SESSION['quantity_pro_cart'] = $arr_quantity_pro_cart;
                                    $_SESSION['id_variant'] =  $arr_id_variant ;

                                    
                                    setcookie('id_cart', json_encode($_SESSION['id_cart']), time()+3000000);
                                    setcookie('quantity_pro_cart', json_encode($_SESSION['quantity_pro_cart']), time()+3000000);
                                    setcookie('id_variant', json_encode($_SESSION['id_variant']), time()+3000000);
                                    
                                    
                                }
                            }else{
                                
                                $stacks = 0 ;

                                for($i = 0 ; $i < count($_SESSION['id_cart']) ; $i++)
                                {
                                    if($pro[0]['id_pro'] == $_SESSION['id_cart'][$i] && $_SESSION['id_variant'][$i] == $pro[0]['id_variant'] )
                                    {
                                       $_SESSION["quantity_pro_cart"][$i] += 1 ;
                                       setcookie('quantity_pro_cart', json_encode($_SESSION['quantity_pro_cart']), time()+3000000);
                                       $stacks = 1 ;
                                       break; 
                                    }
                                };

                                if($stacks === 0) {
                                
                                    $arr_id_cart = array();
                                    $arr_id_cart = $_SESSION['id_cart'];
                                    $arr_id_cart[] = $pro[0]['id_pro'];
                                    // push id product vào mảng
                                    $arr_quantity_pro_cart = array();
                                    $arr_quantity_pro_cart =  $_SESSION['quantity_pro_cart'];
                                    $arr_quantity_pro_cart[] = 1 ;

                                    $arr_id_variant = array();
                                    $arr_id_variant = $_SESSION['id_variant'];
                                    $arr_id_variant[] = $pro[0]['id_variant'] ;
                                   
                                    $_SESSION['id_cart'] = $arr_id_cart;
                                    $_SESSION['quantity_pro_cart'] = $arr_quantity_pro_cart;
                                    $_SESSION['id_variant'] =  $arr_id_variant ;

                                    
                                    setcookie('id_cart', json_encode($_SESSION['id_cart']), time()+3000000);
                                    setcookie('quantity_pro_cart', json_encode($_SESSION['quantity_pro_cart']), time()+3000000);
                                    setcookie('id_variant', json_encode($_SESSION['id_variant']), time()+3000000);
                                }
                            }

                            
                        }
                        else if(isset($_POST['add_to_cart']) && isset($_GET['id_pro']) && !isset($_POST["version_pro"]) && !isset($_POST["color_pro"]))
                        {
                            include "main.php";
                            echo "<script>alert('Vui Lòng Chọn Sản Phẩm Khác hoặc liên hệ với Shop')</script>";
                            die;
                            
                        }
                    
                        
                        ;
                        // lưu id product và id variant từ trang main vào session
                    

                        // lưu sản phẩm vào cookie
                        
                        if(isset($_POST['edit_cart']) && isset($_SESSION['id_cart']) && is_array($_SESSION['id_cart']) )
                        {
                            $id_pro = $_POST['edit_idpro_cart'] ;
                            $id_varian = $_POST['edit_idpro_varriant_cart'];
                            $quantity_pro = $_POST['qantit_pro'];
                            $quantity_pro_on_db = $_POST['quantity_pro_on_db'];
                            $name_pro = $_POST['name_pro'];
                            $color_pro = $_POST['color_pro'];
                            $version_pro = $_POST['version_pro'];
                            $check_edit_quantity = 0 ;
                            for( $i = 0 ; $i < count($_SESSION['id_cart']) ; $i++){
                                if($_SESSION['id_cart'][$i] == $id_pro && $_SESSION['id_variant'][$i] == $id_varian)
                                {
                                    if($quantity_pro <= $quantity_pro_on_db )
                                    {
                                        $_SESSION["quantity_pro_cart"][$i] =  $quantity_pro ;
                                        setcookie('quantity_pro_cart', json_encode($_SESSION['quantity_pro_cart']), time()+3000000);
                                        $check_edit_quantity = 1 ;
                                        break;
                                    }
                                }
                            }
                            if($check_edit_quantity == 0)
                            {
                                $mesage_quantity_cart = $name_pro." ".$version_pro." ".$color_pro." trong kho không đủ "." ".$quantity_pro." chiếc vui lòng nhập lại";
                            };
                        }
                        else if(isset($_POST['edit_cart']) && isset($_SESSION['id_cart']) && !is_array($_SESSION['id_cart']))
                        {
                            $id_pro = $_POST['edit_idpro_cart'] ;
                            $quantity_pro = $_POST['qantit_pro'];
                            $quantity_pro_on_db = $_POST['quantity_pro_on_db'];
                            $name_pro = $_POST['name_pro'];
                            $color_pro = $_POST['color_pro'];
                            $version_pro = $_POST['version_pro'];
                            $check_edit_quantity = 0 ;
                            if($quantity_pro <= $quantity_pro_on_db )
                            {
                                $_SESSION["quantity_pro_cart"] =  $quantity_pro ;
                                setcookie('quantity_pro_cart', json_encode($_SESSION['quantity_pro_cart']), time()+3000000);
                                $check_edit_quantity = 1 ;
                                
                            };
                            if($check_edit_quantity == 0)
                            {
                                $mesage_quantity_cart = $name_pro." ".$version_pro." ".$color_pro." trong kho không đủ "." ".$quantity_pro." chiếc vui lòng nhập lại";
                            };

                            
                        }
                        // cập nhập số lượng trong trang cart   
                        
                        if(isset($_POST['remove_cart']) && isset($_SESSION['id_cart']) && is_array($_SESSION['id_cart']) )
                        {
                            $id_pro = $_POST['remove_idpro_cart'] ;

                            $arr_remove_id = array();
                            $arr_remove_sl = array();
                            $arr_remove_id_var = array();
                            
                            for( $i = 0 ; $i < count($_SESSION['id_cart']) ; $i++){
                                if($i == $id_pro)
                                {
                                  continue ;                                   
                                };
                                $arr_remove_id[] = $_SESSION['id_cart'][$i] ;
                                $arr_remove_sl[] = $_SESSION["quantity_pro_cart"][$i] ;
                                $arr_remove_id_var[] =  $_SESSION['id_variant'][$i];
                            };
                            
                            $_SESSION['id_cart'] = $arr_remove_id ;
                            $_SESSION["quantity_pro_cart"] = $arr_remove_sl ;
                            $_SESSION['id_variant'] = $arr_remove_id_var;

                            setcookie('id_cart', json_encode($_SESSION['id_cart']), time()+3000000);
                            setcookie('quantity_pro_cart', json_encode($_SESSION['quantity_pro_cart']), time()+3000000);
                            setcookie('id_variant', json_encode($_SESSION['id_variant']), time()+3000000);

                        }
                        else if(isset($_POST['remove_cart']) && isset($_SESSION['id_cart']) && !is_array($_SESSION['id_cart']))
                        {
                            unset($_SESSION['id_cart']);
                            unset($_SESSION["quantity_pro_cart"]);
                            unset($_SESSION['id_variant']);
                            setcookie('id_cart',"", time()-3000000);
                            setcookie('quantity_pro_cart',"", time()-3000000);
                            setcookie('id_variant',"", time()-3000000);
                        }
                        ;
                        $hanghoa = select_all_product_atrri() ;
                        include './view/client/cart.php';
                        
                    break;
                case 'recharge':
                        include './view/client/recharge.php';
                    break;
                    case 'search':
                        if(isset($_GET['iddm'])){
                            $iddm = $_GET['iddm'];
                        }else{
                            $iddm = '';
                        };
                        if(isset($_POST['btn_search'])){
                            $key = $_POST['search'];
                        }else{
                            $key = '';
                        }
                        $ProductsHome = select_sp($key,$iddm);
                        include './view/client/search.php';
                        break;
                    case 'admin':
                        include './view/admin/';
                    break;
                case 'logout':
                    if(isset($_SESSION['user'])){
                        session_destroy();
                        header('Location:index.php');
                        die;
                    }
                    break;
                case 'forgotPassword':
                    if(isset($_POST['ranCode'])){
                        $email = $_POST['email'];
                        $user = forgetpass($email);
                        if(!is_array($user)){
                            $message = 'Email không tồn tại';
                            include_once './view/client/user/forgot_password.php';
                        }
                        if(is_array($user)){
                            $_SESSION['forEmail'] = $user['email'];
                            echo $_SESSION['forEmail'];
                            $_SESSION['code'] = rand(100000,999999);
                            setcookie('forEmail', $_SESSION['code'],time()+(3000));
                            sendmail($user['user_name'],$user['email'],'Mã xác nhận của bạn là: '.$_SESSION['code'],'Thegioialo','Mã xác nhận');
                            $message = 'Đã gửi mã xác nhận. Vui lòng kiểm tra email. Mã xác nhận có hiệu lực trong 5 phút';
                            header('Location: index.php?act=otp');
                        }
                    }
                    
                    include_once './view/client/user/forgot_password.php';
                    break;
                case 'otp':
                    if(isset($_POST['login'])){
                        $code = $_POST['code'];
                        if (isset($_COOKIE['forEmail'])){
                            if($code != $_COOKIE['forEmail']){
                                $message = 'Mã xác nhận không chính xác';
                                include_once './view/client/user/otp.php';
                            }else{
                                header('Location: index.php?act=changePass');
                            }
                        }
                    }
                    include_once './view/client/user/otp.php';
                    break;
                case 'changePass':
                    if(isset($_POST['pass'])){
                        $password = $_POST['password'];
                        $passwords = $_POST['passwords'];
                        $er = [];
                        if(!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[\!\@\#\$%\^\*\(\)-\+]).{8,30}$/',$password)){
                            $er['password']='mật khẩu yếu';
                        }
                        if($password != $passwords){
                            $er['password']='Mật khẩu nhập lại không đúng';
                        }
                        if(array_filter($er)){
                            include './view/client/user/changePass.php';
                        }
                        if(!array_filter($er) && isset($_SESSION['forEmail'])){
                            changePass($_SESSION['forEmail'], $password);
                            $message = 'Đổi mật khẩu thành công';
                            header('Location: index.php');
                        }
                    }
                    include './view/client/user/changePass.php';
                    break;
                    case 'search_order':
                        
                        include './view/client/search_order.php';
                        break;
                    case 'details_order':

                            if(isset($_GET['id_order']))
                            {
                                $id_order = $_GET['id_order'];
                                $order = select_one_order_id($id_order);
                                $order_details = get_all_order_details($id_order);
                            };
                            // xem chi tiết đơn hàng từ trang info user
                            if(isset($_POST['search_order'])&& isset($_POST['search_order_value']) && !empty($_POST['search_order_value']))
                            {
                                $id_order = $_POST['search_order_value'];
                                $order = select_one_order_id($id_order);
                                $order_details = get_all_order_details($id_order);
                                
                            };
                            // xem chi tiết đơn hàng từ trang tìm kiếm đơn hàng .
                            $hanghoa = select_all_product_atrri() ;
                            include './view/client/details_order.php';
                            break;
                case 'editUser':
                    if(isset($_GET['id'])){
                        $user = select_one_ad($_GET['id']);
                    }
                    include './view/client/user/edit.php';
                    break;
                case 'update_user':
                    if(isset($_POST['edit_user'])){
                        $id = $_POST['id_user'];
                        $fullname = $_POST['name'] ;
                        $useName = $_POST['name-login'] ;
                        $email_user = $_POST['email_user'] ;
                        $phone =  $_POST['phone'] ;
                        $_err_add_khach_hang = [];
                        if(empty($fullname)){
                            $_err_add_khach_hang['fullname_user'] = "Bạn chưa nhập tên";
                        };

                        if(!preg_match('/^[A-Za-z\s]+$/u',$useName)){
                            $_err_add_khach_hang['name-login'] = "bạn chưa nhập tên đăng nhập";
                        };

                        if($email_user == ""){
                            $_err_add_khach_hang['email_user'] = "bạn chưa nhập email";
                        }
                        else if(!filter_var($email_user, FILTER_VALIDATE_EMAIL))
                        {
                            $_err_add_khach_hang['email_user'] = "bạn chưa nhập đúng định dạng email";
                        }
                        if(!preg_match('/^(0|\+84)[0-9]{9}$/', $phone)){
                            $_err_add_khach_hang['phone'] = "bạn chưa nhập số điện thoại";
                        };
                        if(array_filter($_err_add_khach_hang)){
                            $user = select_one_ad($id);
                            include_once './view//client/user/edit.php';
                        }
                        if(!array_filter($_err_add_khach_hang))
                        {
                            edit_user($useName,$fullname,$email_user,$phone,'','','','',$id);
                            $mesages = "thêm khách hàng thành công" ;   
                            $user = select_one_ad($id);
                            include_once './view//client/user/edit.php';
                        }
                    }
                    break;
            default:
                include './main.php';
                break;
        }
    }else{
        include './main.php';
    }
    include './footer.php';
    
?>