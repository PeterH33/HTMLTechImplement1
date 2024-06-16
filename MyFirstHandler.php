
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
        $firstName = $_POST['firstName'] ?? $firstName;
        $lastName = $_POST['lastName'] ?? $lastName;
        $address = $_POST['address'] ?? $address;
        $city = $_POST['city'] ?? $city;
        $state = $_POST['state'] ?? $state;
        $zipCode = $_POST['zipCode'] ?? $zipCode;
        $colors = $_POST['colors'] ?? $colors;
        $favNumber = $_POST['favNumber'] ?? $favNumber;
        $day = $_POST['day'] ?? $day;
    }

//processing
    $tense = (int)$favNumber > 1 ? "candies" : "candy";

//NOTE Experimenting with the layout of a blended php html paper. 
//I think I like this layout better, it lets VSCodes auto complete continue working

?>


<!-- Output -->
<!DOCTYPE html>
<html>
    <head>
        <!-- <link rel="stylesheet" href="CSS/myStyle.css"> -->
    </head>
    <header>
        <h1>
        <?= $firstName, " ", $lastName; ?>
        </h1> 
    </header>
    
    <body>
        <div class="container">
            <div class="span-4">
                <h4><?=$address;?></h4>
                <p>Test words</p>
            </div>
            <div class="span-2">
                <p><?=$city;?><p>
            </div>
            <div>
                <p><?=$state;?></p>
            </div>
            <div>
                <p><?=$zipCode;?></p>
            </div>
            <div class="span-2">
                <p><?=$colors;?></p>
            </div>
            <div class="span-2">
                <p><?=$favNumber;?></p>
            </div>
            <div class="span-4">
                <p><?=$day;?></p>
            </div>
        </div>
        
    </body>
    
    <footer>
        
    </footer>
        
</html>
