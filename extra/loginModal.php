<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

include 'dbconnect.php';
$rollno=$_POST['rollno'];
$password=$_POST['password'];

$sql="SELECT * FROM `registeredusers` WHERE `Rollno`='$rollno' AND `Password`='$password'";
$result=mysqli_query($conn,$sql);
$sql1="SELECT * from candidatelist";
$result1=mysqli_query($conn,$sql1);
if($result1){
$row1=mysqli_fetch_all($result1,MYSQLI_ASSOC);
session_start();
$_SESSION['candidate_data']=$row1;   
}
if(mysqli_num_rows($result)>0){
      while($row=mysqli_fetch_assoc($result)){
          session_start();
          
          $_SESSION['loggedin']=true;
          $_SESSION['userdata']=$row;
          
          header('location:../dashboard.php');
        }
}


else{
  echo '<script>alert("invalid credentials please verify your login details")
  window.location="../index.php";
  </script>';
  
}
}


?>

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Login To Vote</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="../voting/extra/loginModal.php" method='post'>
  <div class="form-group">
    <label for="exampleInputEmail1">RollNo.</label>
    <input type="text" class="form-control" name='rollno' id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">PASSWORD</label>
    <input type="password" class="form-control" name='password' id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 
      </div>
    </div>
  </div>
</div>