<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="alert alert-info" style = "font-family:cursive" role="alert">
  Search by registry name/no.
</div>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $rname = $_POST['registryname'];
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "userdetails";

    $conn = mysqli_connect($servername, $username , $password, $dbname);

    if(!$conn){
        die("Sorry we failed to connect: ". mysqli_connect_error());
    }
    else{
    
        $sql = "DELETE FROM `registry` WHERE `registry`.`name` = '$rname' ";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo '<div class="alert alert-success" role="alert">
            username deleted successfully.
            </div>'; 
        }
        else{
            echo "The record was not created successfully " . mysqli_connect_error($conn);
        }
    }
}

?>
<form style = "margin:6em" action="/PROJECT/deleteregistry.php" method = "post">
  <h1 style= "color:blue; font-family:cursive">Delete Registry</h1>
  <div class="form-group"  >
    <label for="registryname">Registry Name/no.</label>
    <input type="text" class="form-control" id="registryname" name="registryname" aria-describedby="name" placeholder="name">
  </div>
  <div>
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>  
  <button type="submit" style = "margin:3em" class="btn btn-danger"><a href="admin.php">Back</a></button>
</form>  
</body>
</html>



