<?php
function get_products_by_category($category_id, $category_type) {
    global $db;
    if ($category_id == NULL || $category_id == FALSE) {
        $query = 'SELECT * FROM vehicles
              ORDER BY price DESC';
        $statement = $db->prepare($query);
        $statement->execute();
        $products = $statement->fetchAll();
        $statement->closeCursor();
        return $products;
    } else {
        if ($category_type == 'classes'){
            $query = 'SELECT * FROM vehicles
                WHERE vehicles.class_code= :category_id
                ORDER BY price DESC';
        } else {
            $query = 'SELECT * FROM vehicles
                WHERE vehicles.type_code= :category_id
                ORDER BY price DESC';
        }
        $statement = $db->prepare($query);
        $statement->bindValue(':category_id', $category_id);
        $statement->execute();
        $products = $statement->fetchAll();
        $statement->closeCursor();
        return $products;
    }
}

function get_product($product_id) {
    global $db;
    $query = 'SELECT * FROM vehicles
              WHERE vin = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    return $product;
}

function delete_product($product_id) {
    global $db;
    $query = 'DELETE FROM vehicles
              WHERE vin = :product_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':product_id', $product_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_product($class, $type, $year, $make, $model, $price) {
    global $db;
    $query = 'INSERT INTO vehicles
                 (year, make, model, price, type_code, class_code)
              VALUES
                 (:year, :make, :model, :price, :type, :class)';
    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':class', $class);
    $statement->bindValue(':type', $type);
    $statement->bindValue(':make', $make);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();
}
?>