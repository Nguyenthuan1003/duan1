<script>document.querySelector("body").style.background="#FFFFFF"</script>
<main  class="p-0 pt-2">
    <div class="container p-0 pt-2  m-0 ms-4 me-2 mb-5">
        <form action="index.php?act=pay" method="post">
        <div class="row">
            <div class="col-md-8">
                <div class="delivery-address">
                    <h2>Chọn địa chỉ nhận hàng</h2>
                    <form action="">
                        <div class="row">
                            <div class="col-md-6 ">
                                <input type="radio" class="btn-check" name="btnradio" id="btnradio1"
                                    value="nhận tại nhà" autocomplete="off" checked>
                                <label style="height:100px" class="btn btn-outline-danger atHome" for="btnradio1"><i
                                        class="fa-solid fa-truck mt-4"></i>
                                    <label for="">Nhận hàng tại nhà</label></label>
                            </div>
                            <div class="col-md-6">
                                <input type="radio" class="btn-check" name="btnradio" value="nhận tại trung tâm"
                                    id="btnradio2" autocomplete="off">
                                <label style="height:100px" class="btn btn-outline-danger atHome" for="btnradio2"><i
                                        class="fa-solid fa-shop"></i>
                                    <label for="">Nhận hàng tại trung tâm</label></label>
                            </div>
                            <div class="col-md-6">
                                <div class="input-pay">
                                    <p>Họ và tên (<span>*</span>)</p>
                                    <input style="border:1px solid grey ;" type="text" name="username">
                                    <p class="text-danger mt-2"><?= isset($err['user'])?$err['user']:"" ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-pay">
                                    <p>Số điện thoại (<span>*</span>)</p>
                                    <input style="border:1px solid grey ;" type="text" name="phoneNumber">
                                    <p class="text-danger mt-2"><?= isset($err['phone'])?$err['phone']:"" ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-pay">
                                    <p>Email</p>
                                    <input type="email" name="email">
                                    <p class="text-danger mt-2"><?= isset($err['email'])?$err['email']:"" ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="select-pay">
                                    <p>Tỉnh/ Thành phố (<span>*</span>)</p>
                                    <select name="city" id="province">
                                    </select>
                                    <p class="text-danger mt-2"><?= isset($err['city'])?$err['city']:"" ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="select-pay">
                                    <p>Quận/ Huyện (<span>*</span>)</p>
                                    <select name="district" id="district">
                                      <option  value="">chọn quận</option>
                                     </select>
                                    <p class="text-danger mt-2"><?= isset($err['district'])?$err['district']:"" ?></p>
                                    
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="select-pay">
                                    <p>Phường/ Xã (<span>*</span>)</p>
                                    <select name="wards" id="ward">
                                    <option value="">chọn phường</option>
                                    </select>
                                    <p class="text-danger mt-2"><?= isset($err['wards'])?$err['wards']:"" ?></p>
                                    
                                </div>
                            </div>
                            <div class="input-pay">
                                <p>Số nhà/ Tên đường (<span>*</span>)</p>
                                <input style="border:1px solid grey ;" type="text" name="apartmentNumber">
                                <p class="text-danger mt-2"><?= isset($err['apartmentNumber'])?$err['apartmentNumber']:"" ?></p>
                            </div>
                            <div class="pay">
                                <h3>Chọn hình thức thanh toán</h3>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="">
                                            <input type="radio" class="btn-check" name="vbtn-radio"
                                                value="thanh toán khi nhận hàng" id="vbtn-radio1" autocomplete="off"
                                                checked>
                                            <label style="height:100px" class="btn btn-outline-danger pay-gap"
                                                for="vbtn-radio1">
                                                <label class="fa-solid fa-wallet"></label>
                                                <label>Thanh toán khi nhận hàng</label>
                                            </label>
                                            <input type="checkbox" name="payments">
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" class="btn-check" name="vbtn-radio"
                                            value="thanh toán banking" id="vbtn-radio2" autocomplete="off">
                                        <label style="height:100px" class="btn btn-outline-danger pay-gap"
                                            for="vbtn-radio2">
                                            <label class="fa-solid fa-credit-card"></label>
                                            <label>Internet banking</label>
                                        </label>
                                        <input type="radio" name="payments">
                                        </label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="radio" class="btn-check" name="vbtn-radio" value="Số Dư Tài Khoản"
                                            id="vbtn-radio3" autocomplete="off">
                                        <label style="height:100px" class="btn btn-outline-danger  pay-gap"
                                            for="vbtn-radio3">
                                            <label class="fa-solid fa-money-bill mt-4"></label>
                                            <label>Số dư tài khoản</label>
                                        </label>
                                        <input type="radio" name="payments">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="agree p-2">
                                <input type="checkbox" name="agree" id="" required>
                                <label for="">Tôi đồng ý <a href="">thoả thuận bảo mật và chính sách mua hàng</a> của <a
                                        href="">Thế Giới Alo</a></label>
                            </div>
                            <div class="bull">
                                <input type="checkbox" name="bull" id="">
                                <label for="">Yêu cầu xuất hoá đơn GTGT cho đơn hàng này</label>
                            </div>
                            <p>"Lưu ý: Thế Giới Alo chỉ giao hàng đối với các địa chỉ giao hàng có khoảng cách ít hơn
                                hoặc bằng 500km tính từ trung tâm tiếp nhận đơn hàng và đáp ứng đủ điều kiện vận chuyển
                                của Thế Giới Alo. Trường hợp sản phẩm bạn chọn không có sẵn hàng tại khu vực gần bạn,
                                việc giao hàng sẽ được thực hiện bởi đối tác của Thế Giới Alo và không hỗ trợ lắp đặt
                                (nếu có)."</p>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <form action="" method="post">
                <div class="row m-0 mt-5">
                <?php if(isset($_SESSION['id_cart']) && !empty($_SESSION['id_cart'])): ?>
                    <?php $a = is_array($_SESSION['id_cart'])?sizeof($_SESSION['id_cart']) : 1  ?>
                    <?php foreach($hanghoa as $hh): ?>
                    <?php  for( $i = 0 ; $i < $a ; $i++): ?>
                    <?php if($_SESSION['id_cart'][$i] == $hh['id_pro'] && $_SESSION['id_variant'][$i] == $hh['id_variant']  ): ?>
                    <article class="row">
                        <div class="col-3">
                            <a href=""><img src="./upload/<?= $hh['images_pro_attri'] ?>" width="60"
                                    alt="ảnh sản phẩm"></a>
                        </div>
                        <div class="col-8 d-flex">
                            <p class="m-auto row"><?= $hh['pro_name']  ?> <?= $hh['color_variant'] ?> <?= $hh['version_variant'] ?></p>
                        </div>
                        
                    </article>
                    <article class="row  mt-2">
                        <div class="col-6 d-flex">
                            <input style="height:30px ; font-size:16px" disabled class="price text-danger col-12 p-0 " id="price_pro"
                                value="<?=number_format($hh['price'] * $_SESSION['quantity_pro_cart'][$i]) ?>đ">
                        </div>

                        <div class="buttons_added col-6">
                            <span class="mt-2 me-2">sl: </span>
                            <input aria-label="quantity" style="height:30px" class="input-qty" max="100000" min="1" name="" type="number"
                                disabled value="<?= $_SESSION['quantity_pro_cart'][$i] ?>" id="sum">

                        </div>
                    </article>
                    <hr class="text-secondary mt-3" style="width:75%">
                    <?php endif ?>
                    <?php endfor ?>
                    <?php endforeach ?>
                    <?php else : ?>
                    <span class="text-danger">Chưa có hàng</span>
                    <?php endif ?>

                </div>
                <div class="provisional">
                    <?php $total_price = 0  ?>
                    <?php if(isset($_SESSION['id_cart']) && !empty($_SESSION['id_cart'])): ?>
                    <?php $a = is_array($_SESSION['id_cart'])?sizeof($_SESSION['id_cart']) : 1  ?>
                    <?php foreach($hanghoa as $hangh): ?>
                    <?php for($i = 0 ; $i < $a ; $i++) : ?>
                    <?php if(  $_SESSION['id_cart'][$i] === $hangh['id_pro'] && $_SESSION['id_variant'][$i] == $hangh['id_variant']  ): ?>
                    <?php $total_price += ($hangh['price'] * $_SESSION['quantity_pro_cart'][$i]) ?>
                    <?php endif ?>
                    <?php endfor ?>
                    <?php endforeach ?>
                    <?php else : ?>
                    <span class="text-danger">Chưa có hàng</span>
                    <?php endif ?>
                    
                    <p id="provisional" class="text-danger">Tạm tính: <?= number_format($total_price) ?> đ</p>
                    <p id="sale">Khuyến mãi: </p>
                    <p id="transport_fee">Phí vận chuyển: </p>
                </div>
                <div class="sum mt-3 mb-3">
                    <p id="sumMonney"></p>
                    <p>*Giá trên đã bao gồm VAT và phí vận chuyển.</p>
                </div>
            </form>
            <form class="d-flex" role="search" action="index.php?act=pay" method="post">
                <input class="form-control" type="text" placeholder="Mã giảm giá" name="code_voucher">
                <button class="btn btn-danger ms-3" name="add_voucher" type="submit">Áp</button>
            </form>
            <p class="text-danger mt-3"><?= isset($mesage_voucher) ? $mesage_voucher:"" ?></p>
            <?php  if( $value_voucher !== 0) : ?>
            <?php $total_price = $total_price - $total_price*($value_voucher/100) ?>
            <div class="provisional">
                <p id="provisional">e-voucher : <?= $code_voucher ?></p>
                <p id="sale" class="mt-2">giảm : <span class="text-danger"> -
                        <?=number_format($total_price*($value_voucher/100)) ?>đ</span></p>
                <input type="number" hidden value="<?= $total_price ?>" name="total_price" >
                <p class="mt-2">tổng : <input class="text-danger" style="border:none" disabled  value="<?= number_format($total_price) ?>đ"> </p>
            </div>
            <?php  else : ?>
                    <input name="total_price" value="<?= $total_price ?>" hidden>
                    <?php endif ?>
            <div class="btn-pay mt-3">
                <input type="submit" value="Thanh toán" name="payment" class="btn btn-outline-danger m-0 w-100">
            </div>

        </div>

        </form>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.26.1/axios.min.js"
        integrity="sha512-bPh3uwgU5qEMipS/VOmRqynnMXGGSRv+72H/N260MQeXZIK4PG48401Bsby9Nq5P5fz7hy5UGNmC/W1Z51h2GQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./js/pay.js"></script>
    <script src="./js/pay_quantity.js"></script>
</main>