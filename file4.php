<?php

$connect = mysqli_connect(
            'db',
            'akhil',
           'password',
            'test'

);


$query = 'SELECT * FROM test_table';
$result = mysqli_query($connect,$query);






echo '<script>
var xyValues = [];
</script>
<script>'

while($record = mysqli_fetch_assoc($result))
{
        echo '<script>xyValues.push({x:'.$record["event_id"].','.'y:'.$record["datapoint"].'})</script>';
};

?>


<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
<script>
new Chart("myChart", {
  type: "scatter",
  data: {
    datasets: [{
      pointRadius: 4,
      pointBackgroundColor: "rgb(0,0,255)",
      data: xyValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      xAxes: [{ticks: {min: 40, max:160}}],
      yAxes: [{ticks: {min: 0, max:40}}],
    }
  }
});
</script>

<canvas id="myChart" style="width:100%;max-width:700px"></canvas>
</body>
</html>

