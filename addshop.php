<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add Shop</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="http://localhost/GoogleGeoCodingTestTask/"><img src="./images/logo.png"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./myshop.php">My Shops</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./addshop.php">Add Shop</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav><br/>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="insert.php" method="post">
                        <div class="form-group">
                            <label for="shopName">Shop Name: </label>
                            <input type="text" class="form-control" id="shopName" name="shop_name" placeholder="Enter Shop Name">
                        </div>
                        <div class="form-group">
                            <label for="shopAddress">Shop Address: </label>
                            <input type="text" class="form-control" id="shop_address" name="shop_address" placeholder="Enter Shop Address">
                        </div>
                        <div class="form-group">
                            <label for="shopLng">Longitutte: </label>
                            <input type="text" class="form-control" id="shop_lng" name="shop_lng" placeholder="Enter Shop Longitute">
                        </div>
                        <div class="form-group">
                            <label for="shopLat">Latitude: </label>
                            <input type="text" class="form-control" id="shop_lat" name="shop_lat" placeholder="Enter Shop Latitude">
                        </div>
                        <div class="form-group">
                            <label for="shopType">Shop Type: </label>
                            <input type="text" class="form-control" id="shop_type" name="shop_type" placeholder="Enter Shop Type">
                        </div><br/><br/>
                        <button type="submit" value="Submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        
    </body>
</html>