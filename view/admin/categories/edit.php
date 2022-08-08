<main>
<div class="container">
    <form action="index.php?id_menu=update_dm" method="post">
        <div class="row">
            <div class="col-md-6">
                <p>Mã loại hàng</p>
                <input type="number" disabled class="form-control" value="<?=isset($cate['id_cate']) ? $cate['id_cate'] : ''?>">
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <p>Tên loại hàng</p>
                <input type="text" class="form-control" name="cate_name" value="<?=$cate['cate_name']?>">
            </div>
        </div>
        <div class="btn-form p-2">
            <input type="hidden" name="idcate" value="<?=$cate['id_cate']?>">
            <input type="submit" value="Cập nhật" name="edit_cate">
            <input type="reset" value="Nhập lại">
            <a href="index.php?id_menu=type"><button type="button" class="btn btn-primary">Danh sách</button></a>
        </div>  
    </form>
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
</main>