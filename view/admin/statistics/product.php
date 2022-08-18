<main>
<div class="container-admin">
        <div class="main">
            <div class="main-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="" id="add-row">
                                <a href="index.php?id_menu=chartPro&date=<?=$date?>">
                                    <button type="button" class="btn btn-primary">Xem biểu đồ</button>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <form action="index.php?id_menu=productStatistics" method="post">
                                <input type="month" name="month" value="<?=$date?>">
                                <button class="btn btn-primary" type="submit" name="month_btn">Xem</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-buttom">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Số sản phẩm</th>
                            <th scope="col">Giá cao nhất</th>
                            <th scope="col">Giá thấp nhất</th>
                            <th scope="col">Giá trung bình</th>
                            <th scope="col">Ngày nhập lâu nhất</th>
                            <th scope="col">Ngày nhập gần nhất</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($product_cate as $pro) : ?>
                        <tr>
                            <td scope="row"><?=$pro['id_cate']?></td>
                            <td scope="row"><?=$pro['cate_name']?></td>
                            <td scope="row"><?=$pro['dem']?></td>
                            <td scope="row"><?=$pro['lon']?></td>
                            <td scope="row"><?=$pro['nho']?></td>
                            <td scope="row"><?=$pro['tb']?></td>
                            <td scope="row"><?=$pro['nnb']?></td>
                            <td scope="row"><?=$pro['nnx']?></td>
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