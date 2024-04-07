<?php
session_start();
ob_start();
require("lib/coreFunction.php");
$f = new ConeFunction();
define("PATH", "http://localhost/nguyenvinh/index.php?");
require("partial/header.php");
?>

<?php
if (!isset($_GET['page'])) {
	$page = "";
} else {
	$page = $_GET['page'];
}


$route = [
	'product' => 'product/product.php',
	'cart' => 'cart/cart.php',
	'contact' => 'user/contact.php',
	'registration' => 'user/registration.php',
	'login' => 'user/login.php',
	'doLogin' => 'user/doLogin.php',
	'logout' => 'user/logout.php',
	'user_detail' => 'user/user_detail.php',
	'detail' => 'product/detail.php',
	'home' => 'nguyenlecanhtien/home.php',
	'timkiem' => 'nguyenlecanhtien/timkiem.php',
	'catProduct' => 'product/catProduct.php',
	'account' => 'user/account.php',
	'err404' => 'user/err404.php',
	'addToCart' => 'cart/addToCart.php',
	'removeItemCart' => 'cart/removeItemCart.php',
	'removeCart' => 'cart/removeCart.php',
	'buyCart' => 'cart/buyCart.php',
	'checkout' => 'cart/checkout.php',


	'Alogin' => 'admin/Alogin.php',
	'AdoLogin' => 'admin/AdoLogin.php',
];

foreach ($route as $r => $val) {
	if ($r == $page) {
		require($val);
	}
}
?>
<?php
require("partial/footer.php");
?>