<main>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <p>Sản phẩm</p>
                    <select name="product" id="" class="form-control">
                        <option value="" hidden></option>
                        <?php foreach($product as $pro) : ?>
                        <option value="<?=$pro['id_pro']?>"><?=$pro['pro_name']?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                    <div class="col-md-6">
                        <p>Chọn biến thể</p>
                        <select name="variant" id="" class="form-control">
                            <option value="" hidden></option>
                            <?php foreach($variant as $v) : ?>
                                <option value="<?=$v['id_variant']?>"><?=$v['color_variant']?> <?=$v['version_variant']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <div class="col-md-6">
                    <p>Số lượng</p>
                    <input type="text" class="form-control" name="quantity_variant">
                </div>
                <div class="col-md-6">
                    <p>Giá</p>
                    <input type="text" class="form-control" name="price_variant">
                </div>
                <div class="col-md-6">
                    <p>Sale</p>
                    <input type="text" class="form-control" name="sale_variant">
                </div>
                <div class="col-md-6">
                    <p>Ảnh</p>
                    <input type="file" class="form-control" name="image_variant[]" multiple>
                </div>
                <div class="col-md-12">
                    <p>Tính năng đặc biệt</p>
                    <textarea name="special_features" id="" cols="136" rows="10"></textarea>
                </div>
            </div>
            <div class="btn-form">
                <input type="submit" value="Thêm" name="add_variant_detail">
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