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
                        $_SESSION['user'] = $user;
                        include './main.php';
                    }else{
                        include './view/client/user/login.php';
                    }
                }else{
                    include './view/client/user/login.php';
                }
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
                            insert_user($name,$email,$parrword,"","","",$date);
                            $message='đăng kí thành công';

                        }
                    }
                    include './view/client/user/registe.php';
                    break;
                case 'pay':
                    $sql = "SELECT * FROM products";
                    $hanghoa = pdo_query($sql) ;
                        include './view/client/pay.php';
                    break;
                    case 'blog':
                        $blog = select_all_blog() ;
                        include './view/client/blogs.php';
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
                        $arr_cart = [];
                        if(isset($_SESSION["cart"])){
                           $arr_cart = $_SESSION['cart'];
                        }else{
                            $arr_cart = [];
                        };

                        if(isset($_GET["id_pro"])){
                            $arr_cart[] = $_GET["id_pro"];
                            $_SESSION["cart"] = $arr_cart ;
                        };
                       
                         $sql = "SELECT * FROM products";
                        $hanghoa = pdo_query($sql) ;
                        include './view/client/cart.php';
                        
                    break;
                case 'recharge':
                        include './view/client/recharge.php';
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