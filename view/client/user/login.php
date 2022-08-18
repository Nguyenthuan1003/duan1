<main class="bg-body">
    <div class="container p-5">
        <div class="row shadow-lg p-3 mb-5 bg-body rounded">
            <div class="col-md-6">
                <img src="./image/banner_login.jpg" alt="ảnh" style="max-width:100%">
            </div>
            <div class="col-md-6 text-center">
                <h3 class="text-primary">Chào mừng trở lại</h3>
                <p>Vui lòng đăng nhập để tiếp tục</p>
                <form action="" method="post">
                    <div class="input_login">
                        <p class="text-primary text-start">Email</p>
                        <input type="text"  class="form-control" name="email" placeholder="Nhập email để đăng nhập">
                    </div>
                    <div class="input_login">
                        <p class="text-primary text-start">Mật khẩu</p>
                        <input type="password"  class="form-control" name="password" placeholder="Nhập mật khẩu để đăng nhập">
                    </div>
                    <input type="submit" value="Đăng nhập" class="btn btn-primary mt-4 w-100" name="login">
                </form>
                <div class="btn-login">
                    <p class="text-secondary mt-3">hoặc</p>
                    <a href=""><input type="submit" value="Đăng ký" class="btn btn-outline-primary w-100"></a>
                    <div class="p-3">
                        <a href="index.php" class="text-start me-4"><span>Quay về trang chủ</span></a>
                        <a href="index.php?act=forgotPassword"><span class="text-end">Quên mật khẩu?</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>