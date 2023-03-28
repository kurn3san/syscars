<?php 
    define('TITLE',"Home");
    include 'includes/header.php';
?>
<div class="wrapper">
    <div class="content">
        <?php
        if(isset($_SESSION['userId'])){
            echo' 
            <style>
            .button-login {
                display: block;
                margin-bottom: 10px;
                font-weight: bold;
                background-color: #f60;
                color: #fff;
                border: none;
                border-radius: 5px;
                padding: 30px 50px;
                font-size: 16px;
                cursor: pointer;
                text-align: center;
                transition: background-color 0.2s ease-in-out;
              }
              #main-div {
                max-width: 600px;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                background-color: #fff;
                margin-bottom:200px;
              }
              </style>
            
            <h2>Hello  Mr. '. strtoupper($_SESSION['userUid']) .' !</h2>  
            <hr>
            
            <div id="main-div" style="display:flex; flex-direction:column;">
            <h4>What would you like to do?</h4>

            <a href="add.php" class="button-login">Add</a>  
			<a href="edit.php" class="button-login">Edit</a>
			<a href="delete.php" class="button-login">Delete</a>
            </div>';
            ## after the sign in is complete, what would you like to do?
            



        }else{
        echo '
        <h1>Hey!</h1>
        <hr>
        <br>Please sign in to continue!  </p>
        <script>
            console.log("$_SESSION is not true 2")
        </script>
        ';

       } 
    ?>

    <?php

   


?>    
    
<?php
if(isset($_SESSION['userId']))
{
    echo '
    <script>
        console.log("$_SESSION is true 3")
    </script>
    ';

}else{
 echo '

 <script>
     console.log("$_SESSION is not true 3")
 </script>
 ';

}

?>
<?php 
    
    include 'includes/footer.php';
?>



