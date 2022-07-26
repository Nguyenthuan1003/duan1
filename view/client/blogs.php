<main>
<div class="container-blog">
        <section class="banner_blogs w-100 row mt-3 mb-3 ">
            <section class="wrap_main_banner_blog  p-0 col-8 d-block" id="banner-big">
                <div class="w-100">
                    <img src="./image/banner_blogs1.png" width="100%" class="img-fluid" id="img_blog_big" alt="...">
                    <div class="w-100" id="text-banner-blog-big">git 
                        <h4 class="h4-1" id="banner"><a href="">Bánh bèo chính hiệu' không thể bỏ qua bộ hình nền iPhone
                                siêu cute dưới
                                đây! Rinh ngay một tấm hình về
                                thôi nào</a></h3>
                    </div>
                </div>
            </section>
            <aside class=" wrap_banner_blog_aside col-4 p-0">
                <section class=" w-100 row">
                    <div class="w-100 p-0">
                        <img src="./image/banner_blogs2.png" width="100%" id="banner-small-1" class="img-fluid"
                            alt="...">
                        <div class="">
                            <h4 class="h4-2"><a href="">Tháng 7 deal ngon hết sảy: iPhone SE giảm đậm đến 2 triệu đồng
                                    và đi
                                    kèm nhiều ưu
                                    đãi
                                    HOT,
                                    quá là
                                    đáng sắm luôn</a></h4>
                        </div>
                    </div>
                </section>
                <section class="row mt-1 w-100" id="banner-small">
                    <div class="w-100 p-0">
                        <img src="./image/banner_blogs_3.png" width="100%" id="banner-small-1" class="img-fluid"
                            alt="...">
                        <div class="">
                            <h4 class="h4-3"><a href="">Cách phát hiện ứng dụng theo dõi trên iPhone hay ho giúp việc
                                    bảo
                                    mật thông tin
                                    cá
                                    nhân an
                                    toàn, bạn
                                    đã biết chưa?</a></h4>
                        </div>
                    </div>
                </section>
            </aside>
        </section>

        <section class="mt-5">
            <?php foreach($blog as $b): ?>
            <article class="row" id="row row-blog">
                <div class="col-3"><img src="./image/<?= $b['thumnails'] ?>" alt=""></div>
                <div class="col-8 mt-4">
                    <h3 class="h3-5"><a href="index.php/act=chi_tiet_blog&id=<?= $b['id_news'] ?>">
                            <?= $b['title_news'] ?>
                        </a></h3>
                </div>
            </article>
            <hr>
            <?php endforeach ?>
        </section>
    </div>


</main>
