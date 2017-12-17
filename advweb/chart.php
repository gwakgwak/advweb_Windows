
<?php
$data = array(
	array('원소', '밀도'),
	array('구리', 8.94),
	array('은', 10.49),
	array('금', 19.30),
	array('백금', 21.45),
);
$options = array(
	'title' => '귀금속 밀도 (단위: g/cm³)',
	'width' => 400, 'height' => 500
);
?>
<script src="//www.google.com/jsapi"></script>
<script>
var data = <?= json_encode($data) ?>;
var options = <?= json_encode($options) ?>;
google.load('visualization', '1.0', {'packages':['corechart']});
google.setOnLoadCallback(function() {
  var chart = new google.visualization.ColumnChart(document.querySelector('#chart_div'));
  chart.draw(google.visualization.arrayToDataTable(data), options);
});
</script>
<div id="chart_div"></div>
?>