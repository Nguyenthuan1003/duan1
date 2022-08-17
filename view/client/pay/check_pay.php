

<main class="bg-body">
    <div class="container pt-3">
        <div style="width:50%" class="row shadow-lg p-5 mb-5 m-auto bg-body rounded">
            <h2 style="font-size:20px" class="text-success text-center"><i class="fa fa-bag-shopping me-3"></i> XÁC NHẬN
                ĐẶT HÀNG</h2>
            <p class="mt-4">Chúng Tôi Vừa Gửi 1 Mã Xác Thực Đến Địa CHỉ Gmail Mà Bạn Đã Cung Cấp</p>
            <div style="font-size:13px" class="col-md-12 mt-0 w-100">

                <section class="mt-3  rounded-3">
                    <form action="index.php?act=check_pay" method="post">
                        <div class="input_login">
                            <p class="text-primary text-start">Vui Lòng Nhập Mã xác nhận</p>
                            <input type="text" class="form-control" name="code_check_pay">
                        </div>
                        <input type="submit" value="Tiếp Tục" class="btn btn-secondary mt-4 w-100" name="submit_check_pay">
                    </form>
                </section>

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



                <div class="btn-login mt-3">

                    <a href="index.php?act=pay"><input type="submit" value="Quay Lại Thanh Toán"
                            class="btn btn-outline-success w-100"></a>
                </div>
            </div>
        </div>
    </div>
</main>