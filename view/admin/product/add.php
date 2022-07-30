<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<main>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <p>Mã hàng hóa</p>
                    <input type="text" value="auto" disabled class="form-control">
                </div>
                <div class="col-md-6">
                    <p>Giá</p>
                    <input type="text" class="form-control" name="price_pro">
                </div>
                <div class="col-md-6">
                    <p>Tên hàng hóa</p>
                    <input type="text" class="form-control" name="name_pro">
                </div>
                <div class="col-md-6">
                    <p>Trạng thái</p>
                    <select name="status_pro" id="" class="form-control">
                        <option value="" hidden></option>
                        <option value="0">Còn hàng</option>
                        <option value="1">Hết hàng</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <p>Tên loại hàng</p>
                    <select name="category_pro" id="" class="form-control">
                        <option value="" hidden></option>
                        <?php foreach($cate as $ct) : ?>
                        <option value="<?=$ct['id_cate']?>"><?=$ct['cate_name']?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="">
                        <p>Ngày đăng</p>
                        <input type="date" class="form-control" name="date_pro">
                    </div>
                    <div class="">
                        <p>Ảnh</p>
                        <input type="file" class="form-control" name="image_pro">
                    </div>
                </div>
                    <div class="col-md-6">
                        <p>Mô tả</p>
                        <textarea name="des_pro" id="" cols="88" rows="8"></textarea>
                    </div>
            </div>
            <div class="btn-form">
                <input type="submit" value="Thêm" name="add_pro">
                <input type="reset" value="Nhập lại">
                <a href=""><button>Danh sách</button></a>
            </div>
            <?php
                if(isset($message)&&$message!=""){
                    echo $message;
                }
                if(isset($er)&&$er!=""){
                    foreach($er as $e){
                        echo $e.'</br>';
                    }
                }
            ?>
        </form>
    </div>
</main>
</body>
</html>
