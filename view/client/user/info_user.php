
<script>document.querySelector("body").style.background="#FFFFFF"</script>
<div class="container-fluid">
    <section class=" wrap_change_pass_menu_user mt-3">
        <div class="row   p-3 mb-0 bg-body rounded">
            <article class="col-6">
                <article style="height:310px;"
                    class="border shadow p-3 mb-2 bg-body rounded change_pass_menu_user  d-block  ">
                    <h4 style="font-size:20px" class="title_wrap_info_user text-primary mb-4 ">Chức năng</h4>
                    <ul class="" style="list-style-type:none">
                        <li class=""><a href="index.php" class="li_info_user"><i class="fa fa-house me-2"></i>Trang
                                chủ</a></li>
                        <li class=""><a href="" class="li_info_user"><i class=" fa fa-heart me-2"></i>Sản phẩm yêu
                                thích</a>
                        </li>
                        <li class=""><a href="index.php?act=editUser&id=<?=$_SESSION['user']['id_user']?>" class="li_info_user"><i class="fa fa-pen-to-square me-2"></i>Cập nhật
                                tài
                                khoản</a></li>
                        <li class=""><a href="" class="li_info_user"><i class="fa fa-gift me-2"></i>Ưu đãi của bạn:</a>
                        </li>
                        <li class=""><a href="" class="li_info_user"><i class="fa fa-clock me-2"></i>Lịch sử mua
                                hàng</a></li>
                        <li class=""><a href="index.php?act=recharge" class="li_info_user"><i
                                    class="fa fa-wallet me-2"></i>Nạp tiền vào tài
                                khoản</a>
                        </li>
                        <li class=""><a href="" class="li_info_user"><i class="fa fa-phone me-2"></i>Hỗ trợ</a></li>
                        <?php if($user['role'] == 1) : ?>
                        <li class=""><a href="./view/admin/index.php" class="li_info_user"><i
                                    class="fa-solid fa-user-tie"></i>Quản trị Admin</a></li>
                        <?php endif; ?>
                    </ul>
                    <a href="index.php?act=logout"><button class="btn btn-primary" name="logout_user">Đăng
                            Xuất</button></a>
                </article>
            </article>
            <article class="col-6">
                <article style="height:310px;" class="border shadow p-3 mb-2 bg-body rounded  change_pass_menu_user ">
                    <h4 style="font-size:20px" class="title_wrap_info_user text-primary mb-4">Đổi Mật Khẩu</h4>
                    <form>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="inputEmail3" disabled
                                    value="<?= $_SESSION['user']['email'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Password Mới</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="inputPassword3">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Nhập Lại Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="inputPassword3">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Đổi</button>
                    </form>
                </article>
            </article>
        </div>
    </section>
    <section class="row wrap_info_user " style="padding-left:28px; padding-right:28px;">
        <div class=" row border shadow p-3 mb-5 bg-body rounded m-auto">
            <article class="col-6">
                <article class=" h-70 d-block  ">
                    <h4 style="font-size:20px" class="title_wrap_info_user text-primary mb-4">Thông Tin Tài Khoản</h4>
                    <form>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Email :</label>
                            <div class="col-sm-9 m-auto">
                                <strong><?= $_SESSION['user']['email'] ?></strong>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Số Dư :</label>
                            <div class="col-sm-9 m-auto">
                                <strong><?=isset($user['accont_balance']) ? $user['accont_balance'] : '0'?>đ</strong>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Ngày Tạo :</label>
                            <div class="col-sm-9 m-auto">
                                <strong><?= $_SESSION['user']['created_date_user'] ?></strong>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Nhận Thông Báo :</label>
                            <div class="col-sm-9 m-auto">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        id="flexSwitchCheckDefault">
                                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                                </div>
                            </div>
                        </div>
                    </form>
                </article>
            </article>
            <article class="col-6">
                <article class=" h-70 d-block ms-3">
                    <h4 style="font-size:20px" class="title_wrap_info_user text-primary mb-4">Trạng Thái Đơn Hàng</h4>
                    
                    <?php if(isset($order) && !empty($order)):  ?>
                        <table class="table" style="font-size:13px">
                        <thead>
                            <tr>
                                <th scope="col">Mã Đơn Hàng</th>
                                <th scope="col">Ngày Đặt Hàng</th>
                                <th scope="col">Tổng Số Tiền</th>
                                <th scope="col">Trạng Thái</th>
                                <th scope="col">Chi Tiết Đơn Hàng</th>
                                <th scope="col">Hủy Đơn Hàng</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php if(is_array($order)):  ?>
                    <?php foreach($order as $order): ?>
                        <?php if($order['status_order'] == 2 || $order['status_order'] == 1 ):  ?>
                            <tr>
                                <th scope="row">#<?= $order['id_order'] ?></th>
                                <td><?= $order['created_date_order'] ?></td>
                                <td><?= number_format($order['total_price']) ?>đ</td>
                                <td><?= $order['status_order'] == 2 ? "Chờ Xử Lý" : ($order['status_order'] == 1 ? "Đã Xử Lý" : "Đã Giao Hàng" ) ?></td>
                                <td><a href="index.php?act=details_order&&id_order=<?= $order['id_order'] ?>" class="btn btn-primary btn-sm">Chi Tiết</a></td>
                                <?php if($order['status_order'] == 2) : ?>
                                <td><a href="" class="btn btn-danger btn-sm">Hủy</a></td>
                                <?php endif ?>
                            </tr>
                          
                        <?php endif ?>
                    <?php endforeach ?>
                    <?php endif ?>
                    </tbody>
                    </table>
                    <?php else: ?>
                        <p>Bạn Chưa Có Đơn Hàng Nào</p>
                    <?php endif ?>
                </article>
            </article>
        </div>
    </section>
</div>