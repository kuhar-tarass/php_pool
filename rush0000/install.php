<?php
    if ($_POST['submit'] == "Install") {
        $link = mysqli_connect("localhost", "root", "123456");
        if (!$link) {
            $error = "Error: " . mysqli_connect_error() . PHP_EOL;
        } else {
            mysqli_query($link, "DROP DATABASE IF EXISTS shop;");
            mysqli_query($link, "CREATE DATABASE shop;");
            mysqli_select_db($link, "shop");
            $query = "CREATE TABLE users (id int PRIMARY KEY AUTO_INCREMENT, login varchar(32), email varchar(32), password varchar(128), role varchar(8));";
            $adminpass = hash("whirlpool", "admin" . "mygoodsalt");
            $query .= "INSERT INTO users(login, email, password, role) VALUES ('admin', 'admin@shop.ua', '" . $adminpass . "', 'admin');";
            $query .= "CREATE TABLE categories (id int PRIMARY KEY AUTO_INCREMENT, name varchar(32));";
            $query .= "INSERT INTO categories(name) VALUES ('Wireless');";
            $query .= "INSERT INTO categories(name) VALUES ('Ear Headphones');";
            $query .= "INSERT INTO categories(name) VALUES ('Wired');";
            $query .= "CREATE TABLE products (id int PRIMARY KEY AUTO_INCREMENT, name varchar(32), image varchar(128), price int);";
            $query .= "INSERT INTO products(name, image, price) VALUES ('AIRON AirTune Black','img/AIRON AirTune Black.jpg','2499');";
            $query .= "INSERT INTO products(name, image, price) VALUES ('Elari NanoPods Bluetooth White','img/Elari NanoPods Bluetooth White.jpg','1999');";
            $query .= "INSERT INTO products(name, image, price) VALUES ('Marshall Mid Bluetooth Black','img/Marshall Mid Bluetooth Black.jpg','6499');";
            $query .= "INSERT INTO products(name, image, price) VALUES ('Samsung EO-EG920L Red','img/Samsung EO-EG920L Red .jpg','399');";
            $query .= "INSERT INTO products(name, image, price) VALUES ('Sony MDR-XB550AP Red','img/Sony MDR-XB550AP Red.jpg','1499');";
            $query .= "INSERT INTO products(name, image, price) VALUES ('SteelSeries Arctis 3 Slate Grey','img/SteelSeries Arctis 3 Slate Grey.jpg','2299');";
            $query .= "INSERT INTO products(name, image, price) VALUES ('Xiaomi Dual Driver Half-Ear','img/Xiaomi Dual Driver Half-Ear.jpg','489');";
            $query .= "CREATE TABLE product_in_category (id int PRIMARY KEY AUTO_INCREMENT, pr_id int, cat_id int);";
            $query .= "INSERT INTO product_in_category (pr_id, cat_id) VALUES (1, 1);";
            $query .= "INSERT INTO product_in_category (pr_id, cat_id) VALUES (1, 2);";
            $query .= "INSERT INTO product_in_category (pr_id, cat_id) VALUES (2, 1);";
            $query .= "INSERT INTO product_in_category (pr_id, cat_id) VALUES (2, 2);";
            $query .= "INSERT INTO product_in_category (pr_id, cat_id) VALUES (3, 1);";
            $query .= "INSERT INTO product_in_category (pr_id, cat_id) VALUES (4, 3);";
            $query .= "INSERT INTO product_in_category (pr_id, cat_id) VALUES (4, 2);";
            $query .= "INSERT INTO product_in_category (pr_id, cat_id) VALUES (5, 3);";
            $query .= "INSERT INTO product_in_category (pr_id, cat_id) VALUES (6, 3);";
            $query .= "INSERT INTO product_in_category (pr_id, cat_id) VALUES (7, 3);";
            $query .= "INSERT INTO product_in_category (pr_id, cat_id) VALUES (7, 2);";
            $query .= "CREATE TABLE orders (id int PRIMARY KEY AUTO_INCREMENT, login varchar(32), products text, total int);";
            mysqli_multi_query ($link, $query);
        }
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="install">
    <h1> Install </h1>
    <?php if (isset($error)) { echo $error; } else { ?>
        Done!<br>
        <a href="index.php"><button>Go to shop</button></a>
    <?php } ?>
</div>
</body>
</html>
<?php
    } else {
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="install">
    <form name="install.php" method="POST" action="install.php">
        <h1> Install </h1>
        For install shop click button below.<br>
        <button type="submit" name="submit" value="Install">
            Install
        </button>
    </form>
</div>
</body>
</html>
<?php
    }
?>

