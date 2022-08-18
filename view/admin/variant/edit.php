<main>
    <div class="container">
        <form action="index.php?id_menu=update_variant" method="post">
            <div class="row">
                <div class="col-md-12">
                    <p>Mã biến thể</p>
                    <input type="hidden" name="id_var" value="<?=$variant['id_variant']?>">
                    <input type="text" value="<?=$variant['id_variant']?>" disabled class="form-control">
                </div>
                <div class="col-md-6">
                    <p>Màu sắc</p>
                    <input type="text" class="form-control" name="color_variant" value="<?=isset($variant['color_variant']) ? $variant['color_variant'] : '' ?>">
                </div>
                <div class="col-md-6">
                    <p>Phiên bản</p>
                    <input type="text" class="form-control" name="version_variant" value="<?=isset($variant['version_variant']) ? $variant['version_variant'] : '' ?>">
                </div>
            </div>
            <div class="btn-form">
                <input type="submit" value="Cập nhật" name="edit_variants">
                <input type="reset" value="Nhập lại">
                <a href="index.php?id_menu=variant"><button type="button">Danh sách</button></a>
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
