<main>
    <article>

        <div class="pe-4 ps-4 row m-auto ">
            <section class="main_cart col-8 border mt-4 mb-4">
                <h2 class="ms-4">Giỏ Hàng</h2>

                <hr class="text-secondary">
                <article class="wrap_product_on_cart">
                    <?php if(isset($_SESSION['id_cart']) && !empty($_SESSION['id_cart'])): ?>
                    <?php $a = is_array($_SESSION['id_cart'])?sizeof($_SESSION['id_cart']) : 1  ?>
                    <?php foreach($hanghoa as $hh): ?>
                    <?php  for( $i = 0 ; $i < $a ; $i++): ?>
                    <?php if($_SESSION['id_cart'][$i] == $hh['id_pro']): ?>
                    <section class="product_on_cart row">

                        <div class="info_product_on_cart col-5 row">
                            <article class="img_product_on_cart  text-align-center d-flex col-4 ms-2">
                                <img src="./image/<?= $hh['images_default'] ?>" width="70px" class="m-auto" alt="">
                            </article>
                            <article class="wrap_info_product_on_cart col-7 mt-2">
                                <p class="name_product_on_cart"><?= $hh['pro_name'] ?></p>
                            </article>
                        </div>
                        <div class="total_price_product_on_cart col-7 d-flex">
                            <form action="index.php?act=cart" method="post" >

                                <div class="buttons_added col-12   m-auto">
                                    <input type="hidden" name="edit_idpro_cart" value="<?= $hh['id_pro'] ?>">
                                    <input type="hidden" name="remove_idpro_cart" value="<?= $i ?>">
                                    <p class="price_product_on_cart text-danger mt-2 me-5"><?= $hh['price_default'] * (is_array($_SESSION['quantity_pro_cart'])?$_SESSION['quantity_pro_cart'][$i] : $_SESSION['quantity_pro_cart'] ) ?>
                                    </p>
                                    <input class="price_product_default" hidden value="<?= $hh['price_default']?>">
                                    <!-- <input class="minus minus_product_on_cart" type="button" value="-" id="Subtraction">
                            <input class="quantity_product_on_cart p-0 text-center" type="number" value="1">
                            <input class="plus plus_product_on_cart" type="button" value="+" id="plus"> -->
                                    <div class="buttons_added">
                                        <input class="minus is-form" type="button" value="-" id="Subtraction">
                                        <input  class="input-qty" max="100000" min="1" mix="<?= (is_array($_SESSION['quantity_pro_cart'])?$_SESSION['quantity_pro_cart'][$i] : $_SESSION['quantity_pro_cart'] ) ?>" name="qantit_pro"
                                            type="number" value="<?= (is_array($_SESSION['quantity_pro_cart'])?$_SESSION['quantity_pro_cart'][$i] : $_SESSION['quantity_pro_cart'] ) ?>" >
                                        <input class="plus is-form" type="button" value="+" id="plus">
                                    </div>
                                    <input type="submit" name="edit_cart" class="btn btn-primary" value="cập nhập">
                                    <input type="submit" name="remove_cart" class="btn btn-danger ms-2" value="xóa">
                                </div>
                            </form>
                        </div>
                    </section>
                    <hr class="text-secondary">
                    <?php endif ?>
                    <?php endfor ?>
                    <?php endforeach ?>
                    <?php else :  ?>
                    <p>Vui lòng thêm sản phẩm vào giỏ hàng</p>
                    <?php endif ?>
                </article>
            </section>
            <section class="col-3 border mt-4 mb-4 ms-4">
                <h2>Tạm Tính</h2>
                <hr class="text-secondary">
                <div class="main_total_price">
                    <article class="row">
                        <span class="col-6" id="showMoney">Tiền hàng:</span>
                    </article>
                    <article class="row mt-2">
                        <span class="col-6">Giảm Giá:</span>
                        <span class="col-6">0đ</span>
                    </article>
                </div>
                <hr class="text-secondary">
                <article class="row">
                    <span class="col-4" id="money">Tạm Tính :</span>
                </article>
                <article class="row mt-3 pe-2 ps-2">
                    <a href="index.php" class="btn btn-outline-secondary col-12 btn-sm ">Tiếp Tục Mua Hàng</a>
                    <a href="index.php?act=pay" name="submit_pay_on_cart" class="btn btn-danger col-12 btn-sm mt-2 ">Tiến Hành
                        Đặt Hàng</a>
                </article>
            </section>
        </div>
    </article>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="./js/cart.js"></script>
</main>