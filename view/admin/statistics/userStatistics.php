<main>
<div class="container-admin">
        <div class="main">
            <div class="main-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="" id="add-row">
                                <a href="index.php?id_menu=chartuser&date=<?=$date?>">
                                    <button type="button" class="btn btn-primary">Xem biểu đồ</button>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 text-end">
                            <form action="index.php?id_menu=userStatistics" method="post">
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
                            <th scope="col">Thời gian</th>
                            <th scope="col">Số người đăng ký</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($user as $us) : ?>
                        <tr>
                            <td scope="row"><?=substr($us['created_date_user'],0,7)?></td>
                            <td scope="row"><?=$us['sums']?></td>
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