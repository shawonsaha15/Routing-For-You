<?php

    require_once 'connection.php';
        
    $empmsg_fname = $empmsg_lname = $empmsg_email = $empmsg_password = $empmsg_repeat_password = '';

    if(isset($_POST['submit'])){
        $user_fname = $_POST['user_fname'];
        $user_lname = $_POST['user_lname'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $user_repeat_password = $_POST['user_repeat_password'];
        $user_type = $_POST['user_type'];
        
        $md5_user_password = md5($user_password);
    }

    if(empty($user_fname)){
        $empmsg_fname = 'Please fill up this field.';
    }
    if(empty($user_lname)){
        $empmsg_lname = 'Please fill up this field.';
    }
    if(empty($user_email)){
        $empmsg_email = 'Please fill up this field.';
    }
    if(empty($user_password)){
        $empmsg_password = 'Please fill up this field.';
    }
    if(empty($user_repeat_password)){
        $empmsg_repeat_password = 'Please fill up this field.';
    }

    if(!empty($user_fname) && !empty($user_lname) && !empty($user_email) && !empty($user_password) && !empty($user_repeat_password)){
        if($user_password === $user_repeat_password){
            
            $sql = "INSERT INTO users(user_fname, user_lname, user_email, user_password, user_type) VALUES ('$user_fname','$user_lname','$user_email','$md5_user_password','$user_type')";
            
            if($conn->query($sql) == TRUE){
                header('location:login.php?usercreated');
            }else{
                echo 'Passwords do not match';
            
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
                    <form action="registration.php" method="POST">
                        <div class="mt-2">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" name="user_fname" value="<?php if(isset($_POST['submit'])){echo $user_fname;} ?>">
                            <?php if(isset($_POST['submit'])){
                                echo "<span class='text-danger'>".$empmsg_fname."</span>";}?>
                        </div>
                        <div class="mt-2">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="user_lname" value="<?php if(isset($_POST['submit'])){echo $user_lname;} ?>">
                            <?php if(isset($_POST['submit'])){
                                echo "<span class='text-danger'>".$empmsg_lname."</span>";}?>
                        </div>
                        <div class="mt-2">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" name="user_email" value="<?php if(isset($_POST['submit'])){echo $user_email;} ?>">
                            <?php if(isset($_POST['submit'])){
                                echo "<span class='text-danger'>".$empmsg_email."</span>";}?>
                        </div>
                        <div class="mt-2">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="user_password">
                            <?php if(isset($_POST['submit'])){
                                echo "<span class='text-danger'>".$empmsg_password."</span>";}?>
                        </div>
                        <div class="mt-2">
                            <label class="form-label">Repeat Password</label>
                            <input type="password" class="form-control" name="user_repeat_password">
                            <?php if(isset($_POST['submit'])){
                                echo "<span class='text-danger'>".$empmsg_repeat_password."</span>";}?>
                        </div>
                        <input type="radio" name="user_type" value="admin">Admin
                        <input type="radio" name="user_type" value="user">User
                        <div class="mt-2">
                            <button class="btn btn-success" name="submit">Submit</button>
                        </div>
                    </form>
					<hr>
                    <h5>Have an account? <a href="login.php">Login</a></h5>
                </div>
                <div class="col-4">
                </div>
            </div>
        </div>
		
		<?php include('./view/footer.php'); ?>

    </body>