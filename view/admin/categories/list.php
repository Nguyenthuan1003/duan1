<main>
<div class="container-admin">
        <div class="main">
            <div class="main-top">
                <div class="row">
                    <div class="col-md-6">
                        <div class="show-main-top">
                            <span>show</span>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example"
                                id="show-number">
                                <option selected>10</option>
                                <option value="1">9</option>
                                <option value="2">8</option>
                                <option value="3">7</option>
                            </select>
                            <div class="seach-main-top">
                                <input type="text" class="form-control" placeholder="seach">
                            </div>
                        </div>

                    </div>


                    <div class="col-md-6">
                        <div class="" id="add-row">
                            <a href="index.php?id_menu=add_cate">
                                <button type="button" class="btn btn-primary">+ add loại hàng</button>
                            </a>
                        </div>

                    </div>

                </div>

            </div>
            <div class="main-buttom">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID Loai Hang</th>
                            <th scope="col">Tên Loại Hàng</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cate as $ct) : ?>
                        <tr>
                            <th scope="row"><?=$ct['id_cate']?></th>
                            <td><?=$ct['cate_name']?></td>
                            <td>
                                <a href="index.php?id_menu=edit_cate&id=<?=$ct['id_cate']?>">
                                    <button class="btn btn-danger" type="reset">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                </a>
                                <a onclick="return confirm('Bạn có chắc chắn xóa mục này')" href="index.php?id_menu=delete_cate&id=<?=$ct['id_cate']?>">
                                    <button class="btn btn-danger" type="remove">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="next-page">
                    <button type="button" class="btn btn-light">previous</button>
                    <button type="button" class="btn btn-primary">1</button>
                    <button type="button" class="btn btn-primary">2</button>
                    <button type="button" class="btn btn-primary">3</button>
                    <button type="button" class="btn btn-light">next</button>

                </div>
            </div>
        </div>
    </div>

</main>