<?php
    include_once("db.php");

    function addOrder($login, $products, $total) {
        $query = "INSERT INTO orders(login, products, total) VALUES ('" . $login . "','" . $products . "','" . $total . "');";
        shop_query($query);
    }
    function delOrder($id) {
        $query = "DELETE FROM orders WHERE id = " . $id . ";";
        shop_query($query);
    }
    function getOrders() {
        $query = "SELECT * FROM orders WHERE 1;";
        $result = shop_query($query);
        $orders = array();
        while ($row = mysqli_fetch_row($result)) {
            $orders[] = array(
                'id'        => $row[0],
                'login'     => $row[1],
                'products'  => $row[2],
                'total'     => $row[3]
            );
        }
        return $orders;
    }
?>