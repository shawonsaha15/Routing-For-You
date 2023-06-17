<?php
require_once 'connection.php';

// Get the email from the query string
$user_email = $_GET['email'] ?? '';

// Initialize variables
$dob = '';
$gender = '';
$address = '';
$address2 = '';
$city = '';
$state = '';
$zip = '';
$contact_number = '';

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Update the user details in the database
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $contact_number = $_POST['contact_number'];

    $sql = "UPDATE user_profile SET dob = '$dob', gender = '$gender', address = '$address', address2 = '$address2', city = '$city', state = '$state', zip = '$zip', contact_number = '$contact_number' WHERE email = '$user_email'";
    $conn->query($sql);

    // Update the session storage with the new details
    $_SESSION['userDetails'] = [
        'dob' => $dob,
        'gender' => $gender,
        'address' => $address,
        'address2' => $address2,
        'city' => $city,
        'state' => $state,
        'zip' => $zip,
        'contact_number' => $contact_number
    ];
}

// Retrieve the user details from the session storage if available,
// otherwise retrieve from the database
if (isset($_SESSION['userDetails'])) {
    // Use the details from session storage
    $userDetails = $_SESSION['userDetails'];
    $dob = $userDetails['dob'];
    $gender = $userDetails['gender'];
    $address = $userDetails['address'];
    $address2 = $userDetails['address2'];
    $city = $userDetails['city'];
    $state = $userDetails['state'];
    $zip = $userDetails['zip'];
    $contact_number = $userDetails['contact_number'];
} else {
    // Retrieve the details from the database
    $sql = "SELECT * FROM user_profile WHERE email = '$user_email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $dob = $row['dob'];
        $gender = $row['gender'];
        $address = $row['address'];
        $address2 = $row['address2'];
        $city = $row['city'];
        $state = $row['state'];
        $zip = $row['zip'];
        $contact_number = $row['contact_number'];

        // Save the retrieved details in session storage
        $_SESSION['userDetails'] = [
            'dob' => $dob,
            'gender' => $gender,
            'address' => $address,
            'address2' => $address2,
            'city' => $city,
            'state' => $state,
            'zip' => $zip,
            'contact_number' => $contact_number
        ];
    }
}
?>


<body>
    <!--Navbar-->
    <?php include('./view/header_loggedin_admin.php'); ?>

    <!--Body-->
    <div class="container">
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-4">
                <form action="dashboard_admin.php?email=<?php echo $user_email; ?>" method="POST">
                    <div class="form-group">
                        <label for="staticEmail">Email</label>
                        <input readonly class="form-control-plaintext" type="text" id="staticEmail"
                            value="<?php echo $user_email; ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputDOB">DOB</label>
                        <input type="text" class="form-control" name="dob" id="inputDOB" value="<?php echo $dob; ?>"
                            placeholder="DD/MM/YYYY">
                    </div>
                    <div class="form-group">
                        <label for="inputGender">Gender</label>
                        <input type="text" class="form-control" name="gender" id="inputGender"
                            value="<?php echo $gender; ?>" placeholder="Male/Female">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" name="address" id="inputAddress"
                            value="<?php echo $address; ?>" placeholder="1234 Main St">
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Address 2</label>
                        <input type="text" class="form-control" name="address2" id="inputAddress2"
                            value="<?php echo $address2; ?>" placeholder="Apartment, studio, or floor">
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="inputCity">City</label>
                            <input type="text" class="form-control" name="city" id="inputCity"
                                value="<?php echo $city; ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputCity">State</label>
                            <input type="text" class="form-control" name="state" id="inputState"
                                value="<?php echo $state; ?>">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="inputZip">Zip</label>
                            <input type="text" class="form-control" name="zip" id="inputZip"
                                value="<?php echo $zip; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputContact">Contact Number</label>
                        <input type="text" class="form-control" name="contact_number" id="inputContact"
                            value="<?php echo $contact_number; ?>" placeholder="Contact Number">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                I agree all details are correctly inserted.
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success" name="submit">Save</button>
                </form>
            </div>
        </div>
    </div>

    <!--Footer-->
    <?php include('./view/footer.php'); ?>

    <script>
        let subMenu = document.getElementById("subMenu");

        function toggleMenu() {
            subMenu.classList.toggle("open-menu");
        }
    </script>
</body>