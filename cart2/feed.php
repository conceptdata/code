<?php session_start();


if (array_key_exists('send', $_POST)) {
  // mail processing script
  // remove escape characters from POST array
  if (PHP_VERSION < 6 && get_magic_quotes_gpc()) {
    function stripslashes_deep($value) {
	  $value = is_array($value) ? array_map('stripslashes_deep', $value) : stripslashes($value);
	  return $value;
	}
    $_POST = array_map('stripslashes_deep', $_POST);
  }

 $to = 'relay@sandalitservices.co.uk'; // use your own email address
// $to = 'jon@labelformgraphics.co.uk'; // use your own email address
  $subject = 'Feedback from Essential Guide';
  
  // list expected fields
  $expected = array('name', 'company', 'email', 'telephone', 'country');
  // set required fields
  $required = array('name', 'company' ,'email');
  // create empty array for any missing fields
  $missing = array();
  // set default values for variables that might not exist
  if (!isset($_POST['interests'])) {
    $_POST['interests'] = array();
  }
  if (!isset($_POST['views'])) {
    $_POST['views'] = array();
  }
 

  // assume that there is nothing suspect
  $suspect = false;
  // create a pattern to locate suspect phrases
  $pattern = '/Content-Type:|Bcc:|Cc:/i';
  
  // function to check for suspect phrases
  function isSuspect($val, $pattern, &$suspect) {
    // if the variable is an array, loop through each element
    // and pass it recursively back to the same function
    if (is_array($val)) {
      foreach ($val as $item) {
         isSuspect($item, $pattern, $suspect);
      }
    } else {
      // if one of the suspect phrases is found, set Boolean to true
      if (preg_match($pattern, $val)) {
        $suspect = true;
      }
    }
  }

  // check the $_POST array and any subarrays for suspect content
  isSuspect($_POST, $pattern, $suspect);

  if ($suspect) {
    $mailSent = false;
    unset($missing);
  } else {
    // process the $_POST variables
    foreach ($_POST as $key => $value) {
      // assign to temporary variable and strip whitespace if not an array
      $temp = is_array($value) ? $value : trim($value);
      // if empty and required, add to $missing array
      if (empty($temp) && in_array($key, $required)) {
        array_push($missing, $key);
      } elseif (in_array($key, $expected)) {
	    // otherwise, assign to a variable of the same name as $key
        ${$key} = $temp;
      }
    }
  }
  
  // validate the email address
  if (!empty($email)) {
    // regex to identify illegal characters in email address
    $checkEmail = '/^[^@]+@[^\s\r\n\'";,@%]+$/';
	// reject the email address if it doesn't match
    if (!preg_match($checkEmail, $email)) {
      $suspect = true;
      $mailSent = false;
      unset($missing);
    }
  }

  
  // go ahead only if not suspect and all required fields OK
  if (!$suspect && empty($missing)) {
 $query =  $_SESSION['cart'];
    // build the message
    $message = "Name: $name\r\n\r\n";
    $message .= "Company Name: $company\r\n\r\n";
	$message .= "Email: $email\r\n\r\n";
	$message .= "Telephone: $telephone\r\n\r\n";
	$message .= "Country: $country\r\n\r\n";
	$message .= "Query: $query\r\n\r\n";
	
    // limit line length to 70 characters
    $message = wordwrap($message, 70);

     // create additional headers
     $headers = "From:LFG Machine Query\r\n";
	 $headers .= 'Content-Type: text/plain; charset=utf-8';
     if (!empty($email)) {
       $headers .= "\r\nReply-To: $email";
     }

	 
    // send it  
    $mailSent = mail($to, $subject, $message, $headers, '-frelay@sandalitservices.co.uk');
    //$mailSent = mail($to, $subject, $message, $headers, '-fjon@labelformgraphics.co.uk');
    if ($mailSent) {
      // $missing is no longer needed if the email is sent, so unset it
      unset($missing);
    }
  }
}
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
  <div id="header"><img src="images/logo960.png" width="1000" height="69" />
  <img src="images/toptext.png" width="1000" height="40" /></div>
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
      <li><a href="wanted.php"><img src="images/menuimage/wanted.png" width="115" height="40" /></a>      </li>
      <li><a href="mailing.php"><img src="images/menuimage/mailing.png" width="115" height="40" /></a></li>
      <li><a href="specials.php"><img src="images/menuimage/specials.png" width="115" height="40" /></a></li>
      <li><a href="news.php"><img src="images/menuimage/news.png" width="115" height="40" /></a></li>
      <li><a href="about.php"><img src="images/menuimage/about.png" width="115" height="40" /></a></li>
      <li><a href="contact.php"><img src="images/menuimage/contact.png" width="115" height="40" /></a></li>
    </ul>
  </div>
  <div id="content">
  
   <h3>Contact Us</h3>
<?php
if ($_POST && isset($missing) && !empty($missing)) {
?>
  <p class="warning">Please complete the missing item(s) indicated.</p>
<?php
} elseif ($_POST && !$mailSent) {
?>
  <p class="warning">Sorry, there was a problem sending your message. Please try later.</p>
<?php
} elseif ($_POST && $mailSent) {
?>
  <p><strong>Your request has been sent, thankyou for your interest</strong></p>
<?php } ?>

<div class="queryform">
  <form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <fieldset>
      <legend>Your details</legend>
      <p>&nbsp;</p>
      <p>
        <label for="name">Name: <?php
      if (isset($missing) && in_array('name', $missing)) { ?>
          <span class="warning">Please enter your name</span><?php } ?>
          </label>
        <input name="name" type="text" class="textInput" id="name" 
      <?php if (isset($missing)) {
		echo 'value="' . htmlentities($_POST['name'], ENT_COMPAT, 'UTF-8') . '"';
	  } ?>
      />
        </p>
      <p>&nbsp;</p>
      <p>
        <label for="company">Company:  <?php
      if (isset($missing) && in_array('name', $missing)) { ?>
          <span class="warning">Please enter your company name</span><?php } ?>
          </label>
        <input name="company" type="text" class="textInput" id="company" 
      <?php if (isset($missing)) {
		echo 'value="' . htmlentities($_POST['company'], ENT_COMPAT, 'UTF-8') . '"';
	  } ?>
      />
      </p>
      <p>&nbsp; </p>
      <p>
        <label for="email">Email:  <?php
      if (isset($missing) && in_array('name', $missing)) { ?>
          <span class="warning">Please enter your Email</span><?php } ?>
          </label>
        <input name="email" type="text" class="textInput" id="email" 
      <?php if (isset($missing)) {
		echo 'value="' . htmlentities($_POST['email'], ENT_COMPAT, 'UTF-8') . '"';
	  } ?>
      />
        </p>
      <p>&nbsp;</p>
      <p>
        <label for="telephone">Telephone: </label>
        <input name="telephone" type="text" class="textInput" id="telephone" 
      <?php if (isset($missing)) {
		echo 'value="' . htmlentities($_POST['telephone'], ENT_COMPAT, 'UTF-8') . '"';
	  } ?>
      />
        </p>
      <p>&nbsp;</p>
      <p>
        <label for="country">Country: </label>
        <input name="country" type="text" class="textInput" id="country" 
      <?php if (isset($missing)) {
		echo 'value="' . htmlentities($_POST['country'], ENT_COMPAT, 'UTF-8') . '"';
	  } ?>
      />
        </p>
      <p>&nbsp;</p>
      
      </p>
      <p class="clearIt">
        <input name="send" type="submit" id="send" value="Send Query" />
        </p>
      </fieldset>
  </form>
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
