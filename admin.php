<?php
session_start();
$candidates=$_SESSION['candidate_data'];
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: ../index.php");
    exit;

}
if($_SERVER['REQUEST_METHOD']=='POST'){
  include 'extra/dbconnect.php';
  $name=$_POST['name'];
  $id=$_POST['id'];
  $department=$_POST['department'];
  $sql="INSERT INTO `candidatelist` (`Name`, `ID`, `Department`, `Votes`) VALUES ('$name', '$id', '$department', '0')";
  
  $res=mysqli_query($conn,$sql);

}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <link rel="shortcut icon" href="https://doonuniversity.ac.in/admin/assets/img/favicon.ico" />
   
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Hello Admin</title>
<style>
    .left{
        margin: 10px;
  padding: 20px;
  float: left;
  width: 30%;
    }
    .right{
        margin: 30px;
  padding: 5px;
  width: 49%;
  float: right;
    }
</style> 
</head>
  <body>
    <?php
    include 'extra/navbar2.php';
    ?>
<div class="page">
  <div class="left">
  <h4>Register the candidates for election!</h4>

<form action="./admin.php" method="POST">
  <div class="form-group my-3">
    <label for="exampleName"><b>Name of candidate</b></label>
    <input type="text" name="name" class="form-control" id="exampleInputtext" placeholder="Enter name of candidate">
     </div>
  <div class="form-group">
    <label for="exampleID"><b>ID</b></label>
    <input type="text" name="id" class="form-control" id="exampleInputID"  placeholder="Enter ID of candidate">
     </div>
  <div class="form-group">
    <label for="exampleInputDepartment"><b>Department</b></label>
    <input type="text" name="department" class="form-control" id="exampleInputDepartment" placeholder="Enter department of candidate">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
  </div>
<div class="right">
<div class="container my-4">
<h4>Candidates with there respective votes!</h4>

<table class="table table-hover my-3">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Votes</th>
    </tr>
  </thead>
  <tbody>
  <?php
  include 'extra/dbconnect.php';
  $sql="select * from `candidatelist`";
    $res=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($res);
    while($row=mysqli_fetch_assoc($res))
    {
        echo '<tr>
      <td>'.$row['Name'].'</td>
     
      <td>'.$row['Votes'].'</td>
    </tr>';
    }
 ?>
    
  </tbody>
</table>
</div></div>
</div>

</body>
</html>