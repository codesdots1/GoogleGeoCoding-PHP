<?php
    $locations=array();
    $uname="root";
    $pass=""; 
    $servername="localhost";
    $dbname="google_geocoding"; 

    $conn = new mysqli($servername,$uname,$pass,$dbname);

    if ($conn->connect_error) {
        die("Connection failed: ". $conn->connect_error);
    }

    $id = '';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }

    $query =  $conn->query('SELECT * FROM shops WHERE shop_id="'.$id.'"');
    
    while( $row = $query->fetch_assoc()){
        $shopName   = $row['shop_name']; 
        $longitude  = $row['shop_lng'];                              
        $latitude   = $row['shop_lat'];
        $link       = $row['shop_type'];
        $address    = $row['shop_address'];
        $locations[]=array( 
            'shop_name'     => $shopName, 
            'shop_lat'      => $latitude, 
            'shop_lng'      => $longitude, 
            'shop_type'     => $link,
            'shop_address'  => $address,
        );
    }
?>
<html>
    <head>
        <title>My Shop</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <style>
                #map{
                    height: 80%;
                    width: 80%;
                    float: right;
                }
            </style>
        
            <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDrMTfBa9NXyO3izpTE1hrR96YGxmMin4g"></script> 
            <script type="text/javascript">
                var map;
                var Markers = {};
                var infowindow;
                var locations = [
                    <?php for($i=0;$i<sizeof($locations);$i++){ $j=$i+1;?>
                    [
                        'AMC Service',
                        '<p>Name : <?php echo $locations[$i]['shop_name'].' <br/>'.'Address: '.$locations[$i]['shop_address'];?><a href="<?php echo $locations[$i]['shop_type'];?>"></a></p>',
                        <?php echo $locations[$i]['shop_lat'];?>,
                        <?php echo $locations[$i]['shop_lng'];?>,
                        0
                    ]<?php if($j!=sizeof($locations))echo ","; }?>
                ];
                
                var origin = new google.maps.LatLng(locations[0][2], locations[0][3]);
                
                function initialize() {
                    var mapOptions = {
                    zoom: 16,
                    center: origin
                };
                
                map = new google.maps.Map(document.getElementById('map'), mapOptions);
                infowindow = new google.maps.InfoWindow();
                for(i=0; i<locations.length; i++) {
                    var position = new google.maps.LatLng(locations[i][2], locations[i][3]);
                    var marker = new google.maps.Marker({
                        position: position,
                        map: map,
                    });
                    
                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                        return function() {
                            infowindow.setContent(locations[i][1]);
                            infowindow.setOptions({maxWidth: 200});
                            infowindow.open(map, marker);
                        }
                    }) (marker, i));
                    Markers[locations[i][4]] = marker;
                }
                
                locate(0);
            }
            function locate(marker_id) {
                var myMarker = Markers[marker_id];
                var markerPosition = myMarker.getPosition();
                map.setCenter(markerPosition);
                google.maps.event.trigger(myMarker, 'click');
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
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
        </nav>
        <table class="table table-striped" style="float: left; width: 15%;">
            <thead>
                <tr>
                    <th>Shop Name</th>
                </tr>  
            </thead>
            <tbody>
                <?php 
                    $query =  $conn->query("SELECT * FROM shops");
                    while($row = $query->fetch_assoc()){
                        $shopId     = $row['shop_id'];
                        $shopName   = $row['shop_name'];
                        $locations[]=array( 
                            'shop_id'   => $shopId,
                            'shop_name'  => $shopName,
                        ); 
                        ?>
                    <tr>
                        <td> <a href="http://localhost/GoogleGeoCodingTestTask/myshop.php?id=<?php echo $shopId ?>"> <?php echo $shopName; ?> </a> </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div id="map"></div>
    </body>
</html>