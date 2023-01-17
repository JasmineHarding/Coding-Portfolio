<?php
    require_once('../model/products_db.php');

    function get_products()
    {
        $product_rows = get_all_products();
        $products = array();

        if($product_rows) {
            $index = 0;
            //if quarty was succesful fill in the product array
            while ($row = mysqli_fetch_array($product_rows)) {
                $products[$index]["ProductNo"] = $row["ProductNo"];
                
                //Transform the name fields from DB to first last format
                $products[$index]["Name"] = $row["Name"];
                $products[$index]["Type"] = $row["Type"];
                $index++;
            }
        }

        return $products;
    }

?>