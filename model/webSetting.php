<?php
    function select_all_websetting(){
        $sql = "SELECT * FROM `websetting`";
        return pdo_query($sql);
    }
    function update_websetting($site,$logo,$email1,$phone1,$phone2,$fbLink,$ytLink){
        $sql = "UPDATE `websetting` SET `site_title`='".$site."',
        `logo`='".$logo."',`email1`='".$email1."',`phone1`='".$phone1."',
        `phone2`='".$phone2."',`fb_link`='".$fbLink."',`yt_link`='".$ytLink."'";
        pdo_execute($sql);
    }
?>