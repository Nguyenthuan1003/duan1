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
                            <th scope="col">ID</th>
                            <th scope="col">Ảnh sản phẩm</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Ngày đăng</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col" colspan="12">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($product as $pro) : ?>
                        <tr>
                            <td scope="row"><?=$pro['id_pro']?></td>
                            <td scope="row"><img src="../../upload/<?=$pro['images_default']?>" alt="anh" style="width:50px"></td>
                            <td scope="row"><?=$pro['pro_name']?></td>
                            <td scope="row"><?=$pro['created_date']?></td>
                            <td scope="row"><?=$pro['price_default']?></td>
                            <td scope="row"><?=$pro['description']?></td>
                            <td scope="row"><?=$pro['status']==0 ? 'Còn hàng' : 'Hết hàng'?></td>
                            <?php foreach($cate as $ct) : ?>
                                <td scope="row"><?=$pro['id_cate']===$ct['id_cate'] ? $ct['cate_name'] : ''?></td>
                            <?php endforeach; ?>
                            <td>
                                <a href="index.php?id_menu=edit_product&id=<?=$pro['id_pro']?>">
                                    <button class="btn btn-danger" type="submit">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                </a>
                                <a onclick="return confirm('Bạn có chắc chắn xóa mục này')" href="index.php?id_menu=delete_product&id=<?=$pro['id_pro']?>">
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