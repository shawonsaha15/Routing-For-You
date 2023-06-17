<?php
    require_once 'connection.php';

    session_start();
    
    $empty_email = $empty_password = '';

    if(isset($_POST['submit'])){
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $user_type = $_POST['user_type'];
        
        $md5_user_password = md5($user_password);
        
        if(empty($user_email)){
            $empty_email = 'Please fill up this field.';
        }
        
        if(empty($user_password)){
            $empty_password = 'Please fill up this field.';
        }
        
        if(!empty($user_email) && !empty($user_password)){
            $sql = "SELECT * FROM users WHERE user_email = '$user_email' AND user_password = '$md5_user_password' AND user_type = '$user_type'";
            
            $query = $conn->query($sql);
            
            if($query->num_rows > 0){
                if($user_type == "user"){
                    header('location:dashboard_user.php?email=' . $user_email);
                }
                else if($user_type == "admin"){
                    header('location:dashboard_admin.php?email=' . $user_email);
                }
            }else{
                echo 'Not found';
            }
        }
    }
?>



    <body>
		<?php include('./view/header_loggedout.php'); ?>
		
        <div class="container">
            <div class="row">
                <div class="col-4">
                </div>
                <div class="col-4">
                    <form action="login.php" method="POST">
                        <div class="mt-2">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" name="user_email" value="<?php if(isset($_POST['submit'])){echo $user_email;} ?>">
                            <?php if(isset($_POST['submit'])){
                                echo "<span class='text-danger'>".$empty_email."</span>";}?>
                        </div>
                        <div class="mt-2">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="user_password" value="<?php if(isset($_POST['submit'])){echo $user_password;} ?>">
                            <?php if(isset($_POST['submit'])){
                                echo "<span class='text-danger'>".$empty_password."</span>";}?>
                        </div>
                        <input type="radio" name="user_type" value="admin">Admin
                        <input type="radio" name="user_type" value="user">User
                        <div class="mt-2">
                            <button class="btn btn-success" name="submit">Login</button>
                        </div>
                    </form>
					<hr>
                    <h5>Don't have an account? <a href="registration.php">Register here!</a></h5>
                </div>
                <div class="col-4">
                </div>
            </div>
        </div>
		
		<?php include('./view/footer.php'); ?>
		
    </body>