<main>
    <div class="container">
        <form action="index.php?id_menu=update_vorcher" method="post">
            <div class="row">
                <div class="col-md-6">
                    <p>Mã vorcher</p>
                    <input type="hidden" value="<?=isset($vorcher['id_vorcher']) ? $vorcher['id_vorcher'] : '' ?>" name="idVorcher">
                    <input type="text" value="<?=isset($vorcher['id_vorcher']) ? $vorcher['id_vorcher'] : '' ?>" disabled class="form-control">
                </div>
                <div class="col-md-6">
                    <p>Tên Vorcher</p>
                    <input type="text" class="form-control" name="nameVocher" value="<?=isset($vorcher['name_vorcher']) ? $vorcher['name_vorcher'] : '' ?>">
                </div>
                <div class="col-md-6">
                    <p>Số lượng vorcher</p>
                    <input type="text" class="form-control" name="quantityVorcher" value="<?=isset($vorcher['quantity_limit']) ? $vorcher['quantity_limit'] : '' ?>">
                </div>
                <div class="col-md-6">
                    <p>Ngày hết hạn</p>
                    <input type="date" class="form-control" name="dateVocher" value="<?=isset($vorcher['expiration_date']) ? $vorcher['expiration_date'] : '' ?>">
                </div>
                <div class="col-md-6">
                    <p>Giá trị vorcher(%)</p>
                    <input type="number" class="form-control" name="valueVorcher" value="<?=isset($vorcher['coupon_value']) ? $vorcher['coupon_value'] : '' ?>">
                </div>
            </div>
            <div class="btn-form">
                <input type="submit" value="Cập nhật" name="edit_vorcher">
                <input type="reset" value="Nhập lại">
                <a href="index.php?id_menu=vorcher"><button type="button">Danh sách</button></a>
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

