<html>
<head>
	<title>User Dashboard</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>

<header>
<section class="header">
			<div class="navbar">
			<nav>
				<h1>RFY</h1>
				<ul>
					<li><a href="./dashboard_user.php">HOME</a></li>
				</ul>
				<ul>
					<li><a href="./map.php">MAP</a></li>
				</ul>
				<ul>
					<li><a href="./buses_user.php">BUSES</a></li>
				</ul>
				
				<img src="images/64572.png" class="user-icon" onclick="toggleMenu()">
				
				<div class="sub-menu-wrap" id="subMenu">
					<div class="sub-menu">
						<div class="user-info">
							<img src="images/64572.png">
							<h2>name</h2>
						</div>
						<hr>
						<a href="dashboard_user.php" class="sub-menu-link">
							<img src="images/profile.png">
							<p>Profile</p>
							<span>></span>
						</a>
						<a href="#" class="sub-menu-link">
							<img src="images/setting.png">
							<p>Settings</p>
							<span>></span>
						</a>
						<a href="logout.php" class="sub-menu-link">
							<img src="images/logout.png">
							<p>Logout</p>
							<span>></span>
						</a>
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