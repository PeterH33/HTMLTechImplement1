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
            text-align: left;
        }
        table, th, td {
            border-collapse: collapse;
            padding: 10px;
        }
    </style>
    <title>Records</title>
</head>


<body>
    <header>
        <!--Style Override right here-->
        <h1 style="font-weight: normal;">Records</h1>
        <!--Navigation-->
        <div id="nav">
            <!-- &#9776; -->
            <a href="index.html">Home</a>
            <a href="videos.html">Video</a>
            <a href="photos.html">My Photos</a>
            <a href="form.php">My Form</a>
            <a href="pages/page5.html">Folder Page</a>
            <a href="records.php">Records</a>
        </div>
        <hr>
    </header>

    <!-- Section for the information search, easy check of count red -->
    <?php
        $DBConnect = mysqli_connect("127.0.0.1", "sqlimp", "pword", "mysqlimp");
        if ($DBConnect == false) {
            // DB error here
            echo "Failed to connect to the database.";
        } else {
            $SQLString = "SELECT COUNT(*) AS numberOfPersons
            FROM persons p
            JOIN colors co ON p.colorKey = co.colorKey
            WHERE co.color = 'red'
            ";
            $queryResult = mysqli_query($DBConnect, $SQLString);
            $row = mysqli_fetch_assoc($queryResult);
            $numberOfPersons = $row['numberOfPersons'];
            echo "<p>There are " . $numberOfPersons . " persons who love the color red.</p>";
        }
        mysqli_free_result($queryResult);
        mysqli_close($DBConnect);
    ?>

    <!-- Search button here -->
    <form action="search.php" method="post">
    <input type="text" name="searchTerm" id="searchField">
    <input type="submit" value="Search">
    </form>

    <!-- Delete Button here -->
    <form action="gone.php" method="post">
    <input type="text" name="deleteThis" id="deleteField">
    <input type="submit" value="Delete">
    </form>

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
            //*********PHP Version**********
            // echo "<table width='100%'>";
            // echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Address</th><th>City</th><th>State</th><th>Zip Code</th><th>Favorite Color</th><th>Favorite Day</th><th>Favorite Number</th><th>Time Stamp</th></tr>";
            // while ($row = mysqli_fetch_assoc($queryResult)) {
            //     // Table lines
            //     echo "<tr><td>{$row['personID']}</td><td>{$row['firstName']}</td><td>{$row['lastName']}</td><td>{$row['address']}</td><td>{$row['cityName']}</td><td>{$row['stateName']}</td><td>{$row['zipCode']}</td><td>{$row['favoriteColor']}</td><td>{$row['favoriteDay']}</td><td>{$row['favNumber']}</td><td>{$row['ts']}</td></tr>";
            // }
            // echo "</table>";

            //*******JS Experiment for sorting on client side*******
            echo "<table id='myTable' width='100%'>";
            echo "<thead><tr><th onclick='sortTable(0)'>ID</th><th onclick='sortTable(1)'>First Name</th><th onclick='sortTable(2)'>Last Name</th><th onclick='sortTable(3)'>Address</th><th onclick='sortTable(4)'>City</th><th onclick='sortTable(5)'>State</th><th onclick='sortTable(6)'>Zip Code</th><th onclick='sortTable(7)'>Favorite Color</th><th onclick='sortTable(8)'>Favorite Day</th><th onclick='sortTable(9)'>Favorite Number</th><th onclick='sortTable(10)'>Time Stamp</th></tr></thead><tbody>";
            while ($row = mysqli_fetch_assoc($queryResult)) {
                echo "<tr><td>{$row['personID']}</td><td>{$row['firstName']}</td><td>{$row['lastName']}</td><td>{$row['address']}</td><td>{$row['cityName']}</td><td>{$row['stateName']}</td><td>{$row['zipCode']}</td><td>{$row['favoriteColor']}</td><td>{$row['favoriteDay']}</td><td>{$row['favNumber']}</td><td>{$row['ts']}</td></tr>";
            }
            echo "</tbody></table>";
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

    <script>
        function sortTable(n) {
            var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
            table = document.getElementById("myTable");
            switching = true;
            dir = "asc"; 
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[n];
                    y = rows[i + 1].getElementsByTagName("TD")[n];
                    if (dir == "asc") {
                        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    } else if (dir == "desc") {
                        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                            shouldSwitch = true;
                            break;
                        }
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    switchcount ++; 
                } else {
                    if (switchcount == 0 && dir == "asc") {
                        dir = "desc";
                        switching = true;
                    }
                }
            }
        }
    </script>

</body>
</html>