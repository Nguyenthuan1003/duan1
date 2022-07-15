<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
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
    <div class="row">
        <div class="col-xl-3">
          <table class="table table-hover">
            <h4>Danh mục</h4>
            <tbody>
              <tr>
                <td>@mdo</td>
              </tr>
            </tbody>
          </table>
          
        </div>
        <div class="col-xl-9">
          <div class="row">
            <div class="col-xl-3 col-sm-6">
              <div class="product-gap" style="max-width:90%">
                <div class="product-image">wishlist
                  <a href=""><img src="" alt=""></a>
                </div>
                <div class="product-title">
                  <a href="">
                    <h3 class="product-name">Samsung</h3>
                  </a>
                  <div class="products-price">
                    <span class="text-start">888888</span>
                    <span class="text-end">666666</span>
                  </div>
                  <a href=""><input type="submit" value="Thêm vào giỏ hàng"></a>
                  <a href=""><input type="submit" value="Thêm vào wishlist"></a>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  <!-- end main -->
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</main>
</body>
</html>