<?php


if($_SERVER['REQUEST_METHOD']=='POST'){
include 'dbconnect.php';

$name=$_POST['name'];
$rollno=$_POST['rollno'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
if($password==$cpassword){
  $sql="INSERT INTO `registeredusers` (`Rollno`, `Name`, `Password`, `Voted`) VALUES ('$rollno', '$name', '$password', '0')";
  $res=mysqli_query($conn,$sql);
  if($res==true){
    echo '<script>alert("registered successfully")
    window.location="../index.php";
    </script>';
    }
}
else{
  echo '<script>alert("password and confirm password doesn\'t match")
  window.location="./index.php";
  </script>';
  
}
}
?>
<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="registerModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="./extra/registerModal.php" method="POST">
  <div class="form-group">
    <label for="exampleInputText">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputText" placeholder="Enter Name">
   </div>
  <div class="form-group">
    <label for="id">Roll No.</label>
    <input type="text" class="form-control" name="rollno" id="id" placeholder="ID">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">PASSWORD</label>
    <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputCPassword1">CONFIRM PASSWORD</label>
    <input type="password" class="form-control" name='cpassword' id="exampleInputCPassword1" placeholder="Confirm Password">
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