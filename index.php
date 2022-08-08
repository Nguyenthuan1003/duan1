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
    include "./model/voucher.php";
    include "./model/order.php";
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
                        include './main.php';
                        
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
                            $err['city'] = "bạn chưa nhập thành phố";
                        };
                        if($district =="")
                        {
                            $err['district'] = "bạn chưa nhập Quận / Huyện";
                        };
                        if( $wards =="")
                        {
                            $err['wards'] = "bạn chưa nhập Phường / Xã";
                        };
                        if( $apartmentNumber =="")
                        {
                            $err['apartmentNumber'] = "bạn chưa nhập số nhà";
                        };

                        if(empty($err) && $method_payment === "thanh toán khi nhận hàng"){
                            $date = date("d/m/Y") ;
                            insert_order($user_name,$apartmentNumber.'-'.$wards.'-'.$district.'-'.$city,$date,isset( $_SESSION['voucher'])? $_SESSION['voucher']:'', $total_price ,$phoneNumber ,$email, isset($_SESSION['user'])?$_SESSION['user']['id_user']:"");
                            $order = select_one_order($email,$date) ;
                            $id_order = $order['id_order'];

                            
                            for($i = 0 ; $i< count($_SESSION['id_cart']) ;$i++)
                            {
                                $sp = load_one_pro($_SESSION['id_cart'][$i]);
                                insert_order_details($id_order,$_SESSION['id_cart'][$i],$_SESSION["quantity_pro_cart"][$i],$sp['price_default'],$sp['price_default']);
                            };

                            header("location:index.php?act=ordered&&id_order=$id_order");
                            
                           
                            

                        }


                    }

                    $sql = "SELECT * FROM products";
                    $hanghoa = pdo_query($sql) ;
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
                            $order_details =get_all_order_details($id_order);
                            
                        };
                        $hanghoa = select_all_pro() ;
                        include './view/client/ordered.php';
                    break;
                case 'info-user':
                    if(isset($_SESSION['user'])&&is_array($_SESSION['user'])){
                        $user = $_SESSION['user'];
                    }
                        include './view/client/user/info_user.php';
                    break;
                case 'chitiet':
                        $id = $_GET['id_pro'];
                        $pro = load_one_pro($id);
                        include './view/client/detail_product.php';
                    break;
                case 'quen_mat_khau':
                        include './view/client/forgot_password.php';
                    break;
                case 'cart':

                        if(isset($_GET['id_pro']) && empty($_SESSION['id_cart'])){
                
                            $arr_cart = [
                                'id' => $_GET['id_pro'],
                                'quantity' => 1
                                
                            ];
                            $_SESSION['id_cart'] = $arr_cart['id'] ;
                            $_SESSION['quantity_pro_cart'] = $arr_cart['quantity'] ;  
                           

                        }
                        else if(isset($_GET['id_pro']) && !empty($_SESSION['id_cart'])){
                            $id_add_pro = $_GET['id_pro'];
                          
                            if(!is_array($_SESSION['id_cart'])){
                                if($id_add_pro === $_SESSION['id_cart']){                 
                                        $_SESSION["quantity_pro_cart"] += 1;
                                }
                                else{
                                    $arr_cart_ = [
                                        'id' => $id_add_pro,          
                                    ];
    
                                    $arr_id_cart = array();
                                    $arr_id_cart[] = $_SESSION['id_cart'];
                                    $arr_id_cart [] = $arr_cart_['id'];
                                    // push id product vào mảng
                                    $arr_quantity_pro_cart = array();
                                    $arr_quantity_pro_cart[] =  $_SESSION['quantity_pro_cart'];
                                    $arr_quantity_pro_cart [] = 1 ;
                                   
                                    $_SESSION['id_cart'] = $arr_id_cart;
                                    $_SESSION['quantity_pro_cart'] = $arr_quantity_pro_cart;
                                }
                            }else{
                                 if(in_array($id_add_pro,$_SESSION['id_cart']))
                                  {
                                     for($i = 0 ; $i < count($_SESSION['id_cart']) ; $i++){
                                      {
                                         if($id_add_pro == $_SESSION["id_cart"][$i] )
                                            {
                                              $_SESSION["quantity_pro_cart"][$i] += 1 ;     
                                            };
                                      } 
                                  }
                                }
                                  else if(!in_array($id_add_pro,$_SESSION['id_cart'])){
                                
                                    $arr_cart = [
                                        'id' => $id_add_pro,
                                        'quantity' => 1
                                        
                                    ];
    
                                    $arr_id_cart = array();
                                    $arr_id_cart = $_SESSION['id_cart'] ;
                                    $arr_id_cart[] = $arr_cart['id'];
                                    // push id product vào mảng 
    
                                    $arr_quantity_pro_cart = array();
                                    $arr_quantity_pro_cart =  $_SESSION['quantity_pro_cart'];
                                    $arr_quantity_pro_cart[] = 1 ;
                                   
                                    $_SESSION['id_cart'] = $arr_id_cart;
                                    $_SESSION['quantity_pro_cart'] = $arr_quantity_pro_cart;
                                   
    
                                }
                            }

                            
                        };   
                        // lưu id product từ trang main vào session
                        
                        if(isset($_POST['edit_cart']) && isset($_SESSION['id_cart']) && is_array($_SESSION['id_cart']) )
                        {
                            $id_pro = $_POST['edit_idpro_cart'] ;
                            $quantity_pro = $_POST['qantit_pro'];
                            for( $i = 0 ; $i < count($_SESSION['id_cart']) ; $i++){
                                if($_SESSION['id_cart'][$i] == $id_pro)
                                {
                                    $_SESSION["quantity_pro_cart"][$i] =  $quantity_pro ;
                                }
                            }
                        }
                        else if(isset($_POST['edit_cart']) && isset($_SESSION['id_cart']) && !is_array($_SESSION['id_cart']))
                        {
                            $id_pro = $_POST['edit_idpro_cart'] ;
                            $quantity_pro = $_POST['qantit_pro'];
                            $_SESSION["quantity_pro_cart"] =  $quantity_pro ;
                        }
                        // cập nhập số lượng trong trang cart   
                        
                        if(isset($_POST['remove_cart']) && isset($_SESSION['id_cart']) && is_array($_SESSION['id_cart']) )
                        {
                            $id_pro = $_POST['remove_idpro_cart'] ;

                            $arr_remove_id = array();
                            $arr_remove_sl = array();
                            
                            for( $i = 0 ; $i < count($_SESSION['id_cart']) ; $i++){
                                if($i == $id_pro)
                                {
                                  continue ;                                   
                                };
                                $arr_remove_id[] = $_SESSION['id_cart'][$i] ;
                                $arr_remove_sl [] = $_SESSION["quantity_pro_cart"][$i] ;
                            };
                            

                            $_SESSION['id_cart'] = $arr_remove_id ;
                            $_SESSION["quantity_pro_cart"] = $arr_remove_sl ;

                        }
                        else if(isset($_POST['remove_cart']) && isset($_SESSION['id_cart']) && !is_array($_SESSION['id_cart']))
                        {
                            $_SESSION['id_cart'] = '';
                            $_SESSION["quantity_pro_cart"] = '';
                            
                        }
                        ;
                        $hanghoa = select_all_pro() ;
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
            default:
                include './main.php';
                break;
        }
    }else{
        include './main.php';
    }
    include './footer.php';
    
?>