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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>
<body>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $createUsername = $_POST['cusername'];
    $password = $_POST['pass'];
     

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "userdetails";

    $conn = mysqli_connect($servername, $username , $password, $dbname);

    if(!$conn){
        die("Sorry we failed to connect: ". mysqli_connect_error());
    }
    else{
    
        $sql = "INSERT INTO `user` (`username`, `Password`) VALUES ('$createUsername', '$password')";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo '<div class="alert alert-success" role="alert">
            username created successfully.
            </div>'; 
        }
        else{
            echo "The record was not created successfully " . mysqli_connect_error($conn);
        }
    }
}
?>
<div class="container" style = "margin:6em"  >
<form action="/PROJECT/usercreation.php" method = "post">
    <div>
        <h3>Create User</h4>
        <div class="input-group has-validation">
       <div class="form-floating is-invalid">
       <label for="cusername">Username</label>
       <input type="text" class="form-control is-invalid" id="username" name="cusername" placeholder="Username" required>
        
       </div>
       <div class="invalid-feedback">
       Please choose a username.
       </div>
       <div class="form-floating">
       <label for="pass">Password</label>
       <input type="password" class="form-control" id="Password" name="pass" placeholder="Password">
       </div>
       <div>
       <button type="submit" style = "margin-top:1em" class="btn btn-success">Create</button>
       </div>

    </div>
    <button type="submit" style = "margin:3em" class="btn btn-danger"><a href="admin.php">Back</a></button>
</form>
</div>
</body>
</html>