<?

include 'login_data.php';
include 'connect_to_db.php';


$code = $_GET['code'];
$user = $_GET['user'];

$query = "select * from confirm where code = '$code' and username = '$user'";
$result = mysql_query($query);

if (mysql_numrows($result) != 0) {
  $applied = mysql_result($result,0,"applied");
  
  if ($applied == '0') {

    $query = "update users set confirmed='1' where username = '$user'";
    $result = mysql_query($query);
    
    ?>
    
    <h2>Welcome to Site!</h2>
    
    <p>You are now being redirected to the Login Screen...</p>
    
    <script type="text/javascript">
    <!--
    var url='../login.php';
    document.location.href=url;
    //-->
    </script>

  <?
    
  } else {

  ?>

    <h2>You have already confirmed your email!</h2>
    
    <p><a href="../login.php">Go to the Login Screen</a></p>
  
  <?
  
  }
  
} else {

?>
  
  <h2>Error!</h2>
  
  <p>Wrong confirmation code or error in URL.</p>
  
  <?
  
}

?>

