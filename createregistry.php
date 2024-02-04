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
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $rname = $_POST['registryname'];
    $keyword = $_POST['subjectkeyword'];
    $officer = $_POST['sendofficer'];
    $date = date("Y-m-d");
    $time = date("h:i:sa");
     

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "userdetails";

    $conn = mysqli_connect($servername, $username , $password, $dbname);

    if(!$conn){
        die("Sorry we failed to connect: ". mysqli_connect_error());
    }
    else{

        $sql = "INSERT INTO `registry` (`name`, `subjectordate`, `Date`, `Time`, `sendOfficer`) VALUES ('$rname', '$keyword','$date', '$time', '$officer')";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo '<div class="alert alert-success" role="alert">
            registry created.
            </div>'; 
        }
        else{
            echo "The record was not created successfully " . mysqli_connect_error($conn);
        }
    }
}
?>
<form style = "margin:6em; font-family:cursive" action="/PROJECT/createregistry.php" method = "post">
  <h1 style= "color:blue">Create Registry</h1>
  <div class="form-group"  >
    <label for="registryname">Registry Name/no.</label>
    <input type="text" class="form-control" id="registryname" name="registryname" aria-describedby="name" placeholder="name">
  </div>
  <div class="form-group">
    <label for="subjectkeyword">Subject Keyword/date</label>
    <input type="text" class="form-control" id="keyword" name = "subjectkeyword" aria-describedby="keyword" placeholder="keyword">
  </div>
  <div class="form-group">
    <label for="sendofficer">Send Officer</label>
    <input type="text" class="form-control" id="officer" name="sendofficer" aria-describedby="send" placeholder="send">
  </div>
  <div>
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
  <button type="submit" style = "margin:3em" class="btn btn-danger"><a href="admin.php">Back</a></button>
</form>
</body>
</html>
