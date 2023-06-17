<?php 
	require_once 'connection.php';

	$empmsg_busName = $empmsg_routes = $empmsg_fares = $empmsg_driverDetails = '';

    if(isset($_POST['submit'])){
        $bus_busName = $_POST['busName'];
        $bus_routes = $_POST['routes'];
        $bus_fares = $_POST['fares'];
        $bus_driverDetails = $_POST['driverDetails'];
		$bus_image = $_FILES['image'];
		$target = "./buses/".$bus_image['name'];

		if ($bus_image['error'] !== UPLOAD_ERR_OK) {
			echo "Error uploading image: " . $bus_image['error'];
			exit;
		}
    }

    if(empty($bus_busName)){
        $empmsg_busName = 'Please fill up this field.';
    }
    if(empty($bus_routes)){
        $empmsg_routes = 'Please fill up this field.';
    }
    if(empty($bus_fares)){
        $empmsg_fares = 'Please fill up this field.';
    }
    if(empty($bus_driverDetails)){
        $empmsg_driverDetails = 'Please fill up this field.';
    }

	if(!empty($bus_busName) && !empty($bus_routes) && !empty($bus_fares) && !empty($bus_driverDetails)){
                
		$sql = "INSERT INTO bus_info(name, route, fare, driver_contact, img) VALUES ('$bus_busName', '$bus_routes', '$bus_fares', '$bus_driverDetails', '$target')";
            if($conn->query($sql) == TRUE){
                header('location:add_bus.php?');
            }else{
				echo 'didnt work';
			}
            
        }

?>

<body>
	<!--Navbar-->
	<?php include('./view/header_loggedin_admin.php'); ?>

	<!--Body-->
	<h1 align="center">Add new bus</h1>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-4">
			</div>
			<div class="col-4">
			<form action="add_bus.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="image">Image</label>
						<input type="file" class="form-control" name="image">
					</div>
					<div class="form-group">
						<label for="busName">Bus Name</label>
						<input type="text" class="form-control" name="busName" value="<?php if(isset($_POST['submit'])){echo $bus_busName;} ?>">
                            <?php if(isset($_POST['submit'])){
                                echo "<span class='text-danger'>".$empmsg_busName."</span>";}?>
					</div>
					<div class="form-group">
						<label for="routes">Routes Followed</label>
						<input type="text" class="form-control" name="routes" value="<?php if(isset($_POST['submit'])){echo $bus_routes;} ?>">
                            <?php if(isset($_POST['submit'])){
                                echo "<span class='text-danger'>".$empmsg_routes."</span>";}?>
					</div>
					<div class="form-group">
						<label for="fares">Fares</label>
						<input type="text" class="form-control" name="fares" value="<?php if(isset($_POST['submit'])){echo $bus_fares;} ?>">
                            <?php if(isset($_POST['submit'])){
                                echo "<span class='text-danger'>".$empmsg_fares."</span>";}?>
					</div>
					<div class="form-group">
						<label for="driverDetails">Driver Details</label>
						<input type="text" class="form-control" name="driverDetails" value="<?php if(isset($_POST['submit'])){echo $bus_driverDetails;} ?>">
                            <?php if(isset($_POST['submit'])){
                                echo "<span class='text-danger'>".$empmsg_driverDetails."</span>";}?>
					</div>
					<div class="form-group">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" id="gridCheck">
							<label class="form-check-label" for="gridCheck">
								I agree all details are correctly insert.
							</label>
						</div>
					</div>
					<button name="submit" class="btn btn-success">Submit</button>
				</form>
			</div>
		</div>
	</div>

	<!--Footer-->
	<?php include('./view/footer.php'); ?>

</body>