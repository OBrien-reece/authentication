<!-- apa nmetoa cde imekuwa apa juu nkaiweka file iko kwa folder ya includes alafu natumia
php kui include apa -->


<!-- mimi hupenda ku code php yangu yote on a singular page ndo maana nmeunda hii file -->

<?php
//tuna start session juu errors zenye zko kwa action.php ni ma session so lazma hii ikuwe apa
//session_start();
include("includes/header.php");
//apa tuna weka file yenye itakuwa na code yetu ya registration
require('action.php');
?>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


<!-- apa natumia bootstrap kuunda form juu sjui css fity na bootsrap is easier -->
<div class="container">
  <div class="col-md-6 m-auto py-4">
    <div class="card">
      <div class="card-header bg-dark text-center text-light">
        <span><h3>Register Here</h3></span>
      </div>
      <div class="card-body">
        <form method="POST" action="action.php">


          <div class="text-danger text-center">
          <?php
          //apa sasa ndo tuta display errors zetu
          if(isset($_SESSION['status'])){
            echo $_SESSION['status'];
            //tuna unset ndo mseee aki reload page hiyo error inalost
            unset($_SESSION['status']);
          }
          ?>
          </div>


          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Enter Name">
          </div>
          <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Enter E-Mail">
          </div> 
<!--           <div class="form-group">
            <input type="number" name="phone" class="form-control" placeholder="Enter Phone Number">
          </div>  -->          
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Enter Password">
          </div>                   
          <div class="form-group">
            <input type="password" name="cPassword" class="form-control" placeholder="Confirm Password">
          </div>

          <button class="btn btn-block btn-success" name="registerBtn" type="submit">Register Here</button>

          <div class="text-center">
            <small><a href="login.php">Already have an account?...Login Here</a></small>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<!-- apa nmetoa cde imekuwa apa juu nkaiweka file iko kwa folder ya includes alafu natumia
php kui include apa -->

<?php
include("includes/scripts.php");
include("includes/footer.php");
?>


