<main class="bg-body">
    <div class="container pt-3">
        <div style="width:50%" class="row shadow-lg p-3 mb-5 m-auto bg-body rounded">
            <h2 style="font-size:20px" class="text-success text-center"><i class="fa fa-bag-shopping me-3"></i>Đặt hàng
                thành công</h2>
            <div style="font-size:13px" class="col-md-12 mt-0 w-100">


                <p>Cảm Ơn Bạn Đã Cho <b>Thegioialo.vn</b> Cơ Hội Được Phục Vụ</p>

                <section class="mt-3 p-2 bg-light rounded-3">
                    <div class="row">
                        <p class="col-6"><b>Mã Đơn Hàng:</b> # $order[id_order]</p>
                        <a href="" style="text-decoration:underline" class="col-6">quản lý đơn hàng</a>
                    </div>
                    <div class="mt-3">
                        <ul style="list-style-type: circle;">
                            <li>
                                <b>Người Nhận: </b>  $order[name_order]  $order['sdt'] 
                            </li>
                            <li class="mt-2">
                                <b>Địa Chỉ Nhận Hàng: </b>  $order[address_order]
                            </li>
                            <li class="mt-2">
                                <b>Hình Thức Nhận Hàng: </b> nhận hàng rồi thanh toán
                            </li>
                            <li class="mt-2">
                                <b>Tổng Tiền: </b>  number_format($order['total_price'])đ
                            </li>
                        </ul>
                    </div>

                </section>
            </div>
        </div>
    </div>
</main>