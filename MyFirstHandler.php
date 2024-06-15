
<?php
//I bet that there is a way to make the input section conditional based on if there is input, and there is! Thsi works fine
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
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zipCode = $_POST['zipCode'];
        $colors = $_POST['colors'];
        $favNumber = $_POST['favNumber'];
        $day = $_POST['day'];
    }

//processing
    $tense = (int)$favNumber > 1 ? "candies" : "candy";

//Experimenting with the layout of a blended php html paper. 
//I think I like this layout better, it lets VSCodes auto complete continue working

?>


<!-- Output -->
<html>
<link rel="stylesheet" href="CSS/myStyle.css">
    <header>
        <h1>
        <?= $firstName, $lastName; ?>
        </h1> 
    </header>
    
    <body>
        body
    </body>
    
    <footer>
        Footer
    </footer>
        
</html>
