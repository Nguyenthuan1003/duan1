<main>
    <!-- banner -->
    <div class="slider">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./image/Rectangle 123.png" class="d-block w-100" alt="...">
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
    <div class="container">
        <!-- filter -->
        <div class="head-filter">
            <div class="row" style="width: 100%;">
                <div class="col-md-4">
                    <form class="d-inline-flex form-filter" action="index.php?" method="post">
                        <label for="">Sắp xếp theo: </label>
                        <select name="filter" class="filter">
                            <option value="moiNhat">Mới nhất</option>
                            <option value="cuNhat">Cũ nhất</option>
                            <option value="giaCaoThap">Giá từ cao đến thấp</option>
                            <option value="giaThapCao">Giá từ thấp đến cao</option>
                        </select>
                    </form>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form class="d-inline-flex end" role="search"  method="post">
                        <input class="me-2" type="search" placeholder="Tìm kiếm">
                        <button class="btn btn-primary" type="submit">Search</button>
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
                                    <td><?=$cate['cate_name']?></td>
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
                <h3>Lọc sản phẩm theo</h3>
                <form action="">
                    <h4>Bộ nhớ</h4>
                    <input type="checkbox" name="ram" id="">32GB
                    <input type="checkbox" name="ram" id="">64GB
                    <input type="checkbox" name="ram" id="">128GB
                    <input type="checkbox" name="ram" id="">256GB
                    <h4>Màu sắc</h4>
                    <input type="checkbox" name="colors" id="">Trắng
                    <input type="checkbox" name="colors" id="">Đen
                    <input type="checkbox" name="colors" id="">Vàng
                    <h4>Kích thước màn hình</h4>
                    <input type="checkbox" name="screenSize" id="">Nhỏ hơn 5 inch
                    <input type="checkbox" name="screenSize" id="">Nhỏ hơn 6 inch
                    <input type="checkbox" name="screenSize" id="">lớn hơn 6 inch
                </form>
                <!-- end filter -->
            </div>
            <!-- open products -->
            <div class="col-xl-9">
                <div class="row">

                    <?php foreach($ProductsHome as $product): ?>
                    <div class="col-xl-3 col-sm-6">
                        <div class="product-gap" style="max-width:90%">
                            <div class="product-image">
                                <a href=""><img src="<?= $product['images_default'] ?>" alt="img"></a>
                            </div>
                            <div class="product-title">
                                <a href="">
                                    <h3 class="product-name"><?= $product['pro_name'] ?></h3>
                                </a>
                                <div class="products-price">
                                    <span class="text-start"><?= $product['price_default'] ?></span>
                                    <span class="text-end"><?= $product['price_default'] ?></span>
                                </div>
                                <a href=""><input type="submit" value="Thêm vào giỏ hàng"></a>
                                <a href=""><input type="submit" value="Thêm vào wishlist"></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ?>
                </div>
            </div>
            <!-- end products -->
            <!-- open page -->
            <div class="text-center pages">
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
