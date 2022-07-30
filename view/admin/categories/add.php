<main>
<div class="container">
    <form action="" method="post">
        <div class="row">
            <div class="col-md-6">
                <p>Mã loại hàng</p>
                <input type="text" value="auto" disabled class="form-control">
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <p>Tên loại hàng</p>
                <input type="text" class="form-control" name="cate_name">
            </div>
        </div>
        <div class="btn-form p-2">
            <input type="submit" value="Thêm" name="add_cate">
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
</main>