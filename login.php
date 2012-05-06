<html><head><title>Site | Login</title>
<?

include 'login_data.php';
include 'connect_to_db.php';

?>

</head>
<body>

<?
if(isset($_POST['submit'])) { 

  $uname = $_POST['uname'];
  $pword = $_POST['pword'];
    
  if($uname != NULL && $pword != NULL) {
  
    $fix_uname = urlencode($uname);
    $md5_pword = md5($pword);
    
    //echo $fix_uname;
    //echo "<br>";
    //echo $md5_pword;
    //echo "<br>";
    
    $query = "select * from users where username='$fix_uname' and password='$md5_pword'";
    $result = mysql_query($query);
    
    //echo mysql_numrows($result);
    
    if (mysql_numrows($result) == 1) {
      echo "<div style='background:#eeeeee;'>Redirecting...</div>";
      
      $sessionid = "SE_".rand(0,90909090)."Er67GHG_ssdw".rand(0,90909090)."4736GEr67G_".rand(0,90909090)."E4trdsa_".rand(0,909090);
      
      $query = "Insert into logged_in values ('','$sessionid','$fix_uname','0','1')";
      $result = mysql_query($query);
      
      echo "<script type=\"text/javascript\">";
      echo "var url='member/home.php?sid=$sessionid';";
      echo "document.location.href=url;";
      echo "</script>";
      
    } else {
      echo "<div style='background:#eeeeee;'>Wrong username/password.</div>";
    }
  }

} 

?>

<h2>Login Form</h2>
<form method="POST">

<table>
  <tr>
  <td>
  Username:
  </td>
  <td>   
  <input type="text" name="uname" size="25" value=<?php echo $_POST['uname']; ?>>
  </td>
  <td><i>Forgot my username!</i></td>
  </tr>
  <tr>
  <td>
  Password:
  </td>
  <td>
  <input type="text" name="pword" size="25" value=<?php echo $_POST['nothing']; ?>>
  </td>
  <td><i>Forgot my password!</i></td>
  </tr>
</table>

<input type="submit" value="Login" name="submit">

</form>



</body>