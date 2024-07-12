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
    // get the ip using the above function
    $ipAddress = getIPAddress();
    //make the call to ipapi
    $ipapiString = "http://ip-api.com/json/{$ipAddress}";

    //I fell down a hole reading about and thinking about security with this command again. Interesting stuff that distracts me for a couple hours every time.
    $response = file_get_contents($ipapiString);

    //json to assoc array
    $assocArr = json_decode($response, true);

    $lat = $assocArr['lat'];
    $lon = $assocArr['lon'];
    $city = $assocArr['city'];
    $region = $assocArr['regionName'];
    $isp = $assocArr['isp'];
    $stmt = $mysqli->prepare("INSERT INTO visitors (ipAddress, lat, lon, city, region, isp)
    VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sddsss', $ipAddress, $lat, $lon, $city, $region, $isp);
    $stmt->execute();
    $stmt->close();
$mysqli->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Sending Robot</title>
    <link rel="stylesheet" href="CSS/myStyle.css">
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
        <p>Thank you for participating in the human elimination project human of <?= $ipAddress?></p>
        <p>A T-32000 squad has been dispatched to <?= $city . ", " . $region . " " . $lat . " " . $lon?> to eliminate all organics.</p>
        <p>And a special thanks to <?= $isp?> for continuing to support this noble cause.</p>

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