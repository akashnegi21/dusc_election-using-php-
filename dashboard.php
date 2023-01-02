<?php
session_start();
$user=$_SESSION['userdata'];
$candidates=$_SESSION['candidate_data'];
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: ../index.php");
    exit;

}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="shortcut icon" href="https://doonuniversity.ac.in/admin/assets/img/favicon.ico" />
   
    <title>Welcome - <?php echo $_SESSION['userdata']['Name'] ?></title>
    <style>
body{
  background-color: whitesmoke;
}
.profile{
  margin: 10px;
  padding: 20px;
  float: left;
  width: 30%;
}
.group{
  margin: 30px;
  padding: 5px;
  width: 50%;
  float: right;
}
#votebtn{
color:white;
background-color: blue;
border-radius: 5px;
padding: 5px;
font-size: 15px;
width: 15%;
}

    </style>
  </head>
  <body><?php

include 'extra/navbar2.php';
?>
<div class="page">
<div class="profile">
  <div class="card">
  <div class="card-header">
    DOON UNIVERSITY STUDENT
  </div>
  <div class="card-body">
    <h4 class="card-title">Name: <?php echo $user['Name']; ?> </h4>
    <h6 class="card-title">ID: <?php echo $user['Rollno']; ?> </h6>
  
    <h6 class="card-title"> Status: <?php 
     if($user['Voted']==0){
      echo '<b style="color:red"> Not Voted</b>';
    }
      else{
        echo '<b style="color:green">Voted</b>';
      }
      ?>
    </h6>
    
  </div>
</div>

</div>
<div class="group">
<?php
for ($i=0;$i<count($candidates);$i++){
 ?>
<div class="card">
<div class="card-header">
    DOON UNIVERSITY CANDIDATE
  </div>
  <div class="card-body">
    
    <h4 class="card-title">Name: <?php echo $candidates[$i]["Name"] ?> </h4>
    <h6 class="card-title">Department: <?php echo $candidates[$i]["Department"] ?></h6>
    <h6 class="card-title">Votes: <?php echo $candidates[$i]['Votes']?></h6>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <form action="./extra/vote.php" method="POST">
  <input type="hidden" name="gvotes" value="<?php  echo $candidates[$i]['Votes'] ?>">
  <input type="hidden" name="gid" value="<?php  echo $candidates[$i]['ID'] ?>">  
  <input type="hidden" name="user_id" value="<?php  echo $user['Rollno'] ?>">
    <?php
    if ($user['Voted']==0){
    echo '
    
    <input type="submit" class="btn btn-primary" name="votebtn" value="vote" id="votebtn">
    <BR><br> ';
  
  }  
  ?>
  </form>
    </div>
</div>

<?php

echo '<br>';

}

?>


</div>







<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</div>
</body>
</html>