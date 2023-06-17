<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<header>
<section class="header">
			<div class="navbar">
			<nav>
				<h1>RFY</h1>
				
				<img src="images/64572.png" class="user-icon" onclick="toggleMenu()">
				
				<div class="sub-menu-wrap" id="subMenu">
					<div class="sub-menu">
						<div class="user-info">
							<a href="./login.php"><h6>LOGIN</h6></a>
						</div>
						<hr>
						<div class="user-info">
							<a href="./registration.php"><h6>REGISTER</h6></a>
						</div>
					</div>
				</div>
			</nav>
		</div>
		</section>

		<script>
			let subMenu = document.getElementById("subMenu");
			
			function toggleMenu(){
				subMenu.classList.toggle("open-menu");
			}
		</script>
</header>