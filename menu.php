    <header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="index.php">PASTEBIN</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">New paste<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="#">Old Paste</a>
        </li>
      
        
		<form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
      </ul>
      
		<!-- Example single danger button -->
      <ul class="navbar-nav mr-auto">
        <?php
         

          if(!isset($_SESSION['success'])){

        ?>
        
        <li class="nav-item">
          <a class="nav-link" style="padding-left: 20px;"href="signup.php">Sign Up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="padding-left: 20px; "href="login.php">Login</a>
        </li>
        <?php   
          }else{
        ?>
         <li class="nav-item">
          <a class="nav-link" style="padding-left: 20px;"href="#">Old Paste</a>
        </li>
          <li class="nav-item">
          <a class="nav-link" style="padding-left: 20px;"href="#"><?php  echo $_SESSION['email'];  ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="padding-left: 20px;"href="logout.php">Logout</a>
        </li>
         

      <?php   } ?>
		
      </ul>
      
    </div>
  </nav>
</header>