<main>
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <p>Mã biến thể</p>
                    <input type="text" value="auto" disabled class="form-control">
                </div>
                <div class="col-md-6">
                    <p>Tên biến thể</p>
                    <input type="text" class="form-control" name="name_variant">
                </div>
                <div class="col-md-6">
                    <p>Ảnh biến thể</p>
                    <input type="file" class="form-control" name="image_variant">
                </div>
            </div>
            <div class="btn-form">
                <input type="submit" value="Thêm" name="add_variant">
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

