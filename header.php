<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<style>
.header{
  display:flex;
  align-items:center;
  justify-content:space-between;
  margin:0px 50px;
} 
.form{
  display:flex;
  gap:20px;

}
.img{
  width:100px;
}
#nav-bar{
  display:flex;
  gap:150px;
}
#text{
  color:green;
}
</style>

<body>
 <div class="header">
       <div class="logo">
        <a href=""><img src="https://iweb.tatthanh.com.vn/pic/3/blog/images/logo-dien-thoai(1).jpg" alt="" class="img"></a>
       </div>
       <nav class="navbar navbar-expand-lg navbar-light">
         <div class="container-fluid">
           <div class="collapse navbar-collapse" id="navbarNav">
             <ul class="navbar-nav" id="nav-bar">
                <li class="nav-item">
                  <a class="nav-link" href="#">HOME</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">BLOG</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">GIỚI THIỆU</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">LIÊN HỆ</a>
                </li>
             </ul>
            </div>
          </div>
        </nav>
        <div class="icon"> 
          <a href=""><i class="fa-solid fa-cart-shopping"></i></a> 
        </div>
       <form class="form">
          <div class="login">
            <button type="button" class="btn btn-outline-primary">Đăng nhập </button>
          </div>
         <div class="register">
           <button type="button" class="btn btn-outline-danger">Đăng kí</button>
         </div>
         
       </form>
 </div>

</body>
</html>