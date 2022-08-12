<?php
    include_once '../../../model/PDO.php';
    include_once '../../../model/comment.php';
    $idPro = $_REQUEST['idproduct'];
    // echo $idPro;
    $listbl = select_bl($idPro);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="category-bl">
    <div class="bg-secondary text-white bl">Bình luận</div>
    <table class="table table-striped">
        <?php
            foreach ($listbl as $bl){
                extract($bl);
                echo '<tr>
                        <td>'.$description_comment.'</td>
                        <td>'.$user_name.'</td>
                        <td>'.$created_date_comment.'</td>
                    </tr>';
            }
        ?>
    </table>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post" class="form-bl">
                <input type="hidden" name="id" value="<?=$idPro?>">
                <input type="text" name="msg" class="form-input-bl">
                <input type="submit" value="Gửi" name="addbl" class="btn-bl">
        </form>
    <?php
        if(isset($_POST['addbl'])&&($_POST['addbl'])){
            $noidung = $_POST['msg'];
            $ma_hh = $_POST['id'];
            if(isset($_SESSION['user'])){
                $ma_kh = $_SESSION['user']['id'];
            }else{
                $ma_kh = 3;
            }
            $ngay_bl = date('h:i:sa d/m/Y');
            // die;
            insert_bl($noidung,$ma_hh,$ma_kh,$ngay_bl);
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
    ?>
</div>
</body>
</html>
