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
                </div>

            </div>
            <div class="main-buttom">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Số bình luận</th>
                            <th scope="col">Ngày bình luận lâu nhất</th>
                            <th scope="col">Ngày bình luận mới nhất</th>
                            <th scope="col" colspan="12">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($comments as $pro) : ?>
                        <tr>
                            <td scope="row"><?=$pro['id_pro']?></td>
                            <td scope="row"><?=$pro['pro_name']?></td>
                            <td scope="row"><?=$pro['sobl']?></td>
                            <td scope="row"><?=$pro['minbl']?></td>
                            <td scope="row"><?=$pro['maxbl']?></td>
                            <td>
                                <a href="index.php?id_menu=comment_pro&id=<?=$pro['id_pro']?>">
                                    <button class="btn btn-danger" type="submit">
                                        Chi tiết
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