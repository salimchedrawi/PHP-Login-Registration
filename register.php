<html><head><title>Site | Register</title>
<?

include 'login_data.php';
include 'connect_to_db.php';


?>

</head>
<body>


<?
if(isset($_POST['submit'])) { 

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $re_email = $_POST['re_email'];
  $street = $_POST['street'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $zip = $_POST['zip'];
  $country = $_POST['country'];
  $telephone = $_POST['telephone'];
  $uname = $_POST['uname'];
  $pword = $_POST['pword'];
  $re_pword = $_POST['re_pword'];
    
  if($fname != NULL && $lname != NULL && $email != NULL && $re_email != NULL && $street != NULL && $city != NULL && $state != NULL && $zip != NULL && $country != NULL && $uname != NULL && $pword != NULL && $re_pword != NULL && $email == $re_email && $pword == $re_pword) {
  
    
    $query = "Insert into users values ('','$fname','$lname','$email','$street','$city','$state','$zip','$country','$telephone','$uname','".md5($pword)."','0')";
    if ($result = mysql_query($query)) {
    
      $to = "$fname $lname <$email>";  
      $from = "From: Site Registration <registration@site.com>";
      $subject = "Confirm your Yoofel registration";
      $code = "cy_".rand(0,99)."_".rand(300,99999)."_43".rand(100,500)."__".rand(100,500);
      $link = "http://site.com/member/confirm.php?user=$uname&code=$code";
        
      $body = "
      
      Dear $fname $lname,
      
      You are receiving this e-mail because you filled the registration form at Site (http://www.site.com/register.php)
      
      In order to complete your registration, you need to confirm your email address by clicking on the link below:
      
      $link
      
      If you are unable to click the link, copy-paste it your browser address. 
      
      If you did not register to Site, please ignore this email. Someone might have registered with your email address!
      
      If you have any questions contact us on registration@site.com or reply to this email.
      
      Best Regards,
      Site Team
      
      "; 
      
            
      mail($to, $subject, $body, $from);
        
      
      ?>
      <h2>Account Created!</h2>
      <p>Your account has been successfuly created on Site! However, you need to <b>confirm your e-mail address</b> before you can login to the site. We sent you a confirmation e-mail to <b><?=$email?></b> with details on how to complete your registration. You may need to check your Junk/Spam folder.</p> 
      
      <h3>Didn't receive your confirmation email yet?</h3>
      <p><a href="member/sendconfirmation.php?user=<?=$uname?>">Click here to send it again.</a></p>
      
      <?
      
      $query = "Insert into confirm values ('','$code','$uname','$fname','$lname','$email','0')";
      $result = mysql_query($query);
      
      $success=1;
      
      
    } else {
      echo "<div style='background:#eeeeee;'>Error creating your account. Please try again later.</div>";
    }
  } else {
    echo "<div style='background:#eeeeee;'>You have missing fields, or passwords do no match! Kindly fill all fields correctly.</div>";
  }
  
} 

if ($success != 1) {

?>

<h2>New Account</h2>

<form method="POST">

<h3>Enter Your Contact Info</h3>
<table>
  <tr>
  <td>
  First Name:
  <br>   
  <input type="text" name="fname" size="25" value=<?php echo $_POST['fname']; ?>>
  </td>
  <td><i></i></td>
  <td>
  Last Name:
  <br>
  <input type="text" name="lname" size="25" value=<?php echo $_POST['lname']; ?>>
  </td>
  <td><i></i></td>
  </tr>
</table>
<br>
<table>
  <tr>
  <td>
  E-mail:
  <br>
  <input type="text" name="email" size="25" value=<?php echo $_POST['email']; ?>>
  </td>
  <td><i></i></td>
  <td>
  Confirm E-mail:
  <br>
  <input type="text" name="re_email" size="25" value=<?php echo $_POST['re_email']; ?>>
  </td>
  <td><i></i></td>
  </tr>
</table>

<table>
  <tr>
  <td>
  Street Address:
  <br>
  <input type="text" name="street" size="50" value=<?php echo $_POST['street']; ?>>
  </td>
  <td><i></i></td>
  </tr>
  <tr>
  <td>
  City:
  <br>
  <input type="text" name="city" size="25" value=<?php echo $_POST['city']; ?>>
  </td>
  <td><i></i></td>
  </tr>
  <tr>
  <td>
  State / Province:
  <br>
  <input type="text" name="state" size="25" value=<?php echo $_POST['state']; ?>>
  </td>
  <td><i></i></td>
  </tr>
  <tr>
  <td>
  ZIP / Postal Code:
  <br>
  <input type="text" name="zip" size="25" value=<?php echo $_POST['zip']; ?>>
  </td>
  <td><i></i></td>
  </tr>
  <tr>
  <td>
  Country or Region:
  <br>
  <input type="text" name="country" size="25" value=<?php echo $_POST['country']; ?>>
  </td>
  <td><i></i></td>
  </tr>
  <tr>
  <td>
  Telephone Number:
  <br>
  <input type="text" name="telephone" size="25" value=<?php echo $_POST['telephone']; ?>>
  </td>
  <td><i></i></td>
  </tr>
</table>



<h3>Select Your Login Info</h3>
<table>
  <tr>
  <td>
  Username:
  <br>
  <input type="text" name="uname" size="25" value=<?php echo $_POST['uname']; ?>>
  </td>
  <td><i></i></td>
  </tr>
  <tr>
  <td>
  Password:
  <br>
  <input type="text" name="pword" size="25" value=<?php echo $_POST['pword']; ?>>
  </td>
  <td><i></i></td>
  <td>
  Comfirm Password:
  <br>
  <input type="text" name="re_pword" size="25" value=<?php echo $_POST['re_pword']; ?>>
  </td>
  <td><i></i></td>
  </tr>
</table>

<br>
<input type="submit" value="Register" name="submit">

</form>

<? } ?>

</body>
</html>