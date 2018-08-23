<?php
    include_once("db.php");
    include_once("category.php");
    function getProducts() {
        $query = "SELECT * FROM products WHERE 1;";
        $result = shop_query($query);
        $products = array();
        while ($row = mysqli_fetch_row($result)) {
            $products[] = array(
                'id'    => $row[0],
                'name'  => $row[1],
                'image' => $row[2],
                'price' => $row[3]
            );
        }
        return $products;
    }
    function getProduct($id) {
        $query = "SELECT * FROM products WHERE id=" . $id . ";";
        $result = shop_query($query);
        $row = mysqli_fetch_row($result);
        return $row[1];
    }
    function addProduct($name, $image, $price) {
        $query = "INSERT INTO products(name, image, price) VALUES ('" . $name . "','" . $image . "','" . $price . "');";
        shop_query($query);
    }
    function modProduct($id, $name, $image, $price) {
        $query = "UPDATE products SET name='" . $name . "', image='" . $image . "', price='" . $price . "' WHERE id=" . $id . ";";
        shop_query($query);
    }
    function delProduct($id) {
        $query = "DELETE FROM products WHERE id = " . $id . ";";
        shop_query($query);
    }
    function getProductsInCategory($cat_id) {
        $query = "SELECT * FROM products WHERE id in (SELECT pr_id FROM product_in_category WHERE cat_id = '" . $cat_id . "');";
        $result = shop_query($query);
        $products = array();
        while ($row = mysqli_fetch_row($result)) {
            $products[] = array(
                'id'    => $row[0],
                'name'  => $row[1],
                'image' => $row[2],
                'price' => $row[3]
            );
        }
        return $products;
    }
    function getPrinCat() {
        $query = "SELECT * FROM product_in_category WHERE 1;";
        $result = shop_query($query);
        $return = array();
        while ($row = mysqli_fetch_row($result)) {
            $return[] = array(
                'id'    => $row[0],
                'product'  => getProduct($row[1]),
                'category' => getCategory($row[2])
            );
        }
        return $return;
    }
    function addPrinCat($pr_id, $cat_id) {
        $query = "INSERT INTO product_in_category(pr_id, cat_id) VALUES ('" . $pr_id . "','" . $cat_id . "');";
        shop_query($query);
    }
    function modPrinCat($id, $pr_id, $cat_id) {
        $query = "UPDATE product_in_category SET pr_id='" . $pr_id . "', cat_id='" . $cat_id . "' WHERE id=" . $id . ";";
        shop_query($query);
    }
    function delPrinCat($id) {
        $query = "DELETE FROM product_in_category WHERE id = " . $id . ";";
        shop_query($query);
    }
?>