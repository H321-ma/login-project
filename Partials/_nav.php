<?php

if(isset($_SESSION['login']) && $_SESSION['login']==true){
     $login = true;      
}
else{
  $login = false;      
}
echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/LOGIN SYSTEM PHP PROJECT">isecure</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/LOGIN SYSTEM PHP PROJECT/Welcome.php">Home <span class="sr-only">(current)</span></a>
      </li>';

   if(!$login){
    echo  '<li class="nav-item">
        <a class="nav-link" href="/LOGIN SYSTEM PHP PROJECT/login.php">Login</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/LOGIN SYSTEM PHP PROJECT/Signup.php">Signup</a>
      </li>';
   }
   if($login){      
    echo '<li class="nav-item">
        <a class="nav-link" href="/LOGIN SYSTEM PHP PROJECT/logout.php">Logout</a>
      </li>';
   }
      
    echo '</ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>';
?>