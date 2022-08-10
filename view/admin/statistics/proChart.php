<html>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<body>
<div
id="myChart" style="width:100%; max-width:1200px; height:1000px;">
</div>

<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
var data = google.visualization.arrayToDataTable([
  ['Danh mục', 'Số sản phẩm'],
  <?php
        $sumCate = count($product_cate);
        $i=1;
        foreach($product_cate as $catePro){
            extract($catePro);
            if($i==$sumCate) $sign=""; else $sign=","; 
            echo "['".$catePro['cate_name']."', ".$catePro['dem']."]".$sign;
            $i+=1;
        }
  ?>
]);

var options = {
  title:'Biểu đồ thống kê sản phẩm theo danh mục',
  is3D:true
};

var chart = new google.visualization.PieChart(document.getElementById('myChart'));
  chart.draw(data, options);
}
</script>

</body>
</html>