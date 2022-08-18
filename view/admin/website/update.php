<main>
    <div class="container">
        <form action="index.php?id_menu=update_web" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <p>Id website</p>
                    <input type="hidden" name="id" value="<?=isset($websetting['id']) ? $websetting['id'] : '' ?>">
                    <input type="text" value="<?=isset($websetting['id']) ? $websetting['id'] : '' ?>" disabled class="form-control">
                </div>
                <div class="col-md-6">
                    <p>Tên website</p>
                    <input type="text" class="form-control" name="nameWeb" value="<?=isset($websetting['site_title']) ? $websetting['site_title'] : '' ?>">
                </div>
                <div class="col-md-6">
                    <p>Logo</p>
                    <img src="<?=isset($websetting['logo']) ? $websetting['logo'] : '' ?>" alt="">
                    <input type="file" class="form-control" name="logo">
                </div>
                <div class="col-md-6">
                    <p>Email</p>
                    <input type="text" class="form-control" name="email" value="<?=isset($websetting['email1']) ? $websetting['email1'] : '' ?>">
                </div>
                <div class="col-md-6">
                    <p>Điện thoại tư vấn</p>
                    <input type="text" class="form-control" name="phone1" value="<?=isset($websetting['phone1']) ? $websetting['phone1'] : '' ?>">
                </div>
                <div class="col-md-6">
                    <p>Điện thoại hỗ trợ kỹ thuật</p>
                    <input type="text" class="form-control" name="phone2" value="<?=isset($websetting['phone2']) ? $websetting['phone2'] : '' ?>">
                </div>
                <div class="col-md-6">
                    <p>Link fanpage</p>
                    <input type="text" class="form-control" name="facebook" value="<?=isset($websetting['fb_link']) ? $websetting['fb_link'] : '' ?>">
                </div>
                <div class="col-md-6">
                    <p>Link youtobe</p>
                    <input type="text" class="form-control" name="youtobe" value="<?=isset($websetting['yt_link']) ? $websetting['id'] : '' ?>">
                </div>
            </div>
            <div class="btn-form">
                <input type="submit" value="Cập nhật" name="updateWeb">
                <input type="reset" value="Nhập lại">
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

