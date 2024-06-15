
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

?>

<!DOCTYPE html>
<header>
    <?= $firstName, $lastName; ?>
    <br>
    Plain words
</header>

<body>
    body
</body>
    <!-- //output
    echo"This is just me typing out words, what does it do?";
    print"Another line just like echo, what is the difference?";
    echo"<pre>"; //the <pre> tag causes white space to be preserved, so I get the spacing for the address correct.
    print"Hello $firstName $lastName<br><br>";
    print"of: $address<br>";
    print"    $city, $state $zipCode<br><br>";
    print"You would love $favNumber $colors $tense on a $day.<br>";
    print"I know this because I am a robot and you are a soft flesh creature.<br><br>";

    //output testing wrapping html in an echo line
    echo "
    
    
    ";


    //random test of print as a variable assignment
    $printMe = print("Printing a variable? Or perhaps just true.<br>");
    echo $printMe; //This line will print out the above statement
    $printMe //This version returns 1, which I am assuming is basically True, neat! -->
<footer>
    Footer
</footer>
    
</html>