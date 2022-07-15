<?php
    //  $Sql = "SELECT count(id_pro) as sl_sp FROM products" ;
    //  $Total_Sp = pdo_query_one($Sql);
    //  // tổng sản phẩm trong bảng sản phẩm 
    //  $Total_Product_On_Page = 12;
    //  // số lượng sản phẩm trên page
    //  $Total_Page = ceil($Total_Sp['sl_sp']/$Total_Product_On_Page) ;
    //  // tổng lượng page sản phẩm hiển thị lên website 

 

    //  $Curent_Page = 1 ;
    //  // page hiện tại 

    //  if(isset($_GET['curent_page'])){
    //  $Curent_Page = $_GET['curent_page'];
    //  }
    //  else { $Curent_Page = 1 ;} ;
    //  // bắt sự kiện next trang 

    //  $Limit_Start = ($Total_Product_On_Page - 1)*($Curent_Page-1) ;

    //  // lấy sản phẩm bắt đầu từ $limit_start 

   
    //  $sql = "SELECT * FROM products LIMIT $Limit_Start,$Total_Product_On_Page";
    //  $Products = pdo_query($sql) ;
     // truy vấn sản phẩm 

     
    //  $sql_dm = "SELECT * FROM categories";
    //  $Categories = pdo_query($sql_dm) ;
     // truy vấn danh mục 



?>


<main>
    <!-- banner -->
    <div class="container-fluid">
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
        <form class="text-start" action="index.php?" method="post">
            <label for="">Sắp xếp theo: </label>
            <select name="filter">
                <option value="moiNhat">Mới nhất</option>
                <option value="cuNhat">Cũ nhất</option>
                <option value="giaCaoThap">Giá từ cao đến thấp</option>
                <option value="giaThapCao">Giá từ thấp đến cao</option>
            </select>
        </form>
        <form class="text-end" action="" method="post">
            <input type="text" name="searchHome" placeholder="Tìm kiếm">
            <input type="submit" class="btn btn-primary" value="search">
        </form>
        <!-- end filter -->
        <!-- main -->
        <!-- open categories -->
        <div class="row">
            <div class="col-xl-3">
                <table class="table table-hover">
                    <h4>Danh mục</h4>
                    <tbody>
                        <?php foreach($CategoriesHome as $cate): ?>
                        <tr>
                            <td><?= $cate['cate_name'] ?></td>
                        </tr>
                        <?php endforeach ?>
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
                            <div class="product-image">wishlist
                                <a href=""><img src="<?= $product['images_default'] ?>" alt=""></a>
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
