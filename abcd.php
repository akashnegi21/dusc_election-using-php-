<?php


for ($i=0;$i<count($candidates);$i++){
 ?><div>
  <b>Name:</b><?php echo $candidates[$i]["Name"] ?><br>
  <b>Department:</b><?php echo $candidates[$i]["Department"] ?><br>
  <b>Votes:</b><?php echo $candidates[$i]['Votes']?>
  <form action="./extra/vote.php" method="POST">
  <input type="hidden" name="gvotes" value="<?php  echo $candidates[$i]['Votes'] ?>">
  <input type="hidden" name="gid" value="<?php  echo $candidates[$i]['ID'] ?>">  
  <input type="hidden" name="user_id" value="<?php  echo $user['Rollno'] ?>">
  <?php
    if ($user['Voted']==0){
    echo '
    <input type="submit" name="votebtn" value="vote" id="votebtn"><BR><br>';
  }
 ?>
    </form>
  <hr>
  
</div>








<div class="card">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>


<?php
    if ($user['Voted']==1){
    echo '<hr>
    <b style="color:green">Voted</b><br><b style="color:red">You cannot vote now</b>
    ';
  }
 ?>