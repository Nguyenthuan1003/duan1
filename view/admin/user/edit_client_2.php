

    <main>
        <div class="container-client">
        <div class="add-client-1">
            <button class="btn btn-primary">update khách hàng</button>
        </div>
        <form action="index.php?id_menu=update_user" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">mã khách hàng</label>
                        <input type="hidden" name="id_user" value="<?=$user['id_user']?>">
                        <input type="text" class="form-control" value="<?=$user['id_user']?>">
                    </div>
                    <div class="form-group">
                        <label for="">tên khách hàng</label>
                        <input type="text" class="form-control" name="name" value="<?=isset($user['full_name']) ? $user['full_name'] : '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="">tên đăng nhập</label>
                        <input type="text" class="form-control" name="name-login" value="<?=isset($user['user_name']) ? $user['user_name'] : '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="">email</label>
                        <input type="text" class="form-control" name="email_user" value="<?=isset($user['email']) ? $user['email'] : '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="">số dư tài koản</label>
                        <input type="text" class="form-control" name="accont_balance" value="<?=isset($user['accont_balance']) ? $user['accont_balance'] : '' ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">số điện thoại</label>
                        <input type="text" class="form-control" name="phone" value="<?=isset($user['sdt']) ? $user['sdt'] : '' ?>">
                    </div>
                    <div class="form-group">
                        <label for="">mật khẩu </label>
                        <input type="password" class="form-control" name="password" value="<?=isset($user['password']) ? $user['password'] : '' ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="">vai trò</label>
                        <select name="role" id="" class="form-control">
                            <?php if($user['role'] == 1) : ?>
                                <option value="0">Khách hàng</option>
                                <option value="1" selected>Nhân viên</option>
                            <?php else : ?>
                                <option value="0" selected>Khách hàng</option>
                                <option value="1">Nhân viên</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">ngày đăng kí</label>
                        <input type="date" class="form-control" name="created_date_user" value="<?=isset($user['created_date_user']) ? $user['created_date_user'] : '' ?>">
                    </div>
                    
                </div>

                <div class="button-add-client-2">

                    <a href="">
                        <button type="submit" class="btn btn-outline-primary" name="edit_user">Lưu</button>
                    </a>

                    <a href="">
                        <button type="button" class="btn btn-outline-primary">Nhập lại</button>
                    </a>

                    <a href="">
                        <button type="button" class="btn btn-outline-primary">Danh sách</button>
                    </a>


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