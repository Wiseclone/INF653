<?php
    require_once('database.php');

$query = 'SELECT
    todoitems.ItemNum,
    todoitems.Title,
    todoitems.Description
FROM
    todoitems';

$statement = $db->prepare($query);
$statement->execute();
$ToDoList = $statement->fetchAll();
$statement->closeCursor(); 

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
<header><h1>To-Do List</h1></header>
<main>
    <section>
        <?php  if ($ToDoList == null) {echo "No to-do list items exist yet.";} else {
        foreach ($ToDoList as $ListItem) : ?>
            <p class="title"> <?php echo $ListItem['Title']; ?></p>
            <p class="desc"><?php echo $ListItem['Description']; ?></p>
            <form action="deleteitem.php" method="post">
                    <input type="hidden" name="itemID"
                           value="<?php echo $ListItem['ItemNum']; ?>">
                    <input type="submit" value="Delete">
            <br>
        <?php endforeach;}?>
        <a href="additem.php">
        <?php echo "Click here to add a new item to the list.";?>
        </a>
    <section>
</main>
</body>
</html>