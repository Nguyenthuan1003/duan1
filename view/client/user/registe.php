<main class="bg-body">
    <div class="container p-5">
        <div class="row shadow-lg p-3 mb-5 bg-body rounded">
            <div class="col-md-6">
                <img src="./image/banner_login.jpg" alt="ảnh" style="max-width:100%">
            </div>
            <div class="col-md-6 text-center">
                <h3 class="text-primary">Đăng kí tài khoản của bạn</h3>
                <p>Vui lòng nhập đầy đủ thông tin</p>
                <form action="" method="post">
                <div class="input_registe">
                        <p class="text-primary text-start">Tên đăng nhập</p>
                        <input type="text"  class="form-control" name="name" placeholder="Nhập tên đăng nhập">
                    </div>
                    <div class="input_registe mt-1">
                        <p class="text-primary text-start">Email</p>
                        <input type="text"  class="form-control" name="email" placeholder="Nhập email để đăng ký">
                    </div>
                    <div class="input_registe mt-1">
                        <p class="text-primary text-start">Mật khẩu</p>
                        <input type="text"  class="form-control" name="password" placeholder="Nhập mật khẩu để đăng ký ">
                    </div>
                    <div class="input_registe mt-1">
                        <p class="text-primary text-start">Nhập lại Mật khẩu</p>
                        <input type="text"  class="form-control" name="enterThePassword" placeholder="Nhập lại mật khẩu để đăng ký">
                    </div>

                    <input type="submit" value="ĐĂNG KÝ" class="btn btn-primary mt-4 w-100" name="registe">
                </form>
                <div class="btn-registe">
                    <a href="index.php?act=login"><input type="submit" value="QUAY LẠI TRANG ĐĂNG NHẬP" class="btn btn-outline-primary mt-4 w-100"></a>
                </div>
            </div>
        </div>

    </div>
</main>

