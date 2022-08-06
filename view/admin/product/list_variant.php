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
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Màu sắc</th>
                            <th scope="col">Phiên bản</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Sale</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Tính năng đặc biệt</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($var as $v) : ?>
                        <tr>
                            <td scope="row"><?=$v['pro_name']?></td>
                            <td scope="row"><?=$v['color_variant']?></td>
                            <td scope="row"><?=$v['version_variant']?></td>
                            <td scope="row"><?=$v['price']?></td>
                            <td scope="row"><?=$v['sale']?></td>
                            <td scope="row"><?=$v['quantity']?></td>
                            <td scope="row"><?=$v['special_features']?></td>
                            <td>
                                <a href="index.php?id_menu=edit_pro_var&id=<?=$v['id_pro']?>&id_var=<?=$v['id_variant']?>">
                                    <button class="btn btn-danger" type="submit">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                </a>
                                <a href="index.php?id_menu=delete_pro_var&id=<?=$v['id_pro']?>&id_var=<?=$v['id_variant']?>">
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