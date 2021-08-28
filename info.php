<?php

require_once 'components/db_connect.php';



if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM offers WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    }   
}

mysqli_close($connect);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Simple Google Map</title>
        <meta name="viewport" content="initial-scale=1.0">
        <meta charset="utf-8">
        <?php require_once 'components/boot.php'?>
        <style>
            #map {
                height: 90%;
            }
           html, body {
                height: 100%;
                margin: 0;
                padding: 0;
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


    <?php
            echo 
            '<div class="container">
    
            <div class="card-box mt-5">
                <div class="card-thumbnail">
                    <img src="offers/pictures/'.$row['pic'].'" class="img-fluid" alt="">
                </div>
                <h3><a href="#" class="mt-2 text-secondary text-decoration-none">'.$row['location'].'</a></h3>
                <p class="text-secondary mt-2">'.$row['description'].'</p>
                <p class="text-secondary mt-2">'.$row['price'].' "€ per Night"</p> 
                <a href="weather.php?id='.$row['id'].'" class="btn btn-sm btn-primary float-right">Weather Forcast >></a>
                
            </div>
        </div>';
 
?>
      <div class="container mt-3" id="map"></div>
      <script>
        

        
             var cordinates = {

                lat: <?php echo $row['lat']?>,

                lng: <?php echo $row['lng']?>

                };
        var map;
       function initMap() {
              map = new google.maps.Map(document.getElementById('map'), {

             center: {lat: cordinates.lat, lng: cordinates.lng},
              zoom: 18

                });
                var pin = new google.maps.Marker({
                    position : {lat: cordinates.lat, lng: cordinates.lng},
                     map: map
                })
            }

        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBtjaD-saUZQ47PbxigOg25cvuO6_SuX3M&callback=initMap" async defer></script>




    <footer class="text-center text-white " style="background-color: black;width:100%;margin-top:15vh;">
       <div class="text-center p-3" style="background-color: black;">
            © 2021 Copyright:
        <p class="text-white" >Codefactory (classwork-CodeReview)</p>
        </div>
        </footer>
    </body>
</html>