

<html>
<link rel="stylesheet" href="CSS/myStyle.css">

<head>
    <title>HTML and Server/Technology Implementation</title>
</head>

<header>
    <!--Style Override right here-->
    <h1 style="font-weight: normal;">My Form</h1>
    <!--Navigation-->
    <div id="nav">
        <!-- &#9776; -->
        <a href="index.html">Home</a>
        <a href="videos.html">Video</a>
        <a href="photos.html">My Photos</a>
        <a href="form.php">My Form</a>
        <a href="pages/page5.html">Folder Page</a>
    </div>
    <hr>
</header>

<body>
<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        print"POST was used in request";
    }
?>



    <form action="form.php" method="post">
        <div class="conatiner2x1">
            <div class="container">
                <div class="item span-4 informationCollection">
                    <h1>Information Collection</h1>
                </div>
                <div class="item span-2">
                    First Name
                    <br>
                    <!-- Note added required attribute and now the field must be filled out. -->
                    <input type="text" name="firstName" id="firstName" required>
                </div>
                <div class="item span-2">
                    Last Name
                    <br>
                    <input type="text" name="lastName" id="lastName" required>
                </div>
                <div class="item span-4">
                    Address
                    <br>
                    <input type="text" name="address" id="address" required>
                </div>
                <div class="item span-2">
                    City
                    <br>
                    <input type="text" name="city" id="city" required>
                </div>
                <div class="item">
                    State
                    <br>
                    <input type="text" name="state" id="state" required>
                </div>
                <div class="item">
                    Zip Code
                    <br>
                    <input type="text" name="zipCode" id="zipCode" required>
                </div>
                <div class="item span-2">
                    Favorite Color
                    <br>
                    <!-- <label for="colors">Favorite Color</label> -->
                    <select name="colors" id="colors" required>
                        <option value="" disabled selected>Select a color</option>
                        <option value="Red">Red</option>
                        <option value="Orange">Orange</option>
                        <option value="Yellow">Yellow</option>
                        <option value="Green">Green</option>
                        <option value="Blue">Blue</option>
                        <option value="Indigo">Indigo</option>
                        <option value="Violet">Violet</option>
                    </select>
                </div>
                <div class="item span-2">
                    Favorite number
                    <br>
                    <input type="number" name="favNumber" id="favNumber" required>
                </div>
                <div class="item span-4">
                    Favorite Day of the Week
                </div>
                <div class="item span-4">
                    <div class="dayContainer">
                        <div class="item"><input type="radio" name="day" value="monday" id="monday" required>
                            <label for="monday">Mon</label>
                        </div>

                        <div class="item"><input type="radio" name="day" value="tuesday" id="tuesday">
                            <label for="tuesday">Tues</label>
                        </div>

                        <div class="item"><input type="radio" name="day" value="wednesday" id="wednesday">
                            <label for="wednesday">Wed</label>
                        </div>

                        <div class="item"><input type="radio" name="day" value="thursday" id="thursday">
                            <label for="thursday">Thurs</label>
                        </div>

                        <div class="item"><input type="radio" name="day" value="friday" id="friday">
                            <label for="friday">Fri</label>
                        </div>

                        <div class="item"><input type="radio" name="day" value="saturday" id="saturday">
                            <label for="saturday">Sat</label>
                        </div>

                        <div class="item"><input type="radio" name="day" value="sunday" id="sunday">
                            <label for="sunday">Sun</label>
                        </div>
                    </div>
                </div>
                <div class="item span-4 ">
                    <input type="submit" name="submit" value="Submit">
                    <input type="reset">
                </div>


            </div>
            <div style="max-width: 40em;"><img src="me.jpg" id="me"></div>
        </div>
    </form>

</body>

<footer>
    <hr>

    <div>
        <div>
            <img src="FSUlogo.png" alt="">

        </div>
        <br>
        HTML and Server/Technology Implementation
    </div>



</footer>

</html>