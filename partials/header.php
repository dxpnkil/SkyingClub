<?php
session_start();

echo '<nav class="navbar navbar-expand-lg navbar-light bg-light shadow sticky-top">
<div class="container-fluid">
  <img src="./img/favicon.ico"  alt="">
  <a class="navbar-brand" href="index.php">Skying Club</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link" href="#about">ABOUT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#market">MARKET</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#event">EVENT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#_discussion">DISCUSSIONS</a>
      </li>
    </ul>';
  
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  echo '<form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-secondary" type="submit">Search</button>
        </form>
        <div class="mx-2">
          <button class="btn border-0 bg-light"  type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
            <img src="img/user-default.png" width="40px" alt="">
          </button>
        </div>';
}
else {
    echo '<form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
          </form>
          <div class="mx-2">
            <button type="button" class="btn btn-secondary ml-2" data-bs-toggle="modal" data-bs-target="#loginModal" >LOGIN</button>
            <button type="button" class="btn btn-secondary mx-2" data-bs-toggle="modal" data-bs-target="#signupModal">SIGN UP</button>
          </div>';
}

echo'</div>

</div>
</nav>';


include '_loginModal.php';
include '_signupModal.php';
include 'userinfo.php';

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
            <strong>Success!</strong> You can now login.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
}
 ?>