<?php
session_start();
require_once 'components/db_connect.php';


$sql = "SELECT * FROM offers";
$result = mysqli_query($connect, $sql);

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login & Registration System</title>

<?php require_once 'components/boot.php'?>
<style type="text/css">

body, html {
    height: 100%;
}

/* The hero image */
.hero-image {
  
  background-image:url("offers/pictures/hero.jpg");

  
  height: 40%;

  
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}


.hero-text {
  text-align: center;
  position: absolute;
  top:20%;
  left: 50%;
  transform: translate(-50%, -50%);
  color:white;

}

</style>


</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: black!important;">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="#">Everest Travel Agency</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
        </li>   
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="offers/admin.php">Admin</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="#">Contact us</a>
        </li> 
     </ul>  
    </div>
  </div>
</nav>



<div class="hero-image">
  <div class="hero-text">
    <h1>Welcome to Everest Agency</h1>
    <p>since 1988</p>
  
  </div>
</div>




            
        
       

    <div class="container border mt-5">
    <div class="row">
        <div class="col-12">
            <!-- <h5 class="mt-4 mb-4">Offers:</h5> -->
        </div>


    <?php

if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
       echo '<div class="col-md-6 col-lg-4">
    
       <div class="card-box mt-5">
           <div class="card-thumbnail">
               <img src="offers/pictures/'.$row['pic'].'" class="img-fluid" alt="">
           </div>
           <h3><a href="#" class="mt-2 text-secondary text-decoration-none">'.$row['location'].'</a></h3>
           <p class="text-secondary mt-2">'.$row['description'].'</p>
           <a href="info.php?id='.$row['id'].'" class="btn btn-sm btn-primary float-right">More Info >></a>
       </div>
   </div>';
    }
} 

    ?>

        

       

       
    </div>
</div>




    <footer class="text-center text-white " style="background-color: black;width:100%;margin-top:15vh;">
       <div class="text-center p-3" style="background-color: black;">
            © 2021 Copyright:
        <p class="text-white" >Codefactory (classwork-CodeReview)</p>
        </div>
        </footer>
</body>
</html>