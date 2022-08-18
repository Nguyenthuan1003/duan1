<main class="mt-2 p-0">
    <div class="bg-sg"></div>
    <section data-id="250261" data-cate-id="42" class="detail">

        <div class="intro-detail">
            <div class="center-page">

                <aside id="slider-detail">
                    <div class="video-img">
                        <div class="thubmail-slide full">
                            <div class="prev"></div>
                            <div class="next"></div>

                            <div class="owl-carousel slider-img" id="slider-defaults">

                                <?php if(!isset($_GET['version']) && !isset($_GET['versions']) && !isset($_GET['color']) && !isset($_GET['colors']) && !empty($var) ): ?>
                                <?php foreach($img_var as $img_vars ): ?>
                                <div class="item-img" data-thumb="./upload/<?= $img_vars['images_pro_attri'] ?>">
                                    <img class="owl-lazy" title="<?= $pro['pro_name'] ?>" alt="<?= $pro['pro_name'] ?>"
                                        data-src="./upload/<?= $img_vars['images_pro_attri'] ?>" width="500"
                                        height="650">
                                <?php $_SESSION['id_var']=$img_vars['id_variant'] ?>
                                </div>
                                <?php endforeach ?>
                                <?php elseif(isset($_GET['version']) && isset($_GET['color'])) : ?>
                                <?php foreach($img_var as $img_varss ): ?>
                                <div class="item-img" data-thumb="./upload/<?= $img_varss['images_pro_attri'] ?>">
                                    <img class="owl-lazy" title="<?= $pro['pro_name'] ?>" alt="<?= $pro['pro_name'] ?>"
                                        data-src="./upload/<?= $img_varss['images_pro_attri'] ?>" width="500"
                                        height="650">
                                <?php $_SESSION['id_var']=$img_varss['id_variant'] ?>
                                </div>
                                <?php endforeach ?>
                                <?php elseif(empty($var)) : ?>
                                <div class="item-img" data-thumb="./upload/<?= $pro['images_default'] ?>">
                                    <img class="owl-lazy" title="<?= $pro['pro_name'] ?>" alt="<?= $pro['pro_name'] ?>"
                                        data-src="./upload/<?= $pro['images_default'] ?>" width="500" height="650">
                                </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="video-sp"></div>
                </aside>
                
                <aside>
                    <form action="index.php?act=cart&&id_pro=<?= $pro['id_pro'] ?>" method="post">
                        <h1><?= $pro['pro_name'] ?></h1>
                        <?php if(!isset($_GET['version']) && !empty($var) && !isset($_GET['versions']) && !isset($_GET['color']) && !isset($_GET['colors'])  ): ?>
                        <p class="text-white mb-5 " style="font-size:19px">
                            <?= number_format($pro['price_default']) ?>đ

                        </p>
                        <?php elseif(isset($_GET['version']) && isset($_GET['color'])) : ?>
                        <p class="text-white mb-5 " style="font-size:19px">
                            <?= number_format($img_var[0]['price']) ?>đ

                        </p>
                        <?php elseif(empty($var)) : ?>
                        <p class="text-white mb-5 " style="font-size:19px">
                            <?= number_format($pro['price_default']) ?>đ

                            <?php endif ?>
                            <?php if(!isset($_GET['version']) && !empty($var) && !isset($_GET['versions']) && !isset($_GET['color']) && !isset($_GET['colors'])  ): ?>
                        <div class="">
                            <span class="text-white">Dung lượng: </span>
                            <ul class="d-flex">
                                <?php foreach($version as $key => $value): ?>
                                <li class="mt-3 me-3">

                                    <input
                                        onclick="window.location = 'index.php?act=chitiet&id_pro=<?= $pro['id_pro'] ?>&&version=<?= $value['version_variant'] ?>&&color=<?= $img_var[0]['color_variant'] ?>' "
                                        type="radio" class="btn-check" name="version_pro"
                                        id="success-outlined<?= $key ?>" autocomplete="off"
                                        value="<?= $value['version_variant'] ?>"
                                        <?= ( $img_var[0]['version_variant'] == $value['version_variant'] )?"checked":"" ?>>
                                    <label class="btn btn-outline-secondary"
                                        for="success-outlined<?= $key ?>"><?= $value['version_variant'] ?></label>

                                </li>
                                <?php endforeach ?>

                            </ul>
                        </div>
                        <div class="">
                            <span class="text-white">Màu: </span>
                            <ul class="d-flex h-auto">
                                <?php foreach($color as $color => $color_val): ?>
                                <li class="mt-3 me-3">
                                    <input
                                        onclick="window.location = 'index.php?act=chitiet&id_pro=<?= $pro['id_pro'] ?>&&version=<?= $img_var[0]['version_variant'] ?>&&color=<?= $color_val['color_variant'] ?>' "
                                        type="radio" class="btn-check" name="color_pro" id="color-outlined<?= $color ?>"
                                        value="<?= $color_val['color_variant'] ?>" autocomplete="off"
                                        <?= ( $img_var[0]['color_variant'] == $color_val['color_variant'] )?"checked":"" ?>>
                                    <label class="btn btn-outline-light"
                                        for="color-outlined<?= $color ?>"><?= $color_val['color_variant'] ?></label>

                                </li>
                                <?php endforeach ?>

                            </ul>
                        </div>
                        <?php elseif(isset($_GET['version']) && isset($_GET['color'])) : ?>
                        <div class="">
                            <span class="text-white">Dung lượng: </span>
                            <ul class="d-flex">
                                <?php foreach($version as $key => $value): ?>
                                <li class="mt-3 me-3">

                                    <input
                                        onclick="window.location = 'index.php?act=chitiet&id_pro=<?= $pro['id_pro'] ?>&&version=<?= $value['version_variant'] ?>&&color=<?= $img_var[0]['color_variant'] ?>' "
                                        type="radio" class="btn-check" name="version_pro"
                                        id="success-outlined<?= $key ?>" autocomplete="off"
                                        value="<?= $value['version_variant'] ?>"
                                        <?= ( $img_var[0]['version_variant'] == $value['version_variant'] )?"checked":"" ?>>
                                    <label class="btn btn-outline-secondary"
                                        for="success-outlined<?= $key ?>"><?= $value['version_variant'] ?></label>

                                </li>
                                <?php endforeach ?>

                            </ul>
                        </div>
                        <div class="">
                            <span class="text-white">Màu: </span>
                            <ul class="d-flex h-auto">
                                <?php foreach($color as $color => $color_val): ?>
                                <li class="mt-3 me-3">
                                    <input
                                        onclick="window.location = 'index.php?act=chitiet&id_pro=<?= $pro['id_pro'] ?>&&version=<?= $img_var[0]['version_variant'] ?>&&color=<?= $color_val['color_variant'] ?>' "
                                        type="radio" class="btn-check" name="color_pro" id="color-outlined<?= $color ?>"
                                        autocomplete="off" value="<?= $color_val['color_variant'] ?>"
                                        <?= ( $img_var[0]['color_variant'] == $color_val['color_variant'] )?"checked":"" ?>>
                                    <label class="btn btn-outline-light"
                                        for="color-outlined<?= $color ?>"><?= $color_val['color_variant'] ?></label>
                                </li>
                                <?php endforeach ?>

                            </ul>
                        </div>


                        <?php elseif(empty($var)) : ?>
                        <div class="">
                            <span class="text-white">Dung lượng: <b class="text-danger">Chưa Cập Nhập</b></span>

                        </div>
                        <div class=" mt-4 mb-4">
                            <span class="text-white">Màu: <b class="text-danger">Chưa Cập Nhập</b> </span>

                        </div>
                        <?php endif ?>
                        <div id="promotion-detail" class="box-promo nomal">
                            <span>Khuyến mãi </span>
                            <small>Giá và khuyến mãi dự kiến áp dụng đến 23:00 | 31/08</small>
                            <div class="content-promo">
                                <p data-promotion="1154993" data-group="WebNote" data-discount="0" data-productcode=""
                                    data-tovalue="9500">
                                    <i></i>
                                    <b>Phụ kiện chính hãng Apple giảm 30% khi mua kèm iPhone</b>
                                </p>

                                <p data-promotion="1024583" data-group="WebNote" data-discount="0" data-productcode=""
                                    data-tovalue="7000">
                                    <i></i>
                                    <b>Giảm đến 1,500,000đ khi tham gia thu cũ đổi mới (Không áp dụng kèm giảm giá qua
                                        VNPAY)</b>
                                </p>
                                <p data-promotion="932785" data-group="WebNote" data-discount="0" data-productcode=""
                                    data-tovalue="5000">
                                    <i></i>
                                    <b>Giảm 50% giá gói cước 1 năm (Vina350/Vina500) cho Sim VinaPhone trả sau (Trị giá
                                        đến
                                        3 triệu) </b>
                                </p>
                                <p data-promotion="1155007" data-group="WebNote" data-discount="0" data-productcode=""
                                    data-tovalue="800">
                                    <i></i>
                                    <b>Giảm 20% giá gói Bảo hiểm Rơi vỡ 6 tháng cho Iphone </b>
                                </p>
                                <p data-promotion="1154998" data-group="WebNote" data-discount="0" data-productcode=""
                                    data-tovalue="0">
                                    <i></i>
                                    <b>Nhập mã august2022 giảm 5% khi thanh toán</b>
                                </p>
                            </div>
                        </div>

                        <script>
                        function ShowRuleCampaign($this, element) {
                            if ($this.hasClass('act')) {
                                $this.removeClass('act');
                                $('.crule').toggleClass('hide');
                            } else {
                                $('.crule').removeClass('hide');
                                $('.campaign>div>div>div>i.act').removeClass('act');
                                $this.toggleClass('act');
                            }

                            $('.crule').html($('#' + element).html());
                        }

                        function HideRuleCampaign($this) {
                            $this.removeClass('act');
                            $('.crule').toggleClass('hide');
                        }

                        function CheckApply($this, url, min) {
                            var option = $this.parents('.campaign-option');
                            if ($('.choosepromo .label-radio.active').length > 0 && min > 0) {
                                var price = parseInt(36990000);
                                var discount = parseInt(7400000);
                                $('.choosepromo .label-radio.active').each(function() {
                                    var $parent = $(this).parent();
                                    var value = parseInt($parent.data('discount'));
                                    if (value > 0) {
                                        discount += $parent.data('ispercent') == 'True' ? (value * price /
                                            100) :
                                            value;
                                    }
                                });

                                if (price - discount < min) {
                                    option.find('.cpopup').removeClass('hide');
                                } else {
                                    window.location.href = url;
                                }
                            } else {
                                window.location.href = url;
                            }
                        }

                        function ActiveOption($this, url, min) {
                            var option = $this;
                            if (option.hasClass('active')) {
                                option.removeClass('active');
                                $('.btn-camp').remove();
                                $('.buy-sp .btn-buy').show();
                            } else {
                                option.siblings().removeClass('active');
                                option.addClass('active');

                                $('.buy-sp .btn-buy').hide();

                                if ($('.btn-camp').length > 0) {
                                    $('.btn-camp').remove();
                                }

                                var newButton = $('<a href="javascript:void(0)" class="btn-camp btn-buy full"></a>');
                                newButton.click(() => CheckApply($this, url, min))
                                newButton.text(`Mua ngay qua ${$this.data('campaignname')}`);
                                $('.buy-sp.normal').prepend(newButton);
                            }
                        }

                        function gtm_trakking(url) {
                            var obj = getModelTracking();
                            obj.orderType = "Mua ngay Vnpay";
                            var obj = getModelTracking();
                            if (url.indexOf("vnpayqr") != -1) {
                                obj.productPromoyionType = "Khuyến mãi thường";
                                obj.orderType = "Mua ngay Vnpay";
                            } else {
                                if (url.indexOf("onepayjcb") != -1) {
                                    obj.orderType = "Mua ngay Onepay JCB";
                                } else {
                                    if (url.indexOf("fecredit") != -1) {
                                        obj.orderType = "Mua ngay FeCredit";
                                    } else {
                                        obj.orderType = "Mua ngay Tpbank";
                                    }
                                }
                            }
                            gtm_ProductAddtoCart(obj);
                        }
                        </script>



                        <div class="">

                            <input type="submit" name="add_to_cart" style="font-size:25px"
                                class="btn btn-primary col-12 " value="Thêm Vào Giỏ Hàng">
                                <?php  if(isset($_SESSION['user'])) : ?>
                                    <a href="index.php?act=wl&id_pro=<?=$pro['id_pro']?>&id_user=<?=$_SESSION['user']['id_user']?>&id_var=<?=$_SESSION['id_var']?>">
                                        <input type="button" name="add_to_wishlist" style="font-size:25px"
                                        class="btn btn-light col-12 mt-3 " value="Thêm Vào danh sách yêu thích">
                                    </a>
                                <?php endif ?>


                        </div>

                        <ul class="policy mt-4">
                            <li>
                                <span>
                                    <i class="topzone-boxtskt"></i>
                                    Bộ sản phẩm gồm: Hộp, Sách hướng dẫn, Cây lấy sim, Cáp Lightning - Type C
                                </span>
                            </li>
                            <li>
                                <span>
                                    <i class="topzone-doitra"></i>
                                    Hư gì đổi nấy <b>12 tháng</b> tại 3305 siêu thị trên toàn quốc <a href=""> Xem chi
                                        tiết
                                        chính sách bảo hành,
                                        đổi trả </a>
                                </span>
                            </li>
                            <li>
                                <span>
                                    <i class="topzone-baohanhpolicy"></i>
                                    Bảo hành chính hãng 1 năm
                                </span>
                            </li>
                            <li>
                                <span>
                                    <i class="topzone-giaohang"></i>
                                    Giao hàng nhanh toàn quốc
                                </span>
                            </li>
                            <li>
                                <span>
                                    <i class="topzone-tongdai"></i>
                                    Tổng đài: <a href='tel:1900969642'>1900.9696.42</a> (9h00 - 21h00 mỗi ngày)
                                </span>
                            </li>
                        </ul>
                    </form>
                </aside>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                <script>
                    $(document).ready(function(){
                        $("#comments").load("./view/client/comment/comment_form.php", {idproduct:<?=$id?>});
                    });
                </script>
                <div class="mg-top">
                <div class="comment" id="comments">
                   
                </div>
                </div>
        <div class="descrip">
            <strong id="combo-title" class="sg-access">Phụ kiện gợi ý cho iPhone</strong>
            <div id="combo-detail" class="access-sg owl-carousel">
                <div class="item">
                    <a href="/sac-dtdd/pin-sac-du-phong-polymer-10000mah-ava-pa-w11-x">
                        <div class="img-access-sg">
                            <img class="lazyload"
                                data-src="https://cdn.tgdd.vn/Products/Images/57/214976/pin-sac-du-phong-polymer-10000mah-ava-pa-w11-x-190722-082004-600x600.jpeg"
                                alt="Pin s&#x1EA1;c d&#x1EF1; ph&#xF2;ng Polymer 10.000mAh AVA PA W11 X">
                        </div>
                        <h3>Pin s&#x1EA1;c d&#x1EF1; ph&#xF2;ng Polymer 10.000mAh AVA PA W11 X</h3>
                        <span>
                            <b>225.000&#x20AB;</b> <strike>450.000&#x20AB;</strike> -50% </span>
                    </a>
                </div>
                <div class="item">
                    <a href="/op-lung-flipcover/op-13-pro-max-nhua-cung-vien-deo-arden-osmia">
                        <div class="img-access-sg">
                            <img class="lazyload"
                                data-src="https://cdn.tgdd.vn/Products/Images/60/265783/op-13-pro-max-nhua-cung-vien-deo-arden-osmia-1.-600x600.jpg"
                                alt="&#x1ED0;p l&#x1B0;ng iPhone 13 Pro Max Nh&#x1EF1;a c&#x1EE9;ng vi&#x1EC1;n d&#x1EBB;o Arden OSMIA">
                        </div>
                        <h3>&#x1ED0;p l&#x1B0;ng iPhone 13 Pro Max Nh&#x1EF1;a c&#x1EE9;ng vi&#x1EC1;n d&#x1EBB;o Arden
                            OSMIA</h3>
                        <span>
                            <b>50.000&#x20AB;</b> <strike>100.000&#x20AB;</strike> -50% </span>
                    </a>
                </div>
                <div class="item">
                    <a href="/sac-dtdd/pin-sac-du-phong-polymer-10000mah-ava-pj-jp207-xam">
                        <div class="img-access-sg">
                            <img class="lazyload"
                                data-src="https://cdn.tgdd.vn/Products/Images/57/229277/pin-sac-du-phong-polymer-10000mah-ava-pj-jp207-xam-thumb-600x600.jpeg"
                                alt="Pin s&#x1EA1;c d&#x1EF1; ph&#xF2;ng Polymer 10.000 mAh AVA PJ JP207">
                        </div>
                        <h3>Pin s&#x1EA1;c d&#x1EF1; ph&#xF2;ng Polymer 10.000 mAh AVA PJ JP207</h3>
                        <span>
                            <b>225.000&#x20AB;</b> <strike>450.000&#x20AB;</strike> -50% </span>
                    </a>
                </div>
                <div class="item">
                    <a href="/sac-dtdd/pin-sac-du-phong-7500mah-ava-ds004">
                        <div class="img-access-sg">
                            <img class="lazyload"
                                data-src="https://cdn.tgdd.vn/Products/Images/57/232353/pin-sac-du-phong-7500mah-ava-ds004-athumb-600x600.jpeg"
                                alt="Pin s&#x1EA1;c d&#x1EF1; ph&#xF2;ng 7500 mAh AVA DS004">
                        </div>
                        <h3>Pin s&#x1EA1;c d&#x1EF1; ph&#xF2;ng 7500 mAh AVA DS004</h3>
                        <span>
                            <b>150.000&#x20AB;</b> <strike>300.000&#x20AB;</strike> -50% </span>
                    </a>
                </div>
                <div class="item">
                    <a href="/sac-dtdd/pin-sac-du-phong-7500mah-ava-ds630">
                        <div class="img-access-sg">
                            <img class="lazyload"
                                data-src="https://cdn.tgdd.vn/Products/Images/57/230661/pin-sac-du-phong-7500mah-ava-ds630-ads-thumb-600x600.jpeg"
                                alt="Pin s&#x1EA1;c d&#x1EF1; ph&#xF2;ng 7500 mAh AVA DS630">
                        </div>
                        <h3>Pin s&#x1EA1;c d&#x1EF1; ph&#xF2;ng 7500 mAh AVA DS630</h3>
                        <span>
                            <b>150.000&#x20AB;</b> <strike>300.000&#x20AB;</strike> -50% </span>
                    </a>
                </div>
                <div class="item">
                    <a href="/sac-dtdd/pin-sac-du-phong-7500mah-ava-la-10k-1">
                        <div class="img-access-sg">
                            <img class="lazyload"
                                data-src="https://cdn.tgdd.vn/Products/Images/57/214975/pin-sac-du-phong-7500mah-ava-la-10k-1-190722-054156-600x600.jpg"
                                alt="Pin s&#x1EA1;c d&#x1EF1; ph&#xF2;ng 7.500 mAh AVA LA 10K-1">
                        </div>
                        <h3>Pin s&#x1EA1;c d&#x1EF1; ph&#xF2;ng 7.500 mAh AVA LA 10K-1</h3>
                        <span>
                            <b>150.000&#x20AB;</b> <strike>300.000&#x20AB;</strike> -50% </span>
                    </a>
                </div>
                <div class="item">
                    <a href="/cap-dien-thoai/cap-lightning-mfi-12m-aukey-cb-al1-do">
                        <div class="img-access-sg">
                            <img class="lazyload"
                                data-src="https://cdn.tgdd.vn/Products/Images/58/203239/cap-lightning-mfi-12m-aukey-cb-al1-do-avatar-1-1-600x600.jpg"
                                alt="C&#xE1;p Lightning MFI 1.2 m AUKEY CB-AL1 &#x110;&#x1ECF;">
                        </div>
                        <h3>C&#xE1;p Lightning MFI 1.2 m AUKEY CB-AL1 &#x110;&#x1ECF;</h3>
                        <span>
                            <b>245.000&#x20AB;</b> <strike>350.000&#x20AB;</strike> -30% </span>
                    </a>
                </div>
                <div class="item">
                    <a href="/mieng-dan-man-hinh/dan-kinh-chong-nhin-trom-iphone-13-pro-max-uniq">
                        <div class="img-access-sg">
                            <img class="lazyload"
                                data-src="https://cdn.tgdd.vn/Products/Images/1363/260110/mieng-dan-kinh-chong-nhin-trom-iphone-13-pro-max-uniq-thumb-600x600.jpg"
                                alt="Mi&#x1EBF;ng d&#xE1;n k&#xED;nh ch&#x1ED1;ng nh&#xEC;n tr&#x1ED9;m iPhone 13 Pro Max UniQ">
                        </div>
                        <h3>Mi&#x1EBF;ng d&#xE1;n k&#xED;nh ch&#x1ED1;ng nh&#xEC;n tr&#x1ED9;m iPhone 13 Pro Max UniQ
                        </h3>
                        <span>
                            <b>340.000&#x20AB;</b> <strike>380.000&#x20AB;</strike> -10% </span>
                    </a>
                </div>
                <div class="item">
                    <a href="/gay-tu-suong/gimbal-chong-rung-moza-nano-se">
                        <div class="img-access-sg">
                            <img class="lazyload"
                                data-src="https://cdn.tgdd.vn/Products/Images/3885/265468/gimbal-chong-rung-moza-nano-se-den-1.-600x600.jpg"
                                alt="Gimbal ch&#x1ED1;ng rung Moza Nano SE">
                        </div>
                        <h3>Gimbal ch&#x1ED1;ng rung Moza Nano SE</h3>
                        <span>
                            <b>900.000&#x20AB;</b>
                        </span>
                    </a>
                </div>
                <div class="item">
                    <a href="/adapter-sac/adapter-sac-type-c-20w-cho-iphone-ipad-apple-mhje3">
                        <div class="img-access-sg">
                            <img class="lazyload"
                                data-src="https://cdn.tgdd.vn/Products/Images/9499/230315/adapter-sac-type-c-20w-cho-iphone-ipad-apple-mhje3-avatar-1-1-600x600.jpg"
                                alt="Adapter S&#x1EA1;c Type C 20W d&#xF9;ng cho iPhone/iPad Apple MHJE3 Tr&#x1EAF;ng">
                        </div>
                        <h3>Adapter S&#x1EA1;c Type C 20W d&#xF9;ng cho iPhone/iPad Apple MHJE3 Tr&#x1EAF;ng</h3>
                        <span>
                            <b>690.000&#x20AB;</b>
                        </span>
                    </a>
                </div>
            </div>

        </div>

        <script type="text/javascript">
        window.dataLayer = window.dataLayer || [];
        dataLayer.push({
            'pageType': 'Product',
            'pagePlatform': 'Web',
            'pageCategoryLv1': 'iPhone'
        })

        var productDetailArray = [{
            'name': 'iPhone 13 Pro Max',
            'id': '250261',
            'price': '29590000',
            'brand': 'iPhone (Apple)',
            'category': 'iPhone',
            'dimension4': 'iPhone 13 Pro Max',
            'dimension5': '36990000',
            'dimension6': '20%',
            'dimension7': 'Yes',
            'dimension8': 'Khuyến mãi thường'
        }];

        function gtm_productView() {
            if (dataLayer == undefined) return;
            var ecommerceObject = {
                'event': 'productDetail',
                'ecommerce': {
                    'detail': {
                        'products': productDetailArray
                    }
                }
            }
            dataLayer.push(ecommerceObject);
        }

        var productAddToCartArray = [{
            'name': 'iPhone 13 Pro Max',
            'id': '250261',
            'price': '29590000',
            'brand': 'iPhone (Apple)',
            'category': 'iPhone',
            'variant': 'Vàng đồng',
            'quantity': 1,
            'dimension4': 'iPhone 13 Pro Max',
            'dimension5': '36990000',
            'dimension6': '20%',
            'dimension7': 'Yes',
            'dimension8': 'Khuyến mãi thường'
        }];

        function gtm_productAddToCart(orderType) {
            if (dataLayer == undefined) return;
            var ecommerceObject = {
                'event': 'productAddToCart',
                'orderType': orderType,
                'ecommerce': {
                    'add': {
                        'products': productAddToCartArray
                    }
                }
            }
            dataLayer.push(ecommerceObject);
        }

        function gtm_productCheckout() {
            if (dataLayer == undefined) return;
            var ecommerceObject = {
                'event': 'productCheckout',
                'orderType': 'Mua ngay',
                'ecommerce': {
                    'add': {
                        'products': productAddToCartArray
                    }
                }
            }
            dataLayer.push(ecommerceObject);
        }
        </script>


    </section>
    </body>