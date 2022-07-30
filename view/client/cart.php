<main>
<article>
    <div class="pe-4 ps-4 row m-auto ">
        <section class="main_cart col-8 border mt-4 mb-4">
            <h2 class="ms-4">Giỏ Hàng</h2>
           
            <hr class="text-secondary">
            <article class="wrap_product_on_cart">

                <section class="product_on_cart row">
                    <div class="info_product_on_cart col-6 row">
                        <article class="img_product_on_cart  text-align-center d-flex col-5 ">
                            <img src="./image/" width="100px" class="m-auto" alt="">
                        </article>
                        <article class="wrap_info_product_on_cart col-6">
                            <p class="name_product_on_cart"></p>
                            <p class="color_product_on_cart btn btn-outline-primary btn-sm rounder">màu xanh</p>
                        </article>
                    </div>
                    <div class="total_price_product_on_cart col-6 d-flex">

                        <div class="buttons_added col-3   m-auto">
                            <p class="price_product_on_cart text-danger mt-2 me-5"></p>
                            <input class="price_product_default" hidden value="">
                            <!-- <input class="minus minus_product_on_cart" type="button" value="-" id="Subtraction">
                            <input class="quantity_product_on_cart p-0 text-center" type="number" value="1">
                            <input class="plus plus_product_on_cart" type="button" value="+" id="plus"> -->
                            <div class="buttons_added">
                                <input class="minus is-form" type="button" value="-" id="Subtraction">
                                <input aria-label="quantity" class="input-qty" max="100000" min="1" name=""
                                    type="number" value="1" id="sum">
                                <input class="plus is-form" type="button" value="+" id="plus">
                            </div>
                            <!-- <a  href="" onclick="return confirm('Bạn có chắn chắn muôn xóa không')" class="text-danger ms-3 mt-2">xóa</a> -->
                        </div>
                    </div>
                </section>
                <hr class="text-secondary">
                
            </article>
        </section>
        <section class="col-3 border mt-4 mb-4 ms-5">
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
                <span class="col-6" id="money">Tạm Tính :</span>
            </article>
            <article class="row mt-3 pe-2 ps-2">
                <a href="index.php" class="btn btn-outline-secondary col-12 btn-sm ">Tiếp Tục Mua Hàng</a>
                <a href="index.php?act=pay" class="btn btn-danger col-12 btn-sm mt-2 ">Tiến Hành Đặt Hàng</a>
            </article>
        </section>
    </div>
</article>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="./js/cart.js"></script>
</main>