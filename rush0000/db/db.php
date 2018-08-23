<?php
    function shop_hash($password) {
        $salt = "mygoodsalt";
        return (hash("whirlpool", $password . $salt));
    }
    function shop_query($query) {
        $link = mysqli_connect("localhost", "root", "123456", "shop");
        if (!$link) {
            echo "Error: " . mysqli_connect_error() . PHP_EOL;
            return 0;
        } else {
            $val = mysqli_query($link, $query);
            mysqli_close($link);
            return ($val);
        }
    }
?>
