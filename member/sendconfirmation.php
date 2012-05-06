<?

include 'login_data.php';
include 'connect_to_db.php';

if(isset($_POST['submit'])) { 

  $user = $_POST['uname'];

  $query = "select * from confirm where username = '$user'";
  $result = mysql_query($query);

  if (mysql_numrows($result) != 0) { 
  
    $applied = mysql_result($result,0,"applied");
    
    if ($applied == "0") {
      $code = mysql_result($result,0,"code");
      $fname = mysql_result($result,0,"firstname");
      $lname = mysql_result($result,0,"lastname");
      $email = mysql_result($result,0,"email");
      
      $to = "$fname $lname <$email>";  
      $from = "From: Site Registration <registration@site.com>";
      $subject = "Confirm your Site registration";
      
      $link = "http://site.com/member/confirm.php?user=$user&code=$code";
        
      $body = "
      
      Dear $fname $lname,
      
      You are receiving this e-mail because you filled the registration form at Site (http://www.site.com/register.php)
      
      In order to complete your registration, you need to confirm your email address by clicking on the link below:
      
      $link
      
      If you are unable to click the link, copy-paste it your browser address. 
      
      If you did not register to Site, please ignore this email. Someone might have registered with your email address!
      
      If you have any questions contact us on registration@site.com or reply to this email.
      
      Best Regards,
      Site
      
      "; 
      
            
      mail($to, $subject, $body, $from);
      
      echo "Confirmation e-mail sent!<br>";
      echo "<br><a href='sendconfirmation.php'>Send it again!</a>";
      
      $success = 1;
      
    } else {

      ?>

      <h2>You have already confirmed your e-mail!</h2>
      
      <p><a href="../login.php">Go to the Login Screen</a></p>
      

      <?
      
      $success = 1;
    }
    
  } else {

  ?>
    
    <h2>Error!</h2>
    
    <p>Incorrect username or error in URL.</p>
    
    <?
    
  }

}

if ($success != 1) {

?>
  <h2>Re-send confirmation e-mail</h2>
  
  <p>Enter your username below and we will send you an e-mail with your confirmation link.</p>
  
  <form method="POST">
  <table>
  <tr>
  <td>
  Username:
  <br>
  <input type="text" name="uname" size="25">
  </td>
  <td><i></i></td>
  </tr>
  </table>
  <br>
  <input type="submit" value="Submit" name="submit">
  </form>
  
<?
  
} 

?>



