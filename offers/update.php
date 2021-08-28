<?php
session_start();
require_once '../components/db_connect.php';


// if (!isset($_SESSION['adm'])) {
//     header("Location: ../index.php");
//     exit;
// }



//fetch and populate form
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM offers WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $location = $data['location'];
        $lat = $data['lat'];
        $lng = $data['lng'];
        $price = $data['price'];
        $description = $data['description'];
        $pic = $data['pic'];

       
    }   
}

mysqli_close($connect);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Animal</title>
        <?php require_once '../components/boot.php'?>
        <style type= "text/css">
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 60% ;
            }  
            .img-thumbnail{
                width: 70px !important;
                height: 70px !important;
            }     
        </style>
    </head>
    <body>
        <fieldset>
           
            <form action="actions/a_update.php?id=<?php echo $id ?>" method= "post" enctype="multipart/form-data">
                <table class='table'>
                
                     <tr>
                        <th>location</th>
                        <td><input class='form-control' type="text"  id="location" name="location"  placeholder="location" value="<?php echo $location ?>" /></td>
                    </tr>
                     <tr>
                        <th>Latitude</th>
                        <td><input class='form-control' type="number" step="0.1" id="lat" name="lat"  placeholder="Latitude" value="<?php echo $lat ?>"/></td>
                    </tr>
                    
                    <tr>
                        <th>Longitude</th>
                        <td><input class='form-control' type="number" step="0.1"  id="lng" name="lng"  placeholder="Longitude"value="<?php echo $lng ?>" /></td>
                    </tr>

                    <tr>
                        <th>Price</th>
                        <td><input class='form-control' type="number" step="0.1"  id="price" name="price"  placeholder="Price" value="<?php echo $price ?>" /></td>
                    </tr>
                    
                    <tr>
                        <th>Picture</th>
                        <td><input class='form-control' type="text" name="pic" id="pic" placeholder="Picture" value="<?php echo $pic ?>" /></td>
                    </tr>

                    <tr>
                        <th>Description</th>
                        <td><textarea class='form-control' type="text" name="description"  id="description" placeholder="description"><?php echo $description ?></textarea></td>
                    </tr>   
                 
                 
                    
                    <tr>
                        <td><button name="submit" class='btn btn-success' type="submit">update Offer</button></td>
                    </tr>
                </table>
            </form>
            </form>
        </fieldset>
    </body>
</html>