<?php
    include_once("db.php");
    function getCategories() {
        $query = "SELECT * FROM categories WHERE 1;";
        $result = shop_query($query);
        $category = array();
        while ($row = mysqli_fetch_row($result)) {
            $category[] = array(
                'id'    => $row[0],
                'name'  => $row[1]
            );
        }
        return $category;
    }
    function getCategory($id) {
        $query = "SELECT * FROM categories WHERE id=" . $id . ";";
        $result = shop_query($query);
        $row = mysqli_fetch_row($result);
        return $row[1];
    }
    function addCategory($name) {
        $query = "INSERT INTO categories(name) VALUES ('" . $name . "');";
        shop_query($query);
    }
    function modCategory($id, $name) {
        $query = "UPDATE categories SET name='" . $name . "' WHERE id=" . $id . ";";
        shop_query($query);
    }
    function delCategory($id) {
        $query = "DELETE FROM categories WHERE id = " . $id . ";";
        shop_query($query);
    }
?>