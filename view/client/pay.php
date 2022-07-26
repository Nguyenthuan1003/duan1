<main>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="delivery-address">
                    <h4>Chọn địa chỉ nhận hàng</h4>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                                        <label class="btn btn-outline-danger atHome" for="btnradio1"><i class="fa-solid fa-truck"></i>
                                        <label for="">Nhận hàng tại nhà</label></label>
                                </div>
                                <div class="col-md-6">
                                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                                        <label class="btn btn-outline-danger atHome" for="btnradio2"><i class="fa-solid fa-shop"></i>
                                        <label for="">Nhận hàng tại trung tâm</label></label>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-pay">
                                        <p>Họ và tên (<span>*</span>)</p>
                                        <input type="text" name="username">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-pay">
                                        <p>Số điện thoại (<span>*</span>)</p>
                                        <input type="text" name="phoneNumber">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-pay">
                                        <p>Email</p>
                                        <input type="email" name="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="select-pay">
                                        <p>Tỉnh/ Thành phố (<span>*</span>)</p>
                                        <select name="city" id="province"></select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="select-pay">
                                        <p>Quận/ Huyện (<span>*</span>)</p>
                                        <select name="district" id="district">
                                            <option value="">Chọn quận/ huyện</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="select-pay">
                                        <p>Phường/ Xã (<span>*</span>)</p>
                                        <select name="wards" id="ward">
                                            <option value="">Chọn xã/ phường</option>
                                        </select>
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
                                            <label class="">
                                            <input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio1" autocomplete="off" checked>
                                            <label class="btn btn-outline-danger pay-gap" for="vbtn-radio1">
                                            <label class="fa-solid fa-wallet"></label>
                                            <label >Thanh toán khi nhận hàng</label>
                                            </label>
                                            <input type="checkbox" name="payments">
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio2" autocomplete="off">
                                            <label class="btn btn-outline-danger pay-gap" for="vbtn-radio2">
                                            <label class="fa-solid fa-credit-card"></label>
                                            <label>Thẻ ATM/Internet banking</label>
                                            </label>
                                            <input type="radio" name="payments">
                                            </label>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="radio" class="btn-check" name="vbtn-radio" id="vbtn-radio3" autocomplete="off">
                                            <label class="btn btn-outline-danger  pay-gap" for="vbtn-radio3">
                                            <label class="fa-solid fa-money-bill"></label>
                                            <label>Số dư tài khoản</label>
                                            </label>
                                            <input type="radio" name="payments">
                                            </label>
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
                            <div class="btn-pay">
                                <input type="submit" value="Thanh toán" class="btn btn-outline-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <form action="" method="post">
                    <div class="row mg-bt">
                        <div class="col-sm-3">
                            <a href=""><img src="" alt="ảnh sản phẩm"></a>
                        </div>
                        <div class="col-sm-5">
                            <label for="">Tên sản phẩm</label>
                        </div>
                        <div class="col-sm-4">
                            <input class="price" id="price_pro" value="10000" disabled>đ
                            <input class="sale" id="sale_pro" value="5000" disabled>đ
                            <div class="buttons_added">
                                <input class="minus is-form" type="button" value="-" id="Subtraction">
                                <input aria-label="quantity" class="input-qty" max="100000" min="1" name="" type="number" value="1" id="sum">
                                <input class="plus is-form" type="button" value="+" id="plus">
                            </div>
                        </div>
                    </div>
                    <div class="provisional">
                        <p id="provisional">Tạm tính: </p>
                        <p id="sale">Khuyến mãi: </p>
                        <p id="transport_fee">Phí vận chuyển: </p>
                    </div>
                    <div class="sum" >
                        <p id="sumMonney"></p>
                        <p>*Giá trên đã bao gồm VAT và phí vận chuyển.</p>
                    </div>
                </form>
                <form class="d-flex" role="search" action="" method="post">
                    <input class="form-control" type="text" placeholder="Mã giảm giá" name="code">
                    <button class="btn btn-danger" type="submit">Áp dụng</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js" integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./js/pay.js"></script>
    <script src="./js/pay_quantity.js"></script>
</main>