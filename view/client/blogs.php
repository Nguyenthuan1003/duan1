<section class="row mt-3 mb-3 ">
    <section class="col-8 ml-3 d-block">
        <div class="carousel-item active">
            <img src="./image/banner_blogs1.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h4><a href="">Bánh bèo chính hiệu' không thể bỏ qua bộ hình nền iPhone siêu cute dưới
                    đây! Rinh ngay một tấm hình về
                    thôi nào</a></h4>
            </div>
        </div>
    </section>
    <aside class="col-4">
        <section class="row">
        <div class="carousel-item active">
            <img src="./image/banner_blogs2.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h4><a href="">Tháng 7 deal ngon hết sảy: iPhone SE giảm đậm đến 2 triệu đồng và đi kèm nhiều ưu đãi HOT,
                    quá là
                    đáng sắm luôn</a></h4>
            </div>
        </div>
        </section>
        <section class=" row mt-3">
        <div class="carousel-item active">
            <img src="./image/banner_blogs_3.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h4><a href="">Cách phát hiện ứng dụng theo dõi trên iPhone hay ho giúp việc bảo mật thông tin cá nhân an
                    toàn, bạn
                    đã biết chưa?</a></h4>
            </div>
        </div>
        </section>
    </aside>
</section>
<section class="mt-5">
    <?php foreach($blog as $b): ?>
    <article class="row ml-3 me-3">
        <div class="col-3"><img src="./image/<?= $b['thumnails'] ?>" alt=""></div>
        <div class="col-8 mt-4"><h3><a href="index.php/act=chi_tiet_blog&id=<?= $b['id_news'] ?>"><?= $b['title_news'] ?></a></h3></div>
    </article>
    <hr>
    <?php endforeach ?>
</section>
