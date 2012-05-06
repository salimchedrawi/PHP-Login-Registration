<html><head><title>Site | Members Area</title>
<?

include 'login_data.php';
include 'connect_to_db.php';

?>

</head>
<body>

<?

$sessionid = $_GET['sid'];

$query = "select * from logged_in where sessionid='$sessionid' and active='1'";
$result = mysql_query($query);

if (mysql_numrows($result) == 1) {

  $uname = mysql_result($result,0,"username");
  
  $query = "select * from users where username='$uname'";
  $result = mysql_query($query);
  
  $fname = mysql_result($result,0,"firstname");
  $lname = mysql_result($result,0,"lastname");
  $street = mysql_result($result,0,"street");
  $city = mysql_result($result,0,"city");
  $state = mysql_result($result,0,"state");
  $zip = mysql_result($result,0,"zip");
  $country = mysql_result($result,0,"country");
  $confirmed = mysql_result($result,0,"confirmed");
  
  if ($confirmed == "0") {
  
  ?>
  
    <h2>You did not confirm your e-mail address yet.</h2>
    
    <p>You should <b>confirm</b> your e-mail address by following the instructions in the e-mail we sent you after you registered.</p>
    
    <h3>Didn't receive your confirmation email yet?</h3>
    <p><a href="sendconfirmation.php?user=<?=$uname?>">Click here to send it again.</a></p>
  
  <?
  
  } else {
  
  ?>
  
    <h2>Welcome <?=$uname?>!</h2>

    <h3>Your Info</h3>
    <p>
    <u>Name:</u> <?=$fname?> <?=$lname?><br>
    <br>
    <u>Address:</u><br>
    <?=$street?>, <?=$city?>, <?=$state?><br>
    <?=$zip?><br>
    <?=$country?>
    </p>
  
  <?
  }
  
} else {

  echo "<script type=\"text/javascript\">";
  echo "var url='../login.php';";
  echo "document.location.href=url;";
  echo "</script>";
  
}

?>

<p>
<a href="logout.php?sid=<?=$sessionid?>">Logout</a>
</p>

</body>
</html>
