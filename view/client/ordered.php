<main class="bg-body">
    <div class="container p-5">
        <div class="row shadow-lg p-3 mb-5 bg-body rounded">
            <div class="col-md-12 text-center mt-5">
                <h3 class="text-primary">ĐƠN HÀNG</h3>
                
                <p>thông tin đơn hàng</p>
                <span class="text-danger">mã đơn hàng : <?= $order['id_order'] ?> </span>
                <?php if(isset($order) && !empty($order)) : ?>
                <p class="mt-3">Họ Tên : <?= $order['name_order'] ?></p>
                <p>Số Điện Thoại: <?= $order['sdt'] ?></p>
                <p>Email: <?= $order['email'] ?> </p>
                <p>Địa Chỉ Nhận Hàng : <?= $order['address_order'] ?> </p>
                <div class="row m-0 mt-5">
                    <?php if(isset($_GET['id_order']) && !empty( $order_details)): ?>
                    <?php $a = is_array($order_details)?sizeof($order_details) : 1  ?>
                    <?php foreach($hanghoa as $hangh): ?>
                    <?php for($i = 0 ; $i < $a ; $i++) : ?>
                    <?php if(   $order_details[$i]['id_pro'] === $hangh['id_pro'] ): ?>
                    <article class="row">
                        <div class="col-3">
                            <a href=""><img src="./image/<?= $hangh['images_default'] ?>" width="60"
                                    alt="ảnh sản phẩm"></a>
                        </div>
                        <div class="col-8 d-flex">
                            <p class="m-auto"><?= $hangh['pro_name']  ?></p>
                        </div>
                    </article>
                    <article class="row  mt-2">
                        <div class="col-6 d-flex">
                            <input class="price text-danger col-12 m-auto " id="price_pro"
                                value="<?=number_format($hangh['price_default'] * $order_details[$i]['quantity_order']) ?>đ">
                        </div>

                        <div class="buttons_added col-6">
                            <span class="mt-2 me-2">sl: </span>
                            <input aria-label="quantity" class="input-qty" max="100000" min="1" name="" type="number"
                                disabled value="<?= $order_details[$i]['quantity_order']?>" id="sum">

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
                <div>
                            <span>Tổng : <p class="text-danger"><?= number_format($order['total_price']) ?>đ</p></span>
                        </div>
                <?php else : ?>
                    <p>Chưa Có đơn hàng</p>
                    <?php endif ?>
                <div class="btn-login mt-3">
                    
                    <a href="index.php"><input type="submit" value="Quay Lại Trang chủ"
                            class="btn btn-outline-primary w-100"></a>
                </div>
            </div>
        </div>
    </div>
</main>