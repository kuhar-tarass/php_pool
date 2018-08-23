<title> Headphone's shop </title>
<?php
    include_once("db/category.php");
    include_once("db/product.php");
    session_start();
    $category = getCategories();
    if (empty($category)) {
        header( "Location: /install.php");
    }
    if ($_GET['cat'] != "") {
        $product = getProductsInCategory($_GET['cat']);
    } else {
        $product = getProducts();
    }
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
    <header><a href="index.php">Headphone's shop</a></header>
    <section>
        <nav>
            <ul>
                <?php foreach($category as $item) { ?>
                <li>
                    <a class="<?php if($_GET['cat'] == $item['id']) { echo "active"; } ?>" href="?cat=<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a>
                </li>
                <?php } ?>
            </ul>
        </nav>
        <?php foreach($product as $item) { ?>
        <div class="products">
           <a <?php echo "href=cart.php?"."cat=".$_GET['cat']."&add=".$item['id'];?>>
		    <div class="product" id = "<?php echo $item['id']?>">
                <input type="hidden" value="<?php echo $item['id']; ?>" name="id">
                <div class="pr_image"><img src="<?php echo $item['image']; ?>"></div>
                <div class="pr_name"><?php echo $item['name']; ?></div>
                <div class="pr_price"><?php echo $item['price']; ?> ₴</div>
                <div class="pr_cart">+ Cart</div>
            </div></a>
            </div>
        <?php } ?>
    </section>
    <div class="leftside">
        <?php  if (isset($_SESSION['login']) && $_SESSION['login'] != "") { ?>
            Hi, <?php echo $_SESSION['login']; ?>!</br>
            <?php  if ($_SESSION['role'] == "admin") { ?>
                <a href="/admin.php">Admin</a></br>
            <?php } ?>
            <a href="/logout.php">Logout</a></br>
        <?php } else { ?>
            <a href="/login.php">Login</a></br>
            <a href="/registration.php">Register</a></br>
        <?php } ?>
        <a href="/cart.php">Cart <?php echo $_SESSION['count']; ?>(<?php echo $_SESSION['total']; ?> ₴)</a>
    </div>
    </body>
</html>
