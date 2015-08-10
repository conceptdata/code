<?php
function writeShoppingCart() {
	$cart = $_SESSION['cart'];
	$result = $_SESSION['result'];
	$_SESSION['result'] = $_POST['result'];
	$_SESSION["cart"] = $_POST["cart"]; 
	if (!$cart) {
		return '<p>You have no items in your shopping cart</p>';
	} else {
		// Parse the cart session variable
		$items = explode(',',$cart);
		$s = (count($items) > 1) ? 's':'';
		return '<h2>You have <a href="machines_baket.php">'.count($items).' item'.$s.' in your shopping cart</a></h2><br /><br />';
	}
}

function showCart() {
	global $db;
	$cart = $_SESSION['cart'];
	$contents = $_SESSION['contents'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
			
		}
		$output[] = '<form action="feed.php" method="GET" id="cart">';
		$output[] = '<table align="center" cellpadding="2" cellspacing="2" width = "800">';
		  $output[]='<tr >';
        $output[]='<td align="left" td bgcolor="#000000"><span class="black_titles">&nbsp; Reference</span></td>';
        $output[]='<td align="left" td bgcolor="#000000"><span class="black_titles">&nbsp; Make</span></td>';
        $output[]='<td align="left" td bgcolor="#000000"><span class="black_titles">&nbsp; Model</span></td>';
        $output[]='<td align="left" td bgcolor="#000000"><span class="black_titles">&nbsp; Age</span></td>';
        $output[]='<td align="left" td bgcolor="#000000"><span class="black_titles">&nbsp; Remove</span></td>';
        $output[]='</tr>';
		foreach ($contents as $recordID=>$qty) {
			$sql = 'SELECT * FROM Machines ';
			$result = $db->query($sql);
			$row = $result->fetch(); 
            
            
      
    
			extract($row);
			$output[] = '<tr>';
			$output[] = '<td width="160" align="left" bgcolor="#CCCCCC">'.$Cat.' '.$Ref.'</td>';
			$output[] = '<td width="160" align="left" bgcolor="#CCCCCC">'.$Make.'</td>';
			$output[] = '<td width="160" align="left" bgcolor="#CCCCCC">'.$Model.'</td>';
			$output[] = '<td width="160" align="left" bgcolor="#CCCCCC">'.$Age.'</td>';
			$output[] = '<td width="160" align="left" bgcolor="#CCCCCC"><a href="machines_baket.php?action=delete&recordID='.$recordID.'" class="r">Remove</a></td>';
			$output[] = '</tr>';
		}
		$output[] = '</table>';
		$output[] = '<button type="submit">Send Query</button>';
		$output[] = '</form>';
	} else {
		$output[] = '<p>You shopping cart is empty.</p>';
	}
	return join('',$output);
}
?>
