<?php
session_start();
require_once '../components/db_connect.php';




$sql = "SELECT * FROM offers";
$result = mysqli_query($connect, $sql);

$tbody = ''; 
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $tbody .= "<tr id='".$row['id']."'>
            <td><img class='img-thumbnail rounded-circle' src='pictures/" . $row['pic'] . "' alt=" . $row['pic'] . "></td>
            <td>" . $row['location'] . "</td>
            <td>" . $row['lat'] . "</td>
            <td>" . $row['lng'] . "</td>
            <td>" . $row['price'] . "</td>
            <td>" . $row['description'] . "</td>
            <td><a href='update.php?id=" . $row['id'] . "'><button class='btn btn-primary btn-sm' type='button'>Edit</button></a></td>
            <td><a href='actions/a_delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' type='button'>Delete</a></td>
         </tr>";
    }
} else {
    $tbody = "<tr><td colspan='5'><center>No Data Available </center></td></tr>";
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adm-DashBoard</title>
    <?php require_once '../components/boot.php'?>
    <style type="text/css">        
        .img-thumbnail{
            width: 70px !important;
            height: 70px !important;
        }
        td
        {
            text-align: left;
            vertical-align: middle;
        }
        tr
        {
            text-align: center;
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
          <a class="nav-link active text-light" aria-current="page" href="../index.php">Home</a>
        </li>   
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="#">Admin</a>
        </li> 
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="#">Contact us</a>
        </li> 
     </ul>  
    </div>
  </div>
</nav>



<div class="container mt-5">
    <div class="row">
        <div class="col-2">
        
        
        
        </div>
        <div class="col-8 mt-2">
        <p class='h2'>All Offers</p> <a class="btn btn-sm btn-primary" style="text" href="create.php">add offer</a>
        <table class='table table-striped mt-2'>
            <thead class='table-danger '>
                <tr>
                    <th>Picture</th>
                    <th>location</th>
                    <th>lat</th>
                    <th>lng</th>
                    <th>price</th>
                    <th>description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
            <?=$tbody?>
            </tbody>
        </table>


        
        </div>
    </div>
</div>
<footer class="text-center text-white mt-5" style="background-color: black;width:100%">
       <div class="text-center p-3" style="background-color: black;">
            © 2021 Copyright:
        <p class="text-white" >Codefactory (classwork-CodeReview)</p>
        </div>
        </footer>

        <!-- <script>
            function deleteOffer(id){
                let params=`id=${id }`; //creating the
            //request
                var request = new XMLHttpRequest();
                    request.open("POST", "actions/a_delete.php" ,true);
                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    request.onload=function(){
                        if(this.status== 200){
                            document.getElementById(id).style.visibility = "hidden";
                            var result = JSON.parse(this.responseText);
                            alert(result.status_message);
                        }
                    }
                    request.send(params);
            }
        </script> -->
</body>
</html>