
  <main>
    
    <div class="container-list-client">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">id khách hàng</th>
            <th scope="col">tên khách hàng</th>
            <th scope="col">user đăng nhập</th>
            <th scope="col">email</th>
            <th scope="col">số điện thoại</th>
            <th scope="col">Mật khẩu</th>
            <th scope="col">số dư tài khoản</th>
            <th scope="col">vai trò</th>
            <th scope="col">ngày đăng kí</th>
            <th scope="col">Action</th>

          </tr>
        </thead>
         <?php foreach($user as $client): ?>
        <tbody>
          <tr>
            <td>
              <?=$client['id_user']?>
            </td>
            <td>
              <?=$client['user_name']?>
            </td>
            <td>
              <?=$client['full_name']?>
            </td>
            <td>
              <?=$client['email']?>
            </td>
            <td>
              <?=$client['sdt']?>
            </td>
            <td>
              <?=$client['pasword']?>
            </td>
            <td>
              <?=$client['accont_balance']?>
            </td>
            <td>
              <?=$client['role']?>
            </td>
            <td>
              <?=$client['created_date_user']?>
            </td>
            <td><button type="button" class="btn btn-outline-success">Không</button></td>
            <td>
              <a href="client.php?id=<?=$client['id_user']?>"><button type="button" class="btn btn-danger"><i class="fa-solid fa-pencil"></i></button></a>
              <a href="client.php?id=<?=$client['id_user']?>"><button type="button" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button></a>

            </td>
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
    <div class="next-page">
                    <button type="button" class="btn btn-light">previous</button>
                    <button type="button" class="btn btn-primary">1</button>
                    <button type="button" class="btn btn-primary">2</button>
                    <button type="button" class="btn btn-primary">3</button>
                    <button type="button" class="btn btn-light">next</button>

                </div>
  </main>