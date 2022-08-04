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


<main class="main_index" style="background:#E4E5E7">
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
                    <form class="d-inline-flex end" role="search" method="post">
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
                            <td><a href="index.php?id_cate=<?= $cate['id_cate'] ?>"><?=$cate['cate_name']?></a></td>
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
                                <a href="index.php?act=chitiet&id_pro=<?=$product['id_pro']?>"><img style="height:150px ; display:block ; margin:auto" src="./image/<?= $product['images_default'] ?>" alt="img"></a>
                            </div>
                            <div class="product-title">
                                <a href="" style="text-decoration:none ;" class="product_name">
                                    <h3 class="product-name mb-2 m-auto mt-2 ms-3 "
                                        style="font-size:14px; font-weight:bold; color:black ;">
                                        <?= $product['pro_name'] ?></h3>
                                </a>

                                <div class="products-price ms-4">
                                    <span class="text-start text-danger"><?= $product['price_default'] ?></span>
                                    <strike class="text-end"><?= $product['price_default'] ?></strike>
                                </div>
                                <div class="d-grid gap-2 d-md-block mt-3">
                                    <a href="index.php?act=cart&id_pro=<?= $product['id_pro'] ?>" class="btn btn-success btn-sm">Thêm vào giỏ hàng</a>
                                    <a href="" class="ms-3"><svg data-bs-toggle="tooltip" data-bs-placement="bottom"
                                            data-bs-title="Thêm Vào Wishlist" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="currentColor" class="bi bi-heart"
                                            viewBox="0 0 17 17">
                                            <path
                                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                                        </svg></a>
                                </div>
                                <div class="d-grid d-md-block" style="margin-top:10px">
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