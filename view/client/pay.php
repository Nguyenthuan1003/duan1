<main>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
            <div class="delivery-address">
                    <h4>Địa chỉ nhận hàng</h4>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="atHome">
                                    <i class="fa-solid fa-truck"></i>
                                    <label for="">Nhận hàng tại nhà</label>
                                </div>
                                <div class="title-user">
                                    <div class="input-pay">
                                        <p>Họ và tên (<span>*</span>)</p>
                                        <input type="text" name="username">
                                    </div>
                                    <div class="input-pay">
                                        <p>Email</p>
                                        <input type="email" name="email">
                                    </div>
                                    <div class="select-pay">
                                        <p>Quận/ Huyện (<span>*</span>)</p>
                                        <select name="district" id="district">
                                            <option value="">Chọn quận/ huyện</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="atHome">
                                    <i class="fa-solid fa-shop"></i>
                                    <label for="">Nhận hàng tại trung tâm</label>
                                </div>
                                <div class="title-user">
                                    <div class="input-pay">
                                        <p>Số điện thoại (<span>*</span>)</p>
                                        <input type="text" name="phoneNumber">
                                    </div>
                                    <div class="select-pay">
                                        <p>Tỉnh/ Thành phố (<span>*</span>)</p>
                                        <select name="city" id="province"></select>
                                    </div>
                                    <div class="select-pay">
                                        <p>Phường/ Xã (<span>*</span>)</p>
                                        <select name="wards" id="ward">
                                            <option value="">Chọn xã/ phường</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="input-pay">
                                <p>Số  nhà/ Tên đường (<span>*</span>)</p>
                                <input type="text" name="apartmentNumber">
                            </div>
                            <div class="pay">
                                <h4>Chọn hình thức thanh toán</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="pay-gap">
                                            <i class="fa-solid fa-wallet"></i>
                                            <label for="">Thanh toán khi nhận hàng</label>
                                            <input type="checkbox" name="payments">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="pay-gap">
                                            <i class="fa-solid fa-credit-card"></i>
                                            <label for="">Thẻ ATM/Internet banking</label>
                                            <input type="checkbox" name="payments">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="pay-gap">
                                            <i class="fa-solid fa-money-bill"></i>
                                            <label for="">Số dư tài khoản</label>
                                            <input type="checkbox" name="payments">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="agree">
                                <input type="checkbox" name="agree" id="">
                                <label for="">Tôi đồng ý <a href="">thoả thuận bảo mật và chính sách mua hàng</a> của <a href="">Thế Giới Alo</a></label>
                            </div>
                            <div class="bull">
                                <input type="checkbox" name="bull" id="">
                                <label for="">Yêu cầu xuất hoá đơn GTGT cho đơn hàng này</label>
                            </div>
                            <p>"Lưu ý: Thế Giới Alo chỉ giao hàng đối với các địa chỉ giao hàng có khoảng cách ít hơn hoặc bằng 500km tính từ trung tâm tiếp nhận đơn hàng và đáp ứng đủ điều kiện vận chuyển của Thế Giới Alo. Trường hợp sản phẩm bạn chọn không có sẵn hàng tại khu vực gần bạn, việc giao hàng sẽ được thực hiện bởi đối tác của Thế Giới Alo và không hỗ trợ lắp đặt (nếu có)."</p>
                        </div>
                        <div class="btn">
                            <input type="submit" value="Thanh toán">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-sm-3">
                            <a href=""><img src="" alt="ảnh sản phẩm"></a>
                        </div>
                        <div class="col-sm-5">
                            <label for="">Tên sản phẩm</label>
                        </div>
                        <div class="col-sm-4">
                            <input class="price" id="price_pro" value="10000" disabled>
                            <input class="sale" id="sale_pro" value="20000" disabled>
                            <div class="buttons_added">
                                <input class="minus is-form" type="button" value="-">
                                <input aria-label="quantity" class="input-qty" max="100000" min="1" name="" type="number" value="1" id="sum">
                                <input class="plus is-form" type="button" value="+">
                            </div>
                        </div>
                    </div>
                    <div class="provisional">
                        <p id="provisional"></p>
                        <p id="sale"></p>
                        <p id="transport_fee"></p>
                    </div>
                    <div class="sum" >
                        <p id="sumMonney"></p>
                        <p>*Giá trên đã bao gồm VAT và phí vận chuyển.</p>
                    </div>
                </form>
                <form action="" method="post">
                    <input type="text" placeholder="Mã giảm giá" name="code">
                    <input type="submit" value="Áp dụng">
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="../../../duan1/js/pay.js"></script>
    <script src="../../../duan1/js/pay_quantity.js"></script>
</main>