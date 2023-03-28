<?php

    session_start();
    require 'dbh.inc.php';

    $companyName = "PHP Login/Registration System";
    
    function strip_bad_chars( $input ){
        $output = preg_replace( "/[^a-zA-Z0-9_-]/", "", $input);
        return $output;
    }
?>  

<!DOCTYPE html>

<html>
    <head>
        <title><?php echo TITLE; ?></title>
        <link href="includes/styles.css" rel="stylesheet"> 
        <link rel="shortcut icon" href="" />
    </head>
    <body id="final-example" style="display:flex; flex-direction:row;">
        
    <!-------     LOGIN / LOGOUT FORM               --------->
    
    <?php 
    
    if(isset($_SESSION['userId']))
    {
        echo '
        <script>
            console.log("$_SESSION is true")
        </script>
        ';

    }
    else
    {
        echo '
        
        <script>
            console.log("$_SESSION is not true")
        </script>
        
        ';
        

    }
    
    ?>
        
    <div id="login">
        
        <?php 
            
            if(isset($_SESSION['userId']))
            {
                echo'
                
                
                <div style="text-align: center; display:flex; flex-direction: column; width:200px;">
                        <img id="userDp" src=./uploads/'.$_SESSION["userImg"].'>
                        <div id="brotherdiv" style="display:none ">
                            <h3>' . strtoupper($_SESSION['userUid']) . '</h3>
                            <a href="profile.php" class="button login">Profile</a>  
						    <a href="edit-profile.php" class="button login">Edit Profile</a>
                        </div>
                        <a href="includes/logout.inc.php" class="button login">Logout</a>
                    </div>
                    
                    <script>
		            var userDp = document.getElementById("userDp");
		            var buttonLogin = document.getElementById("brotherdiv");

		            userDp.addEventListener("click", function () {
			            if (buttonLogin.style.display === "none") {
                            buttonLogin.style.display = "block";
                        } else {
                            buttonLogin.style.display = "none";
                        }
		                });



	            </script>
                
                ';
            }
            else
            {
                if(isset($_GET['error']))
                {
                    if($_GET['error'] == 'emptyfields')
                    {
                        echo '<p class="closed">*please fill in all the fields</p>';
                    }
                    else if($_GET['error'] == 'nouser')
                    {
                        echo '<p class="closed">*username does not exist</p>';
                    }
                    else if ($_GET['error'] == 'wrongpwd')
                    {
                        echo '<p class="closed">*wrong password</p>';
                    }
                    else if ($_GET['error'] == 'sqlerror')
                    {
                        echo '<p class="closed">*website error. contact admint to have it fixed</p>';
                    }
                }

                echo '
                    <div style = "width:150px;">
                        <form method="post" action="includes/login.inc.php" id="login-form ">
                        
                            <img id="userDp2" src="./uploads/default.png">
                            <input type="text" id="name" name="mailuid" placeholder="Username...">
                            <input type="password" id="password" name="pwd" placeholder="Password...">
                            <input type="submit" class="button next login" name="login-submit" value="Login">
                        

                        </form>
                        <a href="signup.php" class="button previous">Signup</a>
                
                    </div>';               
            }
        ?>

    </div>
    
    <!-------     LOGIN / LOGOUT FORM END           --------->
