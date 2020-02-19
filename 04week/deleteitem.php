<?php
require_once('database.php');

// Get IDs
$item_id = filter_input(INPUT_POST, 'itemID', FILTER_VALIDATE_INT);

// Delete the item from the database
if ($item_id != false) {
    $query = 'DELETE FROM todoitems
              WHERE ItemNum = :item_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':item_id', $item_id);
    $success = $statement->execute();
    $statement->closeCursor();    
}

// Display the To-Do List page
include('index.php');