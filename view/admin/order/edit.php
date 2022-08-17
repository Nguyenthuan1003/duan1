<main>
    <div class="container">
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
                        <?php if(isset($pro['status_order'])) : ?>
                            <?php if($pro['status_order'] == 0) : ?>
                                <option value="0" selected>Chờ xử lý</option>
                                <option value="1">Đã xác nhận</option>
                                <option value="1">Đã giao hàng</option>
                            <?php elseif($pro['status_order'] == 1): ?>
                                <option value="0">Chờ xử lý</option>
                                <option value="1" selected>Đã xác nhận</option>
                                <option value="1">Đã giao hàng</option>
                            <?php else : ?>
                                <option value="0">Chờ xử lý</option>
                                <option value="1">Đã xác nhận</option>
                                <option value="1" selected>Đã giao hàng</option>
                            <?php endif; ?>
                        <?php endif; ?>
                    </select>
                </div>
            </div>
            <div class="btn-form">
                <input type="submit" value="Cập nhật" name="edit_od">
                <input type="reset" value="Nhập lại">
                <a href="index.php?id_menu=order"><button type="button">Danh sách</button></a>
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