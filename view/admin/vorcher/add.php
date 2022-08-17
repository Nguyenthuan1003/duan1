<main>
    <div class="container">
        <form action="" method="post">
            <div class="row">
                <div class="col-md-6">
                    <p>Mã vorcher</p>
                    <input type="text" value="auto" disabled class="form-control">
                </div>
                <div class="col-md-6">
                    <p>Tên Vorcher</p>
                    <input type="text" class="form-control" name="nameVocher">
                </div>
                <div class="col-md-6">
                    <p>Số lượng vorcher</p>
                    <input type="text" class="form-control" name="quantityVorcher">
                </div>
                <div class="col-md-6">
                    <p>Ngày hết hạn</p>
                    <input type="date" class="form-control" name="dateVocher">
                </div>
                <div class="col-md-6">
                    <p>Giá trị vorcher(%)</p>
                    <input type="number" class="form-control" name="valueVorcher">
                </div>
            </div>
            <div class="btn-form">
                <input type="submit" value="Thêm" name="add_vorcher">
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

