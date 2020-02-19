<?php
    require_once('database.php');

  if (!empty($_POST['title'])) {
$query = "INSERT INTO todoitems (Title, Description)
VALUES ('" . $_POST['title'] . "', '" . $_POST['desc'] . "');";

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->exec($query);
echo "<span class='alert'>Item '" . $_POST['title'] . "' added successfully!</span>";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do List</title>
</head>

<!-- the body section -->
<body>
<header><h1>Add Item</h1></header>
<main>
    <section>
        <form name='addentry' method="post">
        Title: <input type="text" name="title"><br>
        Description: <input type="textArea" name="desc"><br>
        <input type="submit" value="Submit">
        </form>
        <a href="index.php">
            Click here to return to the list.
        </a>
    </section>
</main>
<?php
function updateTable(){
    
}
?>
</body>
</html>