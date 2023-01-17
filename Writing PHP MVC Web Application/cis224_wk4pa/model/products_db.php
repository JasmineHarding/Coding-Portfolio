<?php
require_once('database.php');

//get all entries in the product info table
function get_all_products()
{
    //Query for all products
    $conn = get_db_conn();
    $query = "SELECT * FROM products";
    $result = mysqli_query($conn, $query);
    return $result;
}
function get_product($product_no)
{
    $conn = get_db_conn();
    $query = "SELECT * FROM products WHERE ProductNo=$product_no";
    return mysqli_query($conn, $query);
}
?>