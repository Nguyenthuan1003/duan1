<main>
    <article class="wrap_product_on_cart">
        <?php foreach ($wishlish as $w) : ?>
        <section class="product_on_cart row">
            <div class="info_product_on_cart col-5 row">
                <article class="img_product_on_cart  text-align-center d-flex col-4 ms-2">
                    <img src="./upload/<?= $w['images_default'] ?>" width="70px" class="m-auto" alt="">
                </article>
                <article class="wrap_info_product_on_cart col-7 mt-2">
                    <p class="name_product_on_cart"><?= $w['pro_name'] ?></p>
                    <section>
                        <button type="button" class="btn btn-outline-secondary btn-sm"
                            disabled><?= $w['color_variant'] ?></button>
                        <button type="button" class="btn btn-outline-success btn-sm"
                            disabled><?= $w['version_variant'] ?></button>
                    </section>
                </article>
            </div>
            <div class="total_price_product_on_cart col-7 d-flex">
                        <p class="price_product_on_cart text-danger mt-2 me-5"><?= $w['price_default'] ?> VNĐ</p>
                <form action="" method="post">
                    <a href="index.php?act=delete_wl&id=<?=$w['id_wishlist']?>&id_user=<?=$w['id_user']?>">
                        <td><input type="button" value="Xóa" class="btn btn-danger"></td>
                    </a>
                </form>
            </div>
        </section>
        <?php endforeach; ?>
    </article>
</main>