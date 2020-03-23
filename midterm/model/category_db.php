<?php
function get_categories($category_type) {
    global $db;
    if ($category_type == 'classes'){
        $query = 'SELECT * FROM classes
              ORDER BY code';
    } else {
        $query = 'SELECT * FROM types
              ORDER BY code';
    }
    $statement = $db->prepare($query);
    $statement->bindValue(':table', $category_type);
    $statement->execute();
    return $statement;    
}

function get_category_name($category_id, $category_type) {
    global $db;
     if ($category_type == 'classes'){
        $query = 'SELECT * FROM classes
              WHERE code = :category_id';   
     } else {
        $query = 'SELECT * FROM types
              WHERE code = :category_id';
     }
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();    
    $category = $statement->fetch();
    $statement->closeCursor();    
    $category_name = $category['name'];
    return $category_name;
}

function add_category($name, $category_type) {
    global $db;
    if ($category_type == 'classes'){
        $query = 'INSERT INTO classes (name)
              VALUES (:name)';
    } else {
        $query = 'INSERT INTO types (name)
              VALUES (:name)';
    }
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->execute();
    $statement->closeCursor();    
}

function delete_category($category_id, $category_type) {
    global $db;
    if ($category_type == 'classes'){
        $query = 'DELETE FROM classes
              WHERE code = :category_id';
    } else {
        $query = 'DELETE FROM types
              WHERE code = :category_id';
    }
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();
}
?>