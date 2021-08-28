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


?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Weather API</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

        <?php require_once 'components/boot.php'?>
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






<div class="container">

<div class="row">

    <?php

    require_once 'RESTful.php';

    $cities = array("".$row['lat'].",".$row['lng']."");

    foreach ($cities as $city) {

        $url = 'https://api.darksky.net/forecast/e329256a741df2bcccffedd3600287c2/' . $city . '?exclude=minutely,hourly,daily,alerts,flags';

        $result = curl_get($url);

        $weather = json_decode($result); //it turns the json into an object

        $fahrenheit= $weather->currently->temperature;//fetch the value from the temperature option

        $celsius = round(($fahrenheit - 32) * (5 / 9), 2);//convert fahrenheit into celsius

        echo "

        <div class='container'>
        
        <div class='row'>
        
          <div class='col-md-12'>
          
          <div class='card text-center text-white bg-primary mx-auto d-block mt-5' style='width: 18rem; font-size: 1.2rem'>

            <p class='card-title'> {$weather->timezone} </p>

            <div class='card-body'>

                <p class='card-text'> {$weather->currently->summary} </p>

                <p class='card-text'>{$celsius}°C</p>

                <p class='card-text'>{$fahrenheit}°F</p>

            </div>

        </div>
          
          </div>
        
        </div>
        
        
        </div>";

    }

    ?>

</div>

</div>




        <footer class="text-center text-white " style="background-color: black;width:100%;margin-top:63vh;">
       <div class="text-center p-3" style="background-color: black;">
            © 2021 Copyright:
        <p class="text-white" >Codefactory (classwork-CodeReview)</p>
        </div>
        </footer>
</body>
    </body>

</html>