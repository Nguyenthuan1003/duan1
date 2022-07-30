<?php
    include_once '../../model/PDO.php';
    include_once '../../model/users.php';
    include_once '../../model/danhmuc.php';
    include_once './header.php';
    if(isset($_GET['id_menu'])){
        $id_menu=$_GET['id_menu'];
        switch ($id_menu) {
            case 'user':
                $user=select_all();
                include_once './user/list_client.php';
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
                    $path = pathinfo($image['name'],PATHINFO_EXTENSION);
                    $er = [];
                    if(!preg_match('/^[A-Z][\w\s][^_]+$/', $name)){
                        $er['name'] = $name.' tên sản phẩm Không hợp lệ';
                    }
                    if(!preg_match('/^[\d]+$/', $price) || $price > 0){
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
                        move_uploaded_file($image['tmp_name'], $targets);
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
            default:
                # code...
                break;
        }
    }else{
        include_once 'main.php';
    }
    include_once './footer.php';


?>