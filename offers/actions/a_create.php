<?php

require_once '../../components/db_connect.php';



if ($_POST) {

    $location = $_POST['location'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $description = $_POST['description'];
    $pic = $_POST['pic'];
    $price = $_POST['price'];
    
   
    // $uploadError = '';

   
    $sql = "INSERT INTO offers (location,description ,lat, lng, price,pic) VALUES ('$location', '$description', $lat,$lng,$price, '$pic')";


    if (mysqli_query($connect, $sql) === true) {
        response(200, "success " , null);
    } else {
        response(422, "error " , null);
    }
    mysqli_close($connect);
} 

// Function for delivering a JSON response
function response($status,$status_message,$data){
     
    // $response array
    $response['status']=$status;
    $response['status_message']=$status_message;
    $response['data']=$data;
 
    //Generating JSON from the $response array
    $json_response=json_encode($response);
 
    // Outputting JSON to the client
    echo $json_response;
 }
?>

