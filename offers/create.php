<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php require_once '../components/boot.php'?>
        <title>PHP CRUD  |  Add offers</title>
        <style>
            fieldset {
                margin: auto;
                margin-top: 100px;
                width: 60% ;
            }       
        </style>
    </head>
    <body>
        <fieldset>
            <legend class='h2'>Add offers</legend>
                <table class='table'>
                   
                    <tr>
                        <th>Location</th>
                        <td><input class='form-control' type="text" id="location" name="location"  placeholder="location" /></td>
                    </tr>   

                    <tr>
                        <th>Latitude</th>
                        <td><input class='form-control' type="number" step="0.1" id="lat" name="lat"  placeholder="Latitude" /></td>
                    </tr>
                    
                    <tr>
                        <th>Longitude</th>
                        <td><input class='form-control' type="number" step="0.1"  id="lng" name="lng"  placeholder="Longitude" /></td>
                    </tr>

                    <tr>
                        <th>Price</th>
                        <td><input class='form-control' type="number" step="0.1"  id="price" name="price"  placeholder="Price" /></td>
                    </tr>
                    
                    <tr>
                        <th>Picture</th>
                        <td><input class='form-control' type="text" name="pic" id="pic" placeholder="Picture" /></td>
                    </tr>

                    <tr>
                        <th>Description</th>
                        <td><textarea class='form-control' type="text" name="description"  id="description" placeholder="description"></textarea></td>
                    </tr>   
                 
                    
                    <tr>
                        <td><button onClick="storeOffer()" name="submit" class='btn btn-success' type="button">Insert offers</button></td>
                        <td><a href="admin.php"><button class='btn btn-warning' type="button">Back</button></a></td>
                    </tr>
                </table>
        </fieldset>

        <script>

                function storeOffer(){

                    //data
                    var location = document.getElementById("location").value;
                    if(location == "")
                    {
                        alert("please fill the location input");
                        return false;
                    }
                    var lat = document.getElementById("lat").value;
                    var lng = document.getElementById("lng").value;
                    var price = document.getElementById("price").value;
                    var pic = document.getElementById("pic").value;
                    var description = document.getElementById("description").value;

                    //prepare data to send
                    let params=`location=${location }&lat=${lat}&lng=${lng}&price=${price}&pic=${pic}&description=${description}`; //creating the
                   
                    //request
                    var request = new XMLHttpRequest();
                    request.open("POST", "actions/a_create.php" ,true);
                    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    request.onload=function(){
                        if(this.status== 200){
                            var result = JSON.parse(this.responseText);
                            alert(result.status_message);
                        }
                    }
                    request.send(params);
                }

        </script>



    </body>
</html>