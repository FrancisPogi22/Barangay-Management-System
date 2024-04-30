<?php include "../connection.php";


?>

<script>
	Morris.Bar({
		element: 'morris-bar-chart2',
		data: [
			<?php

				$start = 0;
				while($start!=100){
					$qry = mysqli_query($con,"select * from resident where age like '%$start%'");
					$cnt = mysqli_num_rows($qry);
					echo "{y:'$start',a:$cnt},";
					$start = $start+1;
				}
			?>
		],
		xkey: 'y',
		ykeys: ['a'],
		labels: ['Age'],
		hideHover: 'auto'
	});

	Morris.Bar({
		element: 'morris-bar-chart3',
		data: [
			<?php

					$qry = mysqli_query($con,"SELECT *,count(*) as cnt FROM resident r group by r.purok ");
					while($row=mysqli_fetch_array($qry)){
					echo "{y:'".$row['purok']."',a:'".$row['cnt']."'},";
					}
			?>
		],
		xkey: 'y',
		ykeys: ['a'],
		labels: ['Resident per Zone'],
		hideHover: 'auto'
	});

	Morris.Bar({
		element: 'morris-bar-chart4',
		data: [
			<?php

					$qry = mysqli_query($con,"SELECT count(*) as cnt, round(monthly_income,-1) as income FROM resident group by monthly_income");
					while($row=mysqli_fetch_array($qry)){
					echo "{y:'".$row['income']."',a:'".$row['cnt']."'},";
					}
			?>
		],
		xkey: 'y',
		ykeys: ['a'],
		labels: ['Resident with this Income'],
		hideHover: 'auto'
	});
</script>