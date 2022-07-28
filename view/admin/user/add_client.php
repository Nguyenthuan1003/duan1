
    <main>
        <div class="container-client">
            
            <div class="add-client-1">
                <button class="btn btn-primary">add khách hàng</button>
            </div>
            <form action="client.php" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">mã khách hàng</label>
                            <input type="text" class="form-control" name="id">
                        </div>
                        <div class="form-group">
                            <label for="">tên khách hàng</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="">tên đăng nhập</label>
                            <input type="text" class="form-control" name="name-login">
                        </div>
                        <div class="form-group">
                            <label for="">email</label>
                            <input type="text" class="form-control" name="email_user">
                        </div>
                        <div class="form-group">
                            <label for="">số dư tài koản</label>
                            <input type="text" class="form-control" name="accont_balance">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">số điện thoại</label>
                            <input type="text" class="form-control" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="">mật khẩu </label>
                            <input type="text" class="form-control" name="password">
                        </div>

                        <div class="form-group">
                            <label for="">vai trò</label>
                            <input type="text" class="form-control" name="role">
                        </div>
                        <div class="form-group">
                            <label for="">ngày đăng kí</label>
                            <input type="date" class="form-control" name="created_date_user">
                        </div>

                    </div>

                    <div class="button-add-client-2">

                        <a href="">
                            <button type="submit" class="btn btn-outline-primary">Thêm</button>
                        </a>

                        <a href="">
                            <button type="button" class="btn btn-outline-primary">Nhập lại</button>
                        </a>

                        <a href="">
                            <button type="button" class="btn btn-outline-primary">Danh sách</button>
                        </a>


                    </div>

            </form>
        </div>


    </main>


