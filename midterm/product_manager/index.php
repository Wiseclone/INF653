<?php
require('../model/database.php');
require('../model/product_db.php');
require('../model/category_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
}

if ($action == 'list_products') {
    $category_id = filter_input(INPUT_GET, 'category_id', 
            FILTER_VALIDATE_INT);
    $category_type =  filter_input(INPUT_GET, 'category_type', 
            FILTER_VALIDATE_INT);
    if ($category_type == 1) {
        $category_type = 'classes';
    } else {
        $category_type = 'types';
    }
    $make = filter_input(INPUT_GET, 'make');
    $classes = get_categories('classes');
    $types = get_categories('types');
    $products = get_products_by_category($category_id, $category_type);
    $makes = [];
    foreach ($products as $product) :
        if (!in_array($product['make'], $makes)) {
            array_push($makes, $product['make']);
        }
    endforeach;
    include('product_list.php');
} else if ($action == 'delete_product') {
    $product_id = filter_input(INPUT_POST, 'product_id', 
            FILTER_VALIDATE_INT);
    if ($product_id == NULL || $product_id == FALSE) {
        $error = "Missing or incorrect product id.";
        include('../errors/error.php');
    } else { 
        delete_product($product_id);
        header("Location: .?category_id=NULL");
    }
} else if ($action == 'show_add_form') {
    $classes = get_categories('classes');
    $types = get_categories('types');
    include('product_add.php');    
} else if ($action == 'add_product') {
    $class_code = filter_input(INPUT_POST, 'class_code', 
            FILTER_VALIDATE_INT);
    $type_code = filter_input(INPUT_POST, 'type_code');
    $year = filter_input(INPUT_POST, 'year');
    $makename = filter_input(INPUT_POST, 'makename');
    $model = filter_input(INPUT_POST, 'model');
    $price = filter_input(INPUT_POST, 'price');
    if ($class_code == NULL || $type_code == FALSE || $year == NULL || 
            $makename == NULL || $model == NULL || $price == FALSE) {
        $error = "Invalid product data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        add_product($class_code, $type_code, $year, $makename, $model, $price);
        header("Location: .?category_id=NULL");
    }
} else if ($action == 'list_categories') {
    $classes = get_categories('classes');
    $types = get_categories('types');
    include('category_list.php');
} else if ($action == 'add_category') {
    $name = filter_input(INPUT_POST, 'name');
    $category_type = filter_input(INPUT_POST, 'category_type');

    // Validate inputs
    if ($name == NULL || $category_type == NULL) {
        $error = "Invalid category name or type. Please try again.";
        include('view/error.php');
    } else {
        add_category($name, $category_type);
        header('Location: .?action=list_categories');  // display the Category List page
    }
} else if ($action == 'delete_category') {
    $category_id = filter_input(INPUT_POST, 'category_id', 
            FILTER_VALIDATE_INT);
    $category_type = filter_input(INPUT_POST, 'category_type');
    delete_category($category_id, $category_type);
    header('Location: .?action=list_categories');      // display the Category List page
}
?>