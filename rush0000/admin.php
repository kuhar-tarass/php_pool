<title> Headphone's shop </title>
<?php
    include_once("db/customer.php");
    include_once("db/category.php");
    include_once("db/product.php");
    include_once("db/order.php");
    session_start();
    if (isset($_SESSION['login']) && $_SESSION['role'] == 'admin') {
        if ($_POST['submit'] == "product_add") {
            if ($_POST['id'] == "") {
                addProduct($_POST['name'], $_POST['image'], $_POST['price']);
            } else {
                modProduct($_POST['id'], $_POST['name'], $_POST['image'], $_POST['price']);
            }
        }
        if ($_POST['submit'] == "product_del") {
            delProduct($_POST['id']);
        }
        if ($_POST['submit'] == "category_add") {
            if ($_POST['id'] == "") {
                addCategory($_POST['name']);
            } else {
                modCategory($_POST['id'], $_POST['name']);
            }
        }
        if ($_POST['submit'] == "category_del") {
            delCategory($_POST['id']);
        }
        if ($_POST['submit'] == "user_add") {
            if ($_POST['id'] == "") {
                addUser($_POST['login'], $_POST['email'], $_POST['password']);
            } else {
                modUser($_POST['id'], $_POST['login'], $_POST['email'], $_POST['password']);
            }
        }
        if ($_POST['submit'] == "user_del") {
            delUser($_POST['id']);
        }
        if ($_POST['submit'] == "pr_in_cat_add") {
            if ($_POST['id'] == "") {
                addPrinCat($_POST['pr_id'], $_POST['cat_id']);
            } else {
                modPrinCat($_POST['id'], $_POST['pr_id'], $_POST['cat_id']);
            }
        }
        if ($_POST['submit'] == "pr_in_cat_del") {
            delPrinCat($_POST['id']);
        }
        if ($_POST['submit'] == "order_del") {
            delOrder($_POST['id']);
        }
        $category = getCategories();
        $product = getProducts();
        $user = getUsers();
        $pr_in_cat = getPrinCat();
        $orders = getOrders();
    } else {
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: index.php");
        exit();
    }
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="adminbody">
<header>Administrative section (<a href="/" style="color:#000;">Shop</a>)</header>
<section class="block">
    <div class="adminblock">
        <div class="header">Orders</div><br>
        <div class="line header-line">
            <div class="id">Id</div>
            <div class="name">Login</div>
            <div class="image">Products</div>
            <div class="price">Total</div>
            <div class="del"></div>
        </div>
        <?php foreach($orders as $item) { ?>
            <form name="category" method="POST" action="admin.php">
                <div class="line">
                    <div class="id"><?php echo $item['id']; ?></div>
                    <div class="name"><?php echo $item['login']; ?></div>
                    <div class="image">
                        <?php $products = unserialize($item['products']);
                        foreach ($products as $id => $count) {
                            echo getProduct($id) . " x " . $count . "</br >";
                        }?>
                    </div>
                    <div class="price"><?php echo $item['total']; ?> ₴</div>
                    <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                    <div class="del"><button type="submit" name="submit" value="order_del">X</button></div>
                </div>
            </form>
        <?php } ?>
    </div>

    <div class="adminblock">
        <div class="header">Products</div><br>
        <div class="line header-line">
            <div class="id">Id</div>
            <div class="name">Name</div>
            <div class="image">Image</div>
            <div class="price">Price</div>
            <div class="del"></div>
        </div>
        <?php foreach($product as $item) { ?>
            <form name="product" method="POST" action="admin.php">
                <div class="line">
                    <div class="id"><?php echo $item['id']; ?></div>
                    <div class="name"><?php echo $item['name']; ?></div>
                    <div class="image"><?php echo $item['image']; ?></div>
                    <div class="price"><?php echo $item['price']; ?> ₴</div>
                    <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                    <div class="del"><button type="submit" name="submit" value="product_del">X</button></div>
                </div>
            </form>
        <?php } ?>
        <form name="product" method="POST" action="admin.php">
            <div class="line">
                <div class="id"><input type="number" value="" name="id" min="0"></div>
                <div class="name"><input type="text" value="" name="name" required></div>
                <div class="image"><input type="text" value="" name="image" required></div>
                <div class="price"><input type="number" value="" name="price" min="0" required></div>
                <div class="del"><button type="submit" name="submit" value="product_add">Add/mod</button></div>
            </div>
        </form>
    </div>

    <div class="adminblock">
    <div class="header">Categories</div><br>
    <div class="line header-line">
        <div class="id">Id</div>
        <div class="name">Name</div>
        <div class="del"></div>
    </div>
    <?php foreach($category as $item) { ?>
        <form name="category" method="POST" action="admin.php">
            <div class="line">
                <div class="id"><?php echo $item['id']; ?></div>
                <div class="name"><?php echo $item['name']; ?></div>
                <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                <input type="hidden" name="name" value="<?php echo $item['name']; ?>">
                <div class="del"><button type="submit" name="submit" value="category_del">X</button></div>
            </div>
        </form>
    <?php } ?>
    <form name="category" method="POST" action="admin.php">
        <div class="line">
            <div class="id"><input type="number" value="" name="id" min="0"></div>
            <div class="name"><input type="text" value="" name="name" required></div>
            <div class="del"><button type="submit" name="submit" value="category_add">Add/mod</button></div>
        </div>
    </form>
    </div>

    <div class="adminblock">
        <div class="header">Users</div><br>
        <div class="line header-line">
            <div class="id">Id</div>
            <div class="name">Login</div>
            <div class="email">Email</div>
            <div class="password">Password</div>
            <div class="role">Role</div>
            <div class="del"></div>
        </div>
        <?php foreach($user as $item) { ?>
            <form name="user" method="POST" action="admin.php">
                <div class="line">
                    <div class="id"><?php echo $item['id']; ?></div>
                    <div class="name"><?php echo $item['login']; ?></div>
                    <div class="email"><?php echo $item['email']; ?></div>
                    <div class="password">***</div>
                    <div class="role"><?php echo $item['role']; ?></div>
                    <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                    <div class="del"><button type="submit" name="submit" value="user_del">X</button></div>
                </div>
            </form>
        <?php } ?>
        <form name="user" method="POST" action="admin.php">
            <div class="line">
                <div class="id"><input type="number" value="" name="id"  min="0"></div>
                <div class="name"><input type="text" value="" name="login" required></div>
                <div class="email"><input type="text" value="" name="email" required></div>
                <div class="password"><input type="password" value="" name="password"></div>
                <div class="role"></div>
                <div class="del"><button type="submit" name="submit" value="user_add">Add/Mod</button></div>
            </div>
        </form>
    </div>

    <div class="adminblock">
        <div class="header">Product in category </div><br>
        <div class="line header-line">
            <div class="id">Id</div>
            <div class="name">Product</div>
            <div class="name">Category</div>
            <div class="del"></div>
        </div>
        <?php foreach($pr_in_cat as $item) { ?>
            <form name="pr_in_cat" method="POST" action="admin.php">
                <div class="line">
                    <div class="id"><?php echo $item['id']; ?></div>
                    <div class="name"><?php echo $item['product']; ?></div>
                    <div class="name"><?php echo $item['category']; ?></div>
                    <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
                    <div class="del"><button type="submit" name="submit" value="pr_in_cat_del">X</button></div>
                </div>
            </form>
        <?php } ?>
        <form name="pr_in_cat" method="POST" action="admin.php">
            <div class="line">
                <div class="id"><input type="number" value="" name="id" min="0"></div>
                <div class="name">
                    <select name="pr_id">
                    <?php foreach($product as $item) { ?>
                        <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="name">
                    <select name="cat_id">
                        <?php foreach($category as $item) { ?>
                            <option value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="del"><button type="submit" name="submit" value="pr_in_cat_add">Add/mod</button></div>
            </div>
        </form>
    </div>
</section>
</body>
</html>
