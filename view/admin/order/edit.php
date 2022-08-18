<main>
    <div class="container">
<<<<<<< HEAD
        <form action="index.php?id_menu=update_products" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <p>Mã hàng hóa</p>
                    <input type="text" value="<?=$pro['id_pro']?>" disabled class="form-control">
                </div>
                <div class="col-md-6">
                    <p>Giá</p>
                    <input type="text" class="form-control" name="price_pro" value="<?=isset($pro['price_default']) ? $pro['price_default'] : '' ?>">
                </div>
                <div class="col-md-6">
                    <p>Tên hàng hóa</p>
                    <input type="text" class="form-control" name="name_pro" value="<?=isset($pro['pro_name']) ? $pro['pro_name'] : '' ?>">
                </div>
                <div class="col-md-6">
                    <p>Trạng thái</p>
                    <select name="status_pro" id="" class="form-control">
                        <?php if(isset($pro['status'])) : ?>
                            <?php if($pro['status'] == 0) : ?>
                                <option value="0" selected="selected">Còn hàng</option>
                                <option value="1">Hết hàng</option>
                            <?php else : ?>
                                <option value="0">Còn hàng</option>
                                <option value="1"  selected="selected">Hết hàng</option>
                            <?php endif; ?>
                        <?php else : ?>
                            <option value="0">Còn hàng</option>
                            <option value="1">Hết hàng</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <p>Tên loại hàng</p>
                    <select name="category_pro" id="" class="form-control">
                        <?php foreach($cate as $ct) : ?>
                                <option value="<?=$ct['id_cate']?>" <?=$ct['id_cate']==$pro['id_cate'] ? 'selected' : '' ?>><?=$ct['cate_name']?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="">
                        <p>Ngày đăng</p>
                        <input type="date" class="form-control" name="date_pro">
                    </div>
                    <div class="">
                        <p>Ảnh</p>
                        <input type="file" class="form-control" name="image_pro" value="<?=isset($pro['images_default']) ? $pro['images_default'] : '' ?>">
                    </div>
                </div>
                    <div class="col-md-6">
                        <p>Mô tả</p>
                        <textarea name="des_pro" id="" cols="65" rows="8"><?=isset($pro['description']) ? $pro['description'] : '' ?></textarea>
                    </div>
            </div>
            <div class="btn-form">
                <input type="hidden" name="id_pro" value="<?=$pro['id_pro']?>">
                <input type="submit" value="Cập nhật" name="edit_pro">
                <input type="reset" value="Nhập lại">
                <a href="index.php?product"><button>Danh sách</button></a>
=======
        <form action="index.php?id_menu=update_order" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <p>Mã đơn hàng</p>
                    <input type="hidden" name="id_od" value="<?=$pro['id_order']?>">
                    <input type="text" value="<?=$pro['id_order']?>" disabled class="form-control">
                </div>
                <div class="col-md-6">
                    <p>Người đặt hàng</p>
                    <input type="text" class="form-control" name="user_name" value="<?=isset($pro['name_order']) ? $pro['name_order'] : '' ?>">
                </div>
                <div class="col-md-6">
                    <p>Địa chỉ</p>
                    <input type="text" class="form-control" name="address" value="<?=isset($pro['address_order']) ? $pro['address_order'] : '' ?>">
                </div>
                <div class="col-md-6">
                    <p>Trạng thái</p>
                    <select name="status_od" id="" class="form-control">
                            <?php if($pro['status_order'] == 0) : ?>
                                <option value="0" selected>Chờ xử lý</option>
                                <option value="1">Đã xác nhận</option>
                                <option value="2">Đã giao hàng</option>
                            <?php else : ?>
                                <?php if($pro['status_order'] == 1): ?>
                                    <option value="0">Chờ xử lý</option>
                                    <option value="1" selected>Đã xác nhận</option>
                                    <option value="2">Đã giao hàng</option>
                                <?php else : ?>
                                    <option value="0">Chờ xử lý</option>
                                    <option value="1">Đã xác nhận</option>
                                    <option value="2" selected>Đã giao hàng</option>
                                <?php endif; ?>
                            <?php endif; ?>
                    </select>
                </div>
            </div>
            <div class="btn-form">
                <input type="submit" value="Cập nhật" name="edit_od">
                <input type="reset" value="Nhập lại">
                <a href="index.php?id_menu=order"><button type="button">Danh sách</button></a>
>>>>>>> b3e389f883e2345a7695749517d8840f393c1c15
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
<<<<<<< HEAD
            ?>
    </div>
</main>

=======
        ?>
    </div>
</main>
>>>>>>> b3e389f883e2345a7695749517d8840f393c1c15
