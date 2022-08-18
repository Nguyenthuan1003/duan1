<main>
<div class="container-admin">
        <div class="main">
            <div class="main-top">
                <div class="row">
                    <div class="col-md-6">
                        <div class="show-main-top">
                            <div class="seach-main-top">
                                <input type="text" class="form-control" placeholder="seach">
                            </div>
                        </div>

                    </div>


                    <div class="col-md-6">
                        <div class="" id="add-row">
                            <a href="index.php?id_menu=add_vorcher">
                                <button type="button" class="btn btn-primary">Thêm vorcher</button>
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
                            <th scope="col">Vorcher</th>
                            <th scope="col">Số lượng giới hạn</th>
                            <th scope="col">Ngày hết hạn</th>
                            <th scope="col">Giá trị vorcher</th>
                            <th scope="col" colspan="12">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($vorcher as $pro) : ?>
                        <tr>
                            <td scope="row"><?=$pro['id_vorcher']?></td>
                            <td scope="row"><?=$pro['name_vorcher']?></td>
                            <td scope="row"><?=$pro['quantity_limit']?></td>
                            <td scope="row"><?=$pro['expiration_date']?></td>
                            <td scope="row"><?=$pro['coupon_value']?></td>
                            <td>
                                <a href="index.php?id_menu=edit_vorcher&id=<?=$pro['id_vorcher']?>">
                                    <button class="btn btn-danger" type="submit">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                </a>
                                <a onclick="return confirm('Bạn có chắc chắn xóa mục này')" href="index.php?id_menu=delete_vorcher&id=<?=$pro['id_vorcher']?>">
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