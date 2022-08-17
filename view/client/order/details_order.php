<main class="bg-body">
    <div class="container pt-3">
        <div style="width:50%" class="row shadow-lg p-3 mb-5 m-auto bg-body rounded">
        <h2 style="font-size:20px" class="text-success text-center"><i class="fa fa-bag-shopping me-3"></i>Chi Tiết Đơn Hàng</h2>
            <?php if(isset($order) && !empty($order)) : ?>
            
            <div style="font-size:13px" class="col-md-12 mt-0 w-100">

                <section class="mt-3 p-2 bg-light rounded-3">
                    <div class="row">
                        <p class="col-6"><b>Mã Đơn Hàng:</b> #<?= $order['id_order'] ?></p>
                        <a href="" style="text-decoration:underline" class="col-6">quản lý đơn hàng</a>
                    </div>
                    <div class="mt-3">
                        <ul style="list-style-type: circle;">
                            <li>
                                <b>Người Nhận: </b> <?= $order['name_order'] ?> , <?= $order['sdt'] ?>
                            </li>
                            <li class="mt-2">
                                <b>Địa Chỉ Nhận Hàng: </b> <?= $order['address_order'] ?>
                            </li>
                            <li class="mt-2">
                                <b>Hình Thức Nhận Hàng: </b> nhận hàng rồi thanh toán
                            </li>
                            <li class="mt-2">
                                <b>Tổng Tiền: </b> <?= number_format($order['total_price']) ?>đ
                            </li>
                            
                        </ul>
                    </div>

                </section>
                <section class="mt-3">
                   <button style="border: 2px dashed #198754; width:100% ; color:#198754" class="btn"><?= $order['status_order'] == 2 ? "Chờ Xử Lý" : ($order['status_order'] == 1 ? "Đã Xử Lý" : "Đã Giao Hàng" ) ?></button>
                </section>
               
                <hr style="height:1px ; color : grey ;" style="width:100%">
                <p>Sản Phẩm Trong Đơn Hàng</p>
                <section class="mt-3 p-2 bg-body border rounded-3">
                    <?php if( ( isset($_POST['search_order'])&& isset($_POST['search_order_value']) && !empty($_POST['search_order_value']) ) || isset($_GET['id_order']) ): ?>
                    <?php $a = is_array($order_details)?sizeof($order_details) : 1  ?>
                    <?php foreach($hanghoa as $hangh): ?>
                    <?php for($i = 0 ; $i < $a ; $i++) : ?>
                    <?php if(   $order_details[$i]['id_pro'] == $hangh['id_pro'] && $order_details[$i]['id_variant'] == $hangh['id_variant']  ): ?>
                    <article class="row">
                        <div class="info_product_on_cart col-7 row">
                            <article class="img_product_on_cart  text-align-center d-flex col-4 ms-2">
                                <img src="./upload/<?= $hangh['images_pro_attri'] ?>" width="55px" class="m-auto"
                                    alt="">
                            </article>
                            <article class="wrap_info_product_on_cart col-7 mt-2">
                                <p class="name_product_on_cart"><?= $hangh['pro_name'] ?> 
                                    <?= $hangh['version_variant'] ?></p>
                                <p><span class="text-secondary mt-2">Màu: </span><?= $hangh['color_variant'] ?></p>
                                <p><span class="text-secondary mt-2">Số Lượng: </span><?= $order_details[$i]['quantity_order'] ?></p>
                            </article>
                        </div>
                    </article>
                    <hr style="height:1px ; color : grey ;" style="width:98%">
                    
                    <?php endif ?>
                    <?php endfor ?>
                    <?php endforeach ?>
                    <?php if($order['status_order'] == 2): ?>
                    <section class="mt-3">
                   <a style="width:100% ;" href="index.php?act=check_remove_order&&remove_id_order=<?= $order['id_order'] ?>" class="btn btn-danger">HỦY ĐƠN HÀNG</a>
                    </section>
                  <?php endif ?>
                    <?php else : ?>
                    <span class="text-danger">Chưa có hàng</span>
                    <?php endif ?>
                </section>

                <div class="row m-0 mt-5">



                </div>
                <?php else : ?>
                <p>Chưa Có đơn hàng</p>
                <?php endif ?>
                
                <div class="btn-login mt-3">

                    <a href="index.php"><input type="submit" value="Quay Lại Trang chủ"
                            class="btn btn-outline-success w-100"></a>
                </div>
            </div>
        </div>
    </div>
</main>