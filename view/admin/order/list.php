<main>
<div class="container-admin">
        <div class="main">
            <div class="main-top">
                <div class="row">
                    <div class="col-md-6">
                        <div class="show-main-top">
                            <span>show</span>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                                id="show-number">
                                <option selected>10</option>
                                <option value="1">9</option>
                                <option value="2">8</option>
                                <option value="3">7</option>
                            </select>
                            <div class="seach-main-top">
                                <input type="text" class="form-control" placeholder="seach">
                            </div>
                        </div>

                    </div>


                    <div class="col-md-6">
                        <div class="" id="add-row">
                            <a href="index.php?id_menu=aad_product">
                                <button type="button" class="btn btn-primary">+ add hàng hóa</button>
                            </a>
                        </div>

                    </div>

                </div>

            </div>
            <div class="main-buttom">
                <span><?= isset($message)?$message:"" ?></span>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Mã đơn hàng</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Ảnh sản phẩm</th>
                            <th scope="col">Dung lượng</th>
                            <th scope="col">Màu sắc</th>
                            <th scope="col">Người đặt hàng</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tổng tiền</th>
                            <th scope="col">Ngày đặt hàng</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col" colspan="12">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($order as $pro) : ?>
                        <tr>
                            <td scope="row"><?=$pro['id_order']?></td>
                            <td scope="row"><?=$pro['pro_name']?></td>
                            <td scope="row"><img src="../../image/<?=$pro['images_default']?>" alt="anh" style="width:50px"></td>
                            <td scope="row"><?=$pro['version_variant']?></td>
                            <td scope="row"><?=$pro['color_variant']?></td>
                            <td scope="row"><?=$pro['name_order']?></td>
                            <td scope="row"><?=$pro['quantity_order']?></td>
                            <td scope="row"><?=$pro['total_price']?></td>
                            <td scope="row"><?=$pro['created_date_order']?></td>
                            <td scope="row"><?=$pro['address_order']?></td>
                            <td scope="row"><?=$pro['status_order']== 0 ? 'Chờ xử lý' : ($pro['status_order']==1 ? 'Đã xác nhận' : 'Đang giao hàng')?></td>
                            
                            <td>
                                <a href="index.php?id_menu=edit_product&id=<?=$pro['id_pro']?>">
                                    <button class="btn btn-danger" type="submit">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                </a>
                                <a href="index.php?id_menu=delete_product&id=<?=$pro['id_pro']?>">
                                    <button class="btn btn-danger" type="remove">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="next-page">
                    <button type="button" class="btn btn-light">previous</button>
                    <button type="button" class="btn btn-primary">1</button>
                    <button type="button" class="btn btn-primary">2</button>
                    <button type="button" class="btn btn-primary">3</button>
                    <button type="button" class="btn btn-light">next</button>

                </div>
            </div>
        </div>
    </div>

</main>