<html>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<body>
<div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>

<script>
google.charts.load('current',{packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
// Set Data
var data = google.visualization.arrayToDataTable([
  ['Số user', 'Tháng'],
  <?php
        // $sumCate = count($product_cate);
        // $i=1;
        for($i = 1; $i <= 12; $i++){
            if($i==12) $sign=""; else $sign=",";
            for ($j=0; $j < count($user); $j++){
                $a = $j++;
                if($i < 10 ){
                    $s = "0$i";
                    // echo $s;
                    // echo substr($user[$j]['created_date_user'],5,2);
                    if($s == substr($user[$j]['created_date_user'],5,2)){
                        echo "['".$i."', ".$user[$j]['sums']."]".$sign;
                        
                    }else{
                        echo "['".$i."', ".$df." ]".$sign;
                    }
                }else{
                    // echo $i;
                    if($i == substr($user[$j]['created_date_user'],5,2)){
                        echo "['".$i."', ".$user[$j]['sums']."]".$sign;
                        
                    }else{
                        echo "['".$i."', ".$df." ]".$sign;
                    }
                }
                break;
        }

            // }
            
        }
        // foreach($product_cate as $catePro){
        //     extract($catePro);
        //     if($i==$sumCate) $sign=""; else $sign=","; 
        //     echo "['".$catePro['cate_name']."', ".$catePro['dem']."]".$sign;
        //     $i+=1;
        // }
  ?>
]);
// Set Options
var options = {
  title: 'Thống kê số user đăng ký theo tháng',
  hAxis: {title: 'Tháng'},
  vAxis: {title: 'Số user đăng ký'},
  legend: 'none'
};
// Draw
var chart = new google.visualization.LineChart(document.getElementById('myChart'));
chart.draw(data, options);
}
</script>

</body>
</html>