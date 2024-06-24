
<?php
//NOTE I bet that there is a way to make the input section conditional based on if there is input, and there is! Thsi works fine
//Default values
    $firstName = "Uncle";
    $lastName = "Bob";
    $address = "19828 Alerio St";
    $city = "Winnetka";
    $state = "California";
    $zipCode = "91306";
    $colors = "Red";
    $favNumber = "19970829";
    $day = "Friday";
//input
// NOTE we can use nil coalescing in PHP! Wonderful!
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $firstName = sanitizeString($_POST['firstName']) ?? $firstName;
        $lastName = sanitizeString ($_POST['lastName']) ?? $lastName;
        $address = sanitizeString ($_POST['address']) ?? $address;
        $city = sanitizeString ($_POST['city']) ?? $city;
        $state = sanitizeString ($_POST['state']) ?? $state;
        $zipCode = sanitizeString ($_POST['zipCode']) ?? $zipCode;
        $colors = sanitizeString ($_POST['colors']) ?? $colors;
        $favNumber = sanitizeString ($_POST['favNumber']) ?? $favNumber;
        $day = sanitizeString ($_POST['day']) ?? $day;
    }

//processing
    $tense = (int)$favNumber > 1 ? "candies" : "candy";

//NOTE Experimenting with the layout of a blended php html paper. 
//I think I like this layout better, it lets VSCodes auto complete continue working
function sanitizeString($var)
{
    // if (get_magic_quotes_gpc())
        $var = stripslashes($var);
    $var = strip_tags($var);
    $var = htmlentities($var);
    return $var;
}
?>


<!-- Output -->
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/myStyle.css">
    </head>
    <header>
         
    </header>
    
    <body>
        <h1>
        Your Order <h5 style="font-size: 6px">from skynet,a division of roboco lets destroy all humans together. You agree to be destroyed by the robot deployed to:</h5>
        </h1>
        <div class="container">
            <div class="span-4">
                <p><?=$firstName, " ", $lastName, " of:<br>", $address, "<br>", $city, ", ", $state, " ", $zipCode;?><p>
            </div>
            <div class="span-4 metalBG" style="background-color: <?=$colors?>">
                <p><?="An order of ", $favNumber, " ", $colors, " ", $tense, " shall be delivered on ", $day, ".<br><br>Enjoy your order human."?></p>
            </div>
            <div class="span-4 ">
                <input type="submit" name="submit" value="Edit Order">
            </div>
        </div>
        
    </body>
    
    <footer>
        
    </footer>
        
</html>
