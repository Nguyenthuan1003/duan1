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
                        include './main.php';
                    }else{
                        include './view/client/login.php';
                    }
                }
                    include './view/client/login.php';
                break;
                case 'registe':
                    if(isset($_POST['registe']) && $_POST['registe']){
                        $name=$_POST['name'];
                        $email=$_POST['email'];
                        $password=$_POST['password'];
                        $enterThePassword=$_POST['enterThePassword'];
                        $error=[];
                        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $error['email']='email không đúng';
                        }
                        if(!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[\!\@\#\$%\^\*\(\)-\+]).{8,30}$/',$password)){
                            $error['password']='mật khẩu yếu';
                        }
                        if(!preg_match('/^[A-Z]+[A-Za-z0-9_\-\s]*$/u',$name)){
                            $error['name'] ='bắt buộc bằng chữ cái inhoa';
                        }
                        if($password != $enterThePassword ){
                            $error['enterThePassword']='mật khẩu nhập lại không đúng';
                        }
                        if(!array_filter($error)){
                            insert_user($name,$email,$password);
                            $message='đăng kí thành công';

                        }
                    }
                    include './view/client/registe.php';
                    break;
                case 'pay':
                        include './view/client/pay.php';
                    break;
<<<<<<< Updated upstream
                case 'blog':
                    $blog = select_all_blog() ;
                    include './view/client/blogs.php';
=======
                    case 'blog':
                        $blog = select_all_blog() ;
                        include './view/client/blogs.php';
                    break;
                case 'info-user':
                        include './view/client/info_user.php';
>>>>>>> Stashed changes
                    break;
            default:
                include './main.php';
        }
    }else{
        include './main.php';
    }
    include './footer.php';
    
?>