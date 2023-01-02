<?php echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/voting/index.php">DOON UNIVERSITY VOTING</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
              </li>
     
    </ul>
    
    <button class="btn btn-outline-success ml-2"  data-toggle="modal" data-target="#adminModal"">Admin Login</button>
    <button class="btn btn-outline-success ml-2"  data-toggle="modal" data-target="#loginModal"">Login</button>
    <button class="btn btn-outline-success mx-2" data-toggle="modal" data-target="#registerModal">Register</button>

  </div>
</nav>';
include 'extra/adminModal.php';
include 'extra/loginModal.php';
include 'extra/registerModal.php';
?>
