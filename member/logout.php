<?

include 'login_data.php';
include 'connect_to_db.php';


$sessionid = $_GET['sid'];

$query = "update logged_in set active='0' where sessionid='$sessionid'";
$result = mysql_query($query);

echo "<script type=\"text/javascript\">";
echo "var url='../login.php';";
echo "document.location.href=url;";
echo "</script>";

?>