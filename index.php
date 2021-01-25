<?php include "header.php";
include "functions.php";
?>
<?php include "sidebar.php"?>

             
			<!-- main-content -->
			<div class="main-content-area chart">
				<!-- page title -->
				<div class="page-info">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<h1 class="page-title">Dashboard</h1>
								<p class="page-description">Home / Dashboard</p>
							</div>
						</div>
					</div>
				</div>
				<div class="content">
					<div class="container-fluid">
						<div class="row">
						<?php 
										$sql ="SELECT room_id from tb_room";
										$run=$conn->query($sql);
										if($run->num_rows > 0){
											$num=0;
											while ($result=$run->fetch_assoc()) {
												$num++;}
											}

										?>
						<?php 
										$sql ="SELECT book_id from booking WHERE status='1'";
										$run=$conn->query($sql);
										if($run->num_rows > 0){
											$num1=0;
											
											while ($result=$run->fetch_assoc()) {
												$num1++;}
											}

										?>
						<?php 
										$sql ="SELECT guest_id from guest";
										$run=$conn->query($sql);
										if($run->num_rows > 0){
											$num2=0;
											while ($result=$run->fetch_assoc()) {
												$num2++;}
											}

										?>
						<?php 
										$sql ="SELECT member_id from members";
										$run=$conn->query($sql);
										if($run->num_rows > 0){
											$num3=0;
											while ($result=$run->fetch_assoc()) {
												$num3++;}
											}

										?>
														<?php 
								$sql ="SELECT due from payment WHERE due!='0' AND due!=' ' ";
								$run=$conn->query($sql);
								if($run->num_rows > 0){
									$num4=0;
									while ($result=$run->fetch_assoc()) {
										$num4++;}
									}

								?>
								

						

				
							<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
							<script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
		var data = google.visualization.arrayToDataTable([
			["Element", "Amount", { role: "style" } ],
			["Total Rooms", <?php echo $num?>, "purple"],
			["Total Resurvation Till Now", <?php echo $num1?>, "silver"],
			["Total Reserved Guest", <?php echo $num2?>, "green"],
			["Due Payment", <?php echo $num4?>, "color: red"]
		]);
		
		var view = new google.visualization.DataView(data);
		view.setColumns([0, 1,
		{ calc: "stringify",
			sourceColumn: 1,
			type: "string",
			role: "annotation" },
			2]);
			
			var options = {
				title: "Current Status of The Hotel",
				width: 1200,
				height: 600,
				bar: {groupWidth: "95%"},
				legend: { position: "none" },
			};
			var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
			chart.draw(view, options);
		}
		</script>
<div id="columnchart_values" style="width: 1200px; height: 500px;"></div>
</div>
</div>
</div>
</div>
		</section>
		
		<?php include "footer.php"?>