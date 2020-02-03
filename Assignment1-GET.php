<!DOCTYPE HTML>  
<html>
<body>  
    <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        First Name: <input type="text" name="firstname">
        Last Name: <input type="text" name="lastname">
        Age: <input type="text" name="age">
        <input type="submit" name="submit" value="Submit">  
</form>

<?php
    echo "<h2>Output:</h2>";
    echo "Hello, my name is " . $_GET["firstname"] . " " . $_GET["lastname"] . ". ";
    if ($_GET["age"] >= 18) {
        echo "I am old enough to vote in the United States.";
    } else {
        echo "I am not old enough to vote in the United States.";
    }
?>

</body>
</html>