<title> Headphone's shop</title>
<header><a href="index.php">Headphone's shop</a></header>
<link rel="stylesheet" type="text/css" href="style.css">
<?php
session_start();
include_once("db/product.php");
include_once("db/order.php");

if ($_GET['add'] != NULL)
{
	$_SESSION['cart'][$_GET['add']]++;
	$back = "index.php?cat=".$_GET['cat']."#".$_GET['add'];
	header("HTTP/1.1 301 Moved Permanently");
	header('Location: '.$back);
}
elseif ($_GET['rm'] == 1)
{
	unset($_SESSION['cart']);
    unset($_SESSION['total']);
    unset($_SESSION['count']);
	header("HTTP/1.1 301 Moved Permanently");
	header('Location: /cart.php');
}
elseif ($_GET['del'] != NULL)
{
	unset($_SESSION['cart'][$_GET['del']]);

	header("HTTP/1.1 301 Moved Permanently");
	header('Location: /cart.php');
}
if ($_POST['submit'] == "cart") {
    addOrder($_SESSION['login'], serialize($_SESSION['cart']), $_POST['total']);
    unset($_SESSION['cart']);
    unset($_SESSION['total']);
    unset($_SESSION['count']);
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: /index.php');
}
$totalcount = 0;
$totalprice = 0;
$products = getProducts();
foreach($_SESSION['cart'] as $item => $count)
	foreach ($products as $product )
		if ($product['id'] == $item) 
	{
		$totalprice += $product['price'] * $count;
        $totalcount += $count;
		?>
	<link rel="stylesheet" type="text/css" href="style.css">
	<div class="cart_products">
		<div class="cart_product">
			<div class="pr_image"><img src="<?php echo $product['image']; ?>"></div>
			<div class="pr_name"><?php echo $product['name']; ?></div>
			<div class="pr_price"><?php echo $product['price']; ?> ₴</div>
			<div class="x_sign"> X </div>
			<div class="pr_quantity"><?php echo $count;?></div>
			<a <?php echo "href='/cart.php?del=$item'"; ?>>  <div class="remove_item"> X </div> </a>
		</div>
		<?php
}
        $_SESSION['total'] = $totalprice;
        $_SESSION['count'] = $totalcount;
?>

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

<div class="footer">
	<?php
		session_start();
		if ($_SESSION['cart'] == NULL)
		{
		?>
			<div class="pr_price" id="empty_cart"> Your Shopping Cart is empty. </div>
			<a href="index.php">  <div class = "go_back"> Go back</div> </a>
		<?php
		}
		else
		{
		?>
		<div class="pr_price"> Subtotal <?php echo $totalprice; ?> ₴</div>
        <form name="cart" method="POST" action="cart.php">
            <input type="hidden" name="total" value="<?php echo $totalprice; ?>">
            <?php if ($_SESSION['login'] == "") { ?>
                <button class="confirm"><a href="login.php">Login</a></button>
            <?php } else { ?>
            <button class="confirm" type="submit" name="submit" value="cart"> Confirm </button>
            <?php }?>
        </form>
		<a <?php echo "href=cart.php?rm=1";?>> <div class="reset">reset Cart</div></a>
		<?php
		}
		?>
</div>
<link rel="stylesheet" type="text/css" href="style.css">
