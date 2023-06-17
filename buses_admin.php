<?php

require_once 'connection.php';

$sql = "SELECT * FROM bus_info";
$all_product = $conn->query($sql);

?>

<head>
    <style>
        /*SearchBox*/
        .boxContainer {
            margin: auto;
            position: relative;
            width: 300px;
            height: 42px;
            border: 4px solid darkcyan;
            padding: 0px 10px;
            border-radius: 50px;
        }

        .elementsContainer {
            width: 100%;
            height: 100%;
            vertical-align: middle;
        }

        .search {
            border: none;
            height: 100%;
            width: 100%;
            padding: 0px 5px;
            border-radius: 50px;
            font-size: 18px;
            font-weight: 500;
        }

        .search:focus {
            outline: none;
        }
    </style>
</head>

<body>
    <!--Navbar-->
    <?php include('./view/header_loggedin_admin.php'); ?>

    <!--Body-->
    <!--Search-->
    <div class="boxContainer">
        <form action="search.php" method="post">
            <table class="elementsContainer">
                <tr>
                    <td>
                        <input type="text" placeholder="Search" name="search">
                    </td>
                    <td>
                        <input type="submit" value="Search">
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <br>

    <p align="center">Want to add more bus information? <a href="./add_bus.php">Add here!</a></p>

    <br>

    <!--Cards-->
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        while ($row = mysqli_fetch_assoc($all_product)) {
            ?>
            <div class="col">
                <div class="card text-center h-100">
                    <img src="<?php echo $row["img"]; ?>" class="card-img-top">
                    <div class="card-body">
                        <h3><b>
                                <?php echo $row["name"]; ?>
                            </b></h3>
                        <hr>
                        <h5>Routes Followed:</h5>
                        <p>
                            <?php echo $row["route"]; ?>
                        </p>
                        <h5>Fares:</h5>
                        <p>
                            <?php echo $row["fare"]; ?>
                        </p>
                        <h5>Driver Details:</h5>
                        <p>
                            <?php echo $row["driver_contact"]; ?>
                        </p>
                        <p>
                            <i class="fa-solid fa-stars"></i>
                            <i class="fa-solid fa-stars"></i>
                            <i class="fa-solid fa-stars"></i>
                            <i class="fa-solid fa-stars"></i>
                            <i class="fa-regular fa-stars"></i>
                        </p>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

    <!--Footer-->
    <?php include('./view/footer.php'); ?>
</body>