<html>

<head>
    <title>Week2 PA - Jasmine Harding</title>
</head>

<body>
    <form method="POST">
       <h3> Enter your Name: <input type="text" name="name"></h3> 
       <h3> Enter your Date of Birth name: <input type="text" name="birthdate"></h3> 
       <h3> Enter your Favorite Color: <input type="text" name="fav_color"></h3> 
       <h3> Enter your favorite Place to Visit: <input type="text" name="fav_place"></h3>
        <h3> Enter your Nickname: <input type="text" name="nickname"></h3> 
       <input type="submit" value="Submit Values">
    </form>
    <?php
    
    $name = '';
    $birthdate = '';
    $fav_color = '';
    $fav_place = '';
    $nickname = '';

    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }

    if (isset($_POST['birthdate']))
        $birthdate = $_POST['birthdate'];

    if (isset($_POST['fav_color']))
        $fav_color = $_POST['fav_color'];
        var_dump($fav_color);

    if (isset($_POST['fav_place']))
        $fav_place = $_POST['fav_place'];
        var_dump($fav_place);

    if (isset($_POST['nickname']))
        $nickname = $_POST['nickname'];

    if (strlen($name) > 0 )
        echo "<h3> The name you entered is: $name </h3>";
            else
            echo "<h3> You didn't enter a name </h3>";

    if (strlen($birthdate) > 0)
        if(is_numeric($birthdate)) 
            echo "<h3> The birthdate you gave is: $birthdate </h3>";
                else
                    echo "<h3> You didn't enter a birthdate </h3>";

    if (strlen($fav_color) > 0)
        echo "<h3> You said your favorite color is: $fav_color </h3>"; 
            else
                echo "<h3> You didn't enter a favorite color </h3>";

    if (strlen($fav_place) > 0)
        echo "<h3> You said your favorite place is: $fav_place </h3>"; 
            else
                echo "<h3> You didn't enter a favorite place </h3>";

    if (strlen($nickname) > 0)
        echo "<h3> You said your nickname is: $nickname </h3>"; 
            else
                echo "<h3> You didn't enter a nickname </h3>";
        ?>
</body>
</html>