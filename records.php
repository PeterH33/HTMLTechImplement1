<?php
function sanitizeString($var)
{
    $var = stripslashes($var);
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="CSS/myStyle.css">
    <style>
        th, td {
            border-bottom: 1px solid gray;
        }
        table, th, td {
            border-collapse: collapse;
            padding: 10px;
        }
    </style>
    <title>Records</title>
</head>
<body>

    <?php
    // This section for the table
    // Open connection
    $DBConnect = mysqli_connect("127.0.0.1", "sqlimp", "pword", "mysqlimp");
    if ($DBConnect == false) {
        // DB error here
        echo "Failed to connect to the database.";
    } else {
        // Successful dbConnect logic here

        // Default Show everything
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
        JOIN days d ON p.dayKey = d.dayKey";

        // Run the query
        $queryResult = mysqli_query($DBConnect, $SQLString);

        if (mysqli_num_rows($queryResult) > 0) {
            // Success print something
            echo "List of Records";
            echo "<table width='100%'>";
            echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Address</th><th>City</th><th>State</th><th>Zip Code</th><th>Favorite Color</th><th>Favorite Day</th><th>Favorite Number</th><th>Time Stamp</th></tr>";
            while ($row = mysqli_fetch_assoc($queryResult)) {
                // Table lines
                echo "<tr><td>{$row['personID']}</td><td>{$row['firstName']}</td><td>{$row['lastName']}</td><td>{$row['address']}</td><td>{$row['cityName']}</td><td>{$row['stateName']}</td><td>{$row['zipCode']}</td><td>{$row['favoriteColor']}</td><td>{$row['favoriteDay']}</td><td>{$row['favNumber']}</td><td>{$row['ts']}</td></tr>";
            }
            echo "</table>";
        } else {
            // Failure state
            echo "Error: no results found.";
        }

        // Remove result from memory
        mysqli_free_result($queryResult);
    }

    // Close connection
    mysqli_close($DBConnect);
    ?>

    <footer>
        <hr>
        <div>
            <img src="FSUlogo.png" alt="">
        </div>
        <br>
        HTML and Server/Technology Implementation
    </footer>

</body>
</html>