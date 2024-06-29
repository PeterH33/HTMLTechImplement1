<?php
function sanitizeString($var)
{
    $var = stripslashes($var);
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;
}
?>

<html>
<head>
    <title>Records</title>
</head>

<body>


    <?php
    //This section for the table
    //Open connection
    $DBConnect = mysqli_connect("127.0.0.1", "sqlimp", "pword", "mysqlimp");
    if($DBConnect == false)
    {
        //DB error here

    } else {
        //Successful dbConnect logic here

        //Default Show everything
        $SQLString = "SELECT 
        p.personID, 
        p.firstName, 
        p.lastName, 
        p.address, 
        c.city AS cityName, 
        s.state AS stateName, 
        z.zipCode AS zipCode, 
        co.color AS favoriteColor, 
        d.day AS favoriteDay, 
        p.favNumber, 
        p.ts 
        FROM 
        persons p 
        JOIN cities c ON p.cityKey = c.cityKey 
        JOIN states s ON p.stateKey = s.stateKey 
        JOIN zipCodes z ON p.zipCodeKey = z.zipCodeKey 
        JOIN colors co ON p.colorKey = co.colorKey 
        JOIN days d ON p.dayKey = d.dayKey
        ";

        //Run the query
        $queryResult = mysqli_query($DBConnect, $SQLString);

        if (mysqli_num_rows($queryResult) > 0){
            //success print something
            print"List of Records";
            print"<table width = '100%' border = '1'>";
            print"<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Address</th><th>City</th><th>State</th><th>Zip Code</th><th>Favorite Color</th><th>Favorite Number</th><th>Favorite Day</th><th>Time Stamp</th></tr>";
            while ($row = mysqli_fetch_assoc($queryResult)){
                //Table lines
                print"<tr> <td>{$row['p.personID']}</td> <td>{$row['p.firstName']}</td> <td>{$row['p.lastName']}</td> <td>{$row['p.address']}</td> <td>{$row['c.city']}</td> <td>{$row['s.state']}</td> <td>{$row['z.zipCode']}</td> <td>{$row['co.color']}</td> <td>{$row['d.day']}</td> <td>{$row['p.favNumber']}</td> <td>{$row['p.tx']}</td>  </tr>";
            }
        } else {
            //failure state
            print"Error no results";
        }

        //Remove result from memory
        mysqli_free_result($queryResult);
    }

    //close connection
    mysqli_close($DBConnect);
    ?>

    


</body>




</html>