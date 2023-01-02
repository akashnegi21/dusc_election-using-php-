<?php
session_start();
include 'dbconnect.php';
$votes=$_POST['gvotes'];
$total_votes=$votes+1;
$candidate_id=$_POST['gid'];
$user_id=$_POST['user_id'];
$update_votes="UPDATE candidatelist SET Votes='$total_votes' WHERE ID='$candidate_id'";
$res1=mysqli_query($conn,$update_votes);
$update_user_status="UPDATE registeredusers SET Voted=1 WHERE Rollno='$user_id'";
$res2=mysqli_query($conn,$update_user_status);

if($update_user_status and $update_votes){

    $sqll="SELECT * FROM `candidatelist`";
    $resultt=mysqli_query($conn,$sqll);
    $groups = mysqli_fetch_all($resultt,MYSQLI_ASSOC);
    
    $_SESSION['candidate_data']=$groups;
    $_SESSION['userdata']['Voted']=1;
    echo '
    <script>
    alert("voting successful");
    window.location="../dashboard.php";
    </script>
    
     ';
}
else{
    echo '
    <script>
    alert("some error occured");
    window.location="../dashboard.php";
    </script>
    
    ';

}











?>