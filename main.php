<main class="main_index" style="background:#E4E5E7">
    <!-- banner -->
    <div class="slider">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./image/namthuymobile-banner-01.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./image/Rectangle 123.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="./image/Rectangle 123.png" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>
    </div>
    <!-- end banner -->
    <div class="containers">
        <!-- filter -->
        <div class="head-filter">
            <div class="row" style="width: 100%;">
                <div class="col-md-4">
                    <!-- Example split danger button -->
                    <div class="btn-group">
                    <button type="button" class="btn btn-danger">Sắp xếp theo</button>
                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?act=search_pro&key=ORDER BY id_pro DESC">Mới nhất</a></li>
                        <li><a class="dropdown-item" href="index.php?act=search_pro&key=ORDER BY id_pro ASC">Cũ nhất</a></li>
                        <li><a class="dropdown-item" href="index.php?act=search_pro&key=ORDER BY price_default DESC">Giá từ cao đến thấp</a></li>
                        <li><a class="dropdown-item" href="index.php?act=search_pro&key=ORDER BY price_default ASC">Giá từ thấp đến cao</a></li>
                    </ul>
                    </div>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form action="index.php?act=search" class="d-inline-flex end" role="search" method="post">
                        <input class="me-2" type="search" placeholder="Tìm kiếm" name="search">
                        <button class="btn btn-primary" type="submit" name="btn_search">Search</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- end filter -->
        <!-- main -->
        <!-- open categories -->
        <div class="row">
            <div class="col-xl-3">
                <h3 class="category">Danh mục</h3>
                <table class="table table-hover">
                    <tbody>
                        <?php if(is_array($CategoriesHome)) : ?>
                        <?php foreach($CategoriesHome as $cate) : ?>
                        <tr>
                            <td><a href="index.php?act=search&iddm=<?=$cate['id_cate']?>"><?=$cate['cate_name']?></a></td>
                        </tr>
                        <?php endforeach ?>
                        <?php else : ?>
                        <tr>
                            <td></td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <!-- end categories -->
                <!-- open filter -->
                <h3 class="category ">Lọc sản phẩm theo</h3>
                <form action="">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>
                                    <h4 class="text-success">Bộ nhớ</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <P>
                                        <input type="checkbox" name="ram" id="">32GB
                                    </P>
                                    <p>
                                        <input type="checkbox" name="ram" id="">64GB
                                    </p>
                                    <p>
                                        <input type="checkbox" name="ram" id="">128GB
                                    </p>
                                    <p>
                                        <input type="checkbox" name="ram" id="">256GB
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4 class="text-success">Màu sắc</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" name="colors" id="">Trắng
                                    <input type="checkbox" name="colors" id="">Đen
                                    <input type="checkbox" name="colors" id="">Vàng
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4 class="text-success">Kích thước màn hình</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>
                                    <input type="checkbox" name="screenSize" id="">Nhỏ hơn 5 inch
                                    </p>
                                    <p>
                                    <input type="checkbox" name="screenSize" id="">Nhỏ hơn 6 inch
                                    </p>
                                    <p>
                                    <input type="checkbox" name="screenSize" id="">lớn hơn 6 inch
                                    </p>
                                   
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </form>

                <!-- end filter -->
            </div>
            <!-- open products -->
            <div class="col-xl-9 contain_product">
                <div class="row gy-4">
                    <?php foreach($ProductsHome as $product): ?>
                    <div class="col-xl-3 col-sm-6 ">
                        <div class="product-gap product_ bg-white rounded-3 p-3" style="max-width:100% ;">
                            <div class="product-image">
                                <a href="index.php?act=chitiet&id_pro=<?=$product['id_pro']?>"><img style="height:150px ; display:block ; margin:auto" src="./upload/<?=$product['images_default']?>" alt="img"></a>
                            </div>
                            <div class="product-title">
                                <a href="" style="text-decoration:none ;" class="product_name">
                                    <h3 class="product-name mb-2 m-auto mt-2 ms-3 "
                                        style="font-size:14px; font-weight:bold; color:black ;">
                                        <?= $product['pro_name'] ?></h3>
                                </a>

                                <div class="products-price ms-4 mt-2">
                                    <span class="text-start text-danger"><?= $product['price_default'] ?></span>
                                    <strike class="text-end"><?= $product['price_default'] ?></strike>
                                </div>
                                <div class="d-grid d-md-block mt-4" style="margin-top:10px">
                                    <a href="index.php?act=chitiet&id_pro=<?= $product['id_pro'] ?>" class="btn btn-danger btn-sm w-100">Xem Chi Tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
            <!-- end products -->
            <!-- open page -->
            <div class="text-center pages mt-5">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <?php if($Curent_Page>1): ?>
                            <a class="page-link" href="index.php?curent_page=<?php echo $Curent_Page-1?>"
                                aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                            <?php else : ?>

                            <?php endif ?>
                        </li>
                        <?php for($i=1 ; $i <= $Total_Page ; $i++) : ?>
                        <li
                            <?php if($i == $Curent_Page) : echo 'class="page-item active"' ; else : echo 'class="page-item"' ; endif  ?>>
                            <a class="page-link" href="index.php?curent_page=<?=$i?>"><?= $i ?></a>
                        </li>
                        <?php endfor ?>
                        <li class="page-item">
                            <?php if($Curent_Page < $Total_Page): ?>
                            <a class="page-link" href="index.php?curent_page=<?php echo $Curent_Page+1 ?>"
                                aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                            <?php else : ?>
                            <?php endif ?>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- end page -->
            <!-- open accessory -->
            <div class="accessory">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="accessory-gap" style="max-width:95%">
                            <a href=""><img src="" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="accessory-gap" style="max-width:95%">
                            <a href=""><img src="" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end accessory -->
        </div>
        <!-- end main -->
    </div>
</main>