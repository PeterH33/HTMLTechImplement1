<html>
<head>
    <h1>First Form Handler</h1>
</head>
    <?php
    print_r($_POST);
    //input
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zipCode = $_POST['zipCode'];
    $colors = $_POST['colors'];
    $favNumber = $_POST['favNumber'];
    $day = $_POST['day'];



    //processing
    $tense = (int)$favNumber > 1 ? "candies" : "candy";

    //output
    print"Hello $firstName $lastName<br><br>";
    print"of: $address<br>";
    print"    $city, $state $zipCode<br><br>";
    print"You would love $favNumber $colors $tense on a $day.<br>";
    print"I know this because I am a robot and you are a soft flesh creature";


    ?>
</html>