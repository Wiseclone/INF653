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
}
?>