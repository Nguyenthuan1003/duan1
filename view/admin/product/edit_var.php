<main>
    <div class="container">
        <form action="index.php?id_menu=upload_pro_var" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <p>Sản phẩm</p>
                    <select name="product" id="" class="form-control" style="pointer-events: none;">
                        <?php foreach($product as $pro) : ?>
                        <option value="<?=$pro['id_pro']?>" <?=$pro['id_pro']==$var['id_pro'] ? 'selected' : '' ?>><?=$pro['pro_name']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                    <div class="col-md-6">
                        <p>Chọn biến thể</p>
                        <select name="variant" id="" class="form-control" style="pointer-events: none;">
                            <?php foreach($variant as $v) : ?>
                                <option value="<?=$v['id_variant']?>" <?=$v['id_variant']==$var['id_variant'] ? 'selected' : '' ?>><?=$v['color_variant']?> <?=$v['version_variant']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <div class="col-md-6">
                    <p>Số lượng</p>
                    <input type="text" class="form-control" name="quantity_variant" value="<?=isset($var['quantity']) ? $var['quantity'] : '' ?>">
                </div>
                <div class="col-md-6">
                    <p>Giá</p>
                    <input type="text" class="form-control" name="price_variant" value="<?=isset($var['price']) ? $var['price'] : '' ?>">
                </div>
                <div class="col-md-6">
                    <p>Sale</p>
                    <input type="text" class="form-control" name="sale_variant" value="<?=isset($var['sale']) ? $var['sale'] : '' ?>">
                </div>
                <div class="col-md-6">
                    <p>Ảnh</p>
                    <input type="file" class="form-control" name="image_variant[]" multiple>
                </div>
                <div class="col-md-12">
                    <p>Tính năng đặc biệt</p>
                    <textarea name="special_features" id="" cols="136" rows="10"><?=isset($var['special_features']) ? $var['special_features'] : '' ?></textarea>
                </div>
            </div>
            <div class="btn-form">
                <input type="submit" value="Cập nhật" name="edit_var_detail">
                <input type="reset" value="Nhập lại">
                <a href="index.php?id_menu=pro_variant"><button type="button" class="btn btn-primary">Danh sách</button></a>
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
    </div>
</main>