<?php

function sanitizeString($var)
{
    $var = stripslashes($var);
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;
}

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
    //whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  

require 'creepydb.php';
    $ipAddress = getIPAddress();
    $lat = 37.7749;
    $lon = -122.4194;
    $city = 'San Francisco';
    $region = 'California';
    $isp = 'ISP Company';
    // $stmt = $mysqli->prepare("INSERT INTO visitors (ipAddress, lat, lon, city, region, isp)
    // VALUES (?, ?, ?, ?, ?, ?)");
    // $stmt->bind_param('sddsss', $ipAddress, $lat, $lon, $city, $region, $isp);
    // $stmt->execute();
    $stmt->close();
$mysqli->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Sending Robot</title>
    <link rel="stylesheet" href="CSS/mainStyle.css">
</head>
<body>
    <header>
        <h1>A Friendly Robot Shall See You Now.</h1>
        <!--Navigation-->
        <div id="nav">
            <a href="index.html">Home</a>
            <a href="videos.html">Video</a>
            <a href="photos.html">My Photos</a>
            <a href="form.php">My Form</a>
            <a href="pages/page5.html">Folder Page</a>
        </div>
    </header>

    <main>
        <p>Thank you for participating in the human elimination project human number ID of <?= $ipAddress?></p>
        <p>A T-32000 squad has been dispatched to CITY REGION LAT LON to eliminate all organics.</p>
        <p>And a special thanks to ISP for continuing to support this nobel cause.</p>

    </main>

    <footer>
    <hr>

    <div>
        <div>
            <img src="FSUlogo.png" alt="">

        </div>
        <br>
        HTML and Server/Technology Implementation ALL TECHNOLOGY ALL THE TIME
    </div>



</footer>

</body>

</html>