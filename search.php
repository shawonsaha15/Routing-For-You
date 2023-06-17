<?php

$db = new PDO('mysql:host=localhost;dbname=rfy', 'root', '');

// Get the search term from the form
$searchTerm = $_POST['search'];

// Prepare the SQL query
$sql = 'SELECT * FROM bus_info WHERE name LIKE :search';

// Bind the search term to the query
$stmt = $db->prepare($sql);
$stmt->bindParam(':search', $searchTerm);

// Execute the query
$stmt->execute();

// Get the results
$buses = $stmt->fetchAll();
?>

<body>
    <!--Navbar-->
    <?php include('./view/header_loggedin_admin.php'); ?>

    <?php
    // Display the results
    foreach ($buses as $bus) {
        echo '<img src="' . $bus['img'] . '"><br>';
        echo "Bus Name: " . $bus['name'] . '<br>';
        echo "Routes: " . $bus['route'] . '<br>';
        echo "Fare: " . $bus['fare'] . '<br>';
        echo "Driver Details: " . $bus['driver_contact'];
    }

    ?>

    <!--Footer-->
    <?php include('./view/footer.php'); ?>
</body>