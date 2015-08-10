<?php session_start(); 
// Include MySQL class
require_once('cart/inc/mysql.class.php');
// Include database connection
require_once('cart/inc/global.inc.php');
// Include functions
require_once('cart/inc/functions.inc.php');
// Process actions
$cart = $_SESSION['cart'];
$action = $_GET['action'];
switch ($action) {
	case 'add':
		if ($cart) {
			$cart .= ','.$_GET['recordID'];
		} else {
			$cart = $_GET['recordID'];
		}
		break;
	case 'delete':
		if ($cart) {
			$items = explode(',',$cart);
			$newcart = '';
			foreach ($items as $item) {
				if ($_GET['recordID'] != $item) {
					if ($newcart != '') {
						$newcart .= ','.$item;
					} else {
						$newcart = $item;
					}
				}
			}
			$cart = $newcart;
		}
		break;
	case 'update':
	if ($cart) {
		$newcart = '';
		foreach ($_POST as $key=>$value) {
			if (stristr($key,'qty')) {
				$recordID = str_replace('qty','',$key);
				$items = ($newcart != '') ? explode(',',$newcart) : explode(',',$cart);
				$newcart = '';
				foreach ($items as $item) {
					if ($recordID != $item) {
						if ($newcart != '') {
							$newcart .= ','.$item;
						} else {
							$newcart = $item;
						}
					}
				}
				for ($i=1;$i<=$value;$i++) {
					if ($newcart != '') {
						$newcart .= ','.$recordID;
					} else {
						$newcart = $recordID;
					}
				}
			}
		}
	}
	$cart = $newcart;
	break;
}
$_SESSION['cart'] = $cart;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script src="../SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrapper">
  <div id="header"><img src="images/logo960.png" width="1000" height="69" /> <img src="images/toptext.png" width="1000" height="40" /></div>
  <div id="navigation">
    <ul id="MenuBar1" class="MenuBarHorizontal">
      <li><a href="index.php"><img src="images/menuimage/home.png" width="115" height="40" /></a></li>
      <li><a class="MenuBarItemSubmenu" href="machines.php"><img src="images/menuimage/machines.png" width="115" height="40" /></a>
        <ul>
          <li><a href="flexo.php"><img src="images/menuimage/flexo.png" width="115" height="40" /></a></li>
          <li><a href="letterpress.php"><img src="images/menuimage/letterpress.png" width="115" height="40" /></a></li>
          <li><a href="offset.php"><img src="images/menuimage/offset.png" width="115" height="40" /></a></li>
          <li><a href="screen.php"><img src="images/menuimage/screen.png" width="115" height="40" /></a></li>
          <li><a href="misc.php"><img src="images/menuimage/misc.png" width="115" height="40" /></a></li>
        </ul>
      </li>
      <li><a href="wanted.php"><img src="images/menuimage/wanted.png" width="115" height="40" /></a> </li>
      <li><a href="mailing.php"><img src="images/menuimage/mailing.png" width="115" height="40" /></a></li>
      <li><a href="specials.php"><img src="images/menuimage/specials.png" width="115" height="40" /></a></li>
      <li><a href="news.php"><img src="images/menuimage/news.png" width="115" height="40" /></a></li>
      <li><a href="about.php"><img src="images/menuimage/about.png" width="115" height="40" /></a></li>
      <li><a href="contact.php"><img src="images/menuimage/contact.png" width="115" height="40" /></a></li>
    </ul>
  </div>
  <div id="content">
    <div class="basket">
      <?php
echo showCart();
?>
      <p><a href="machines.php">Add More Machines?</a></p>
    </div>
  </div>
  <div id="footer"><img src="images/footer_img.jpg" width="1000" height="28" />
    <p><a href="http://www.sandalitservices.co.uk">Website Design Wakefield</a> By Sandal IT Services | <a href="sitemap.html">Sitemap</a> | <a href="disclaimer.php">Website Disclaimer</a> | <a href="privacy.php">Privacy Policy</a> </p>
    <p>©2012 Labelform Graphics</p>
  </div>
</div>
<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"../SpryAssets/SpryMenuBarDownHover.gif", imgRight:"../SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
