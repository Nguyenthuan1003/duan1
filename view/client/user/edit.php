<main>
        <div class="container-client">
            <form action="index.php?act=update_user" method="post">
                <h3>Cập nhật tài khoản</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">ID tài khoản</label>
                            <input type="hidden" name="id_user" value="<?=$user['id_user']?>">
                            <input type="text" class="form-control" disabled value="<?=$user['id_user']?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Họ và tên</label>
                            <input type="text" class="form-control" name="name" value="<?=isset($user['full_name']) ? $user['full_name'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">tên đăng nhập</label>
                            <input type="text" class="form-control" name="name-login" value="<?=isset($user['user_name']) ? $user['user_name'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email_user" value="<?=isset($user['email']) ? $user['email'] : '' ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Số điện thoại</label>
                            <input type="text" class="form-control" name="phone" value="<?=isset($user['sdt']) ? $user['sdt'] : '' ?>">
                        </div>
                    </div>
                </div>
                    <div class="button-add-client-2">
                        <a href="">
                            <button type="submit" class="btn btn-outline-primary" name="edit_user">Cập nhật</button>
                        </a>
                            <button type="reset" class="btn btn-outline-primary">Nhập lại</button>
                    </div>
            </form>
            <?php 
                if(isset($_err_add_khach_hang)){
                    foreach($_err_add_khach_hang as $e){
                        echo '<br>';
                        echo $e;
                    }
                }
            ?>
        </div>
    </main>