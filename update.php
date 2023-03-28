<?php 
    define('TITLE',"Update Selected Car");
    include './includes/header.php';
?>
<?php 
$s1=$_SESSION['idCars'];
$s2= $_SESSION['Model'];

$s3= $_SESSION['Brand'];
$s= $_SESSION['colour'];

$s4= $_SESSION['kacTane'];
$s5= $_SESSION['description'];
$s6= $_SESSION['carImg1'];
$s7= $_SESSION['carImg2'];
$s8= $_SESSION['carImg3'];
$s9=$_SESSION['carImg4'];

?>

<?php 

    echo'
    <script>
    console.log("here");
    </script>
    <style>
      #update-div {
        background-color: #fff;
        color: #333;
        font-family: Arial, sans-serif;
        font-size: 16px;
        line-height: 1.5;
        width:100%;
      }

      h1 {
        color: #f60;
        text-align: left;
        margin-top: 100px;
      }

      form {
        max-width: 600px;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        background-color: #fff;
        margin-bottom:200px;
      }

      label {
        display: block;
        margin-bottom: 10px;
        font-weight: bold;
        color: #666;
      }

      input[type="text"],
      input[type="number"],
      textarea {
        display: block;
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 16px;
        margin-bottom: 20px;
      }

      textarea {
        resize: vertical;
        height: 150px;
      }

      input[type="file"] {
        display: block;
        margin-bottom: 20px;
      }

      input[type="submit"],.go-back {
        background-color: #f60;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.2s ease-in-out;
      }

      input[type="submit"]:hover {
        background-color: #c15000;
      }
    </style>
    
    <div id="update-div" style="width:900px; display:flex; flex-direction:column; margin-left:20px; margin-top:100px;">
    <hr>
    <h1>Add a new Car</h1>
    <a href="index.php" class="go-back" style="width:fit-content;">Go back</a> 
    <hr>

    <br><br><br><br><br>
    <form method="POST" action="includes/process-update.inc.php?id='.$s1.'" enctype="multipart/form-data">
      <label for="model">Model:</label>
      <input type="text" name="u-model" value="'. $s2.'" required><br><br>

      <label for="brand">Brand:</label>
      <input type="text" name="u-brand" value="'. $s3.'" required><br><br>

      <label for="colour">Colour:</label>
      <input type="text" name="u-colour" value="'. $s.'"required><br><br>

      <label for="kacTane">Quantity:</label>
      <input type="number" name="u-kacTane" value="'. $s4.'"required><br><br>

      <label for="description">Description:</label>
      <textarea name="u-description">'.$s5.'</textarea><br><br>

      <label for="carImg1">Image 1:</label>
      <img id="userDp" src=./uploads/'.$s6.'>
      <input type="file" name="u-carImg1" value="'. $s6.'"><br><br>
      <img id="userDp" src=./uploads/'.$s7.'>
      <label for="carImg2">Image 2:</label>
      <input type="file" name="u-carImg2" value="'. $s7.'"><br><br>
      <img id="userDp" src=./uploads/'.$s8.'>
      <label for="carImg3">Image 3:</label>
      <input type="file" name="u-carImg3" value="'. $s8.'"><br><br>
      <img id="userDp" src=./uploads/'.$s9.'>
      <label for="carImg4">Image 4:</label>
      <input type="file" name="u-carImg4" value="'. $s9.'"><br><br>

      <input type="submit" name="update-car-submit" value="update!">
    </form>




    </div>


    '
?>
<?php 
    include './includes/footer.php';
?>