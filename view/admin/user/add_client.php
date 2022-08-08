<main>
        <div class="container-client">
            
            <div class="add-client-1">
                <a href="index.php?id_menu=add_user">
                <input type="button" class="btn btn-primary" value="add khách hàng">
                </a>
            </div>
            <div>
                <span>
                    <?= isset($mesages) ? $mesages : "" ?>
                </span>
            </div>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">tên khách hàng</label>
                            <input type="text" class="form-control" name="fullname_user">
                            <p class="text-danger mt-2"><?= (!empty($_err_add_khach_hang['fullname_user'])) ?  $_err_add_khach_hang['fullname_user'] : "" ?></p>
                        </div>
                        <div class="form-group">
                            <label for="">tên đăng nhập</label>
                            <input type="text" class="form-control" name="name-login">
                            <p class="text-danger mt-2"><?= (!empty($_err_add_khach_hang['name-login'])) ? $_err_add_khach_hang['name-login']:"" ?></p>
                        </div>
                        <div class="form-group">
                            <label for="">email</label>
                            <input type="text" class="form-control" name="email_user">
                            <p class="text-danger mt-2"><?= (!empty($_err_add_khach_hang['email_user'])) ? $_err_add_khach_hang['email_user']:"" ?></p>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">số điện thoại</label>
                            <input type="text" class="form-control" name="phone">
                            <p class="text-danger mt-2"><?= (!empty($_err_add_khach_hang['phone'])) ? $_err_add_khach_hang['phone']:"" ?></p>
                        </div>
                        <div class="form-group">
                            <label for="">mật khẩu </label>
                            <input type="password" class="form-control" name="password">
                            <p class="text-danger mt-2"><?= (!empty($_err_add_khach_hang['password'])) ? $_err_add_khach_hang['password']:"" ?></p>
                        </div>

                        <div class="form-group">
                            <label for="">vai trò</label>
                            <select name="role" id="">
                                <option value="" hidden></option>
                                <option value="0">Admin</option>
                                <option value="1">khách hàng</option>
                            </select>
                            <p class="text-danger mt-2"><?= (!empty($_err_add_khach_hang['role'])) ? $_err_add_khach_hang['role']:"" ?></p>
                        </div>
                        <div class="form-group">
                            <label for="">ngày đăng kí</label>
                            <input type="date" class="form-control" name="created_date_user">
                            <p class="text-danger mt-2"><?= (!empty($_err_add_khach_hang['created_date_user'])) ? $_err_add_khach_hang['created_date_user']:"" ?></p>
                        </div>

                    </div>

                    <div class="button-add-client-2">

                        <a href="">
                            <button type="submit" name="add_khach_hang" class="btn btn-outline-primary">Thêm</button>
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