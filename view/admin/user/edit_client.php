

    <main>
        <div class="container-client">
        <div class="add-client-1">
            <button class="btn btn-primary">update khách hàng</button>
        </div>
        <form action="index.php?id_menu=user" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" hidden name="id_user" value="<?=$client['id_user']?>">
                    </div>
                    <div class="form-group">
                        <label for="">tên khách hàng</label>
                        <input type="text" class="form-control" name="fullname_user" value="<?=$client['full_name']?>">
                    </div>
                    <div class="form-group">
                        <label for="">tên đăng nhập</label>
                        <input type="text" class="form-control" name="name-login" value=" <?=$client['user_name']?>">
                    </div>
                    <div class="form-group">
                        <label for="">email</label>
                        <input type="text" class="form-control" name="email_user" value="<?=$client['email']?>">
                    </div>
                    <div class="form-group">
                        <label for="">số dư tài koản</label>
                        <input type="text" class="form-control" name="accont_balance" value="<?=$client['accont_balance']?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">số điện thoại</label>
                        <input type="text" class="form-control" name="phone" value="<?=$client['sdt']?>">
                    </div>
                    <div class="form-group">
                        <label for="">mật khẩu </label>
                        <input type="text" class="form-control" name="password" value="<?=$client['password']?>">
                    </div>
                    
                    <div class="form-group mt-3 mb-3">
                        <label for="">vai trò</label>
                        <select name="role" id="">
                                <option value="" hidden><?= ($client['role'] == 1)? "Admin" : "khách hàng" ?> </option>
                                <option value="1">Admin</option>
                                <option value="0">khách hàng</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">ngày đăng kí</label>
                        <input type="date" class="form-control" name="created_date_user" value="<?=$client['created_date_user']?>">
                    </div>
                    
                </div>

                <div class="button-add-client-2">

                    <a href="">
                        <button type="submit" name="edit_user" class="btn btn-outline-primary">Lưu</button>
                    </a>

                    <a href="">
                        <button type="button" class="btn btn-outline-primary">Nhập lại</button>
                    </a>

                    <a href="index.php?id_menu=user">
                        <button type="button" class="btn btn-outline-primary">Danh sách</button>
                    </a>


                </div>

        </form>
        </div>
        

    </main>