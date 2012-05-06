PHP-Login-Registration
======================

Simple and Straight-Forward code to create a PHP Login and Registration system

<b><u>Database: </u></b>MySQL

Files
======================

<ul>
<li><b><i>connect_to_db.php</i></b></li>
Creates connection to database and selects database.
</ul>

<ul>
<li><b><i>login_data.php</i></b></li>
Contains varibales for database host, database user, database password, database name. 
</ul>


<ul>
<li><b><i>index.php</i></b></li>
Contains buttons Login that takes you to login.php, and Register that takes you to register.php
</ul>


<ul>
<li><b><i>login.php</i></b></li>
Calls login_data.php and connect_to_db.php
Contains Login Form with Username and Password
Encrypts password with md5
If login true, Creates a random Session id then redirects you to member/home.php?sid=$sessionid
</ul>


<ul>
<li><b><i>register.php</i></b></li>
Calls login_data.php and connect_to_db.php
Has form to register account.
Once form submitted, e-mail sent to confirm email address.
</ul>


<ul>
<li><b><i>member/confirm.php</i></b></li>
Calls login_data.php and connect_to_db.php
Code to validate that the user has confirms his e-mail address.
Checks if the user confirmed his e-mail address or not.
If he hasn't confirmed, it will confirm, if he has already, it will take him to the Login Screen.
</ul>

<ul>
<li><b><i>member/home.php</i></b></li>
Calls login_data.php and connect_to_db.php
Gets session id and checks if it is still active. If it is not active, it will take you to the login screen again.
If it is, it checks if your e-mail address is confirmed. If it is not, it will ask you to confirm your e-mail address again.
If your email address is confirmed, it will show you the page with the required information.
</ul>

<ul>
<li><b><i>member/logout.php</i></b></li>
Calls login_data.php and connect_to_db.php
Logs out the user by setting the session id to inactive.
</ul>

<ul>
<li><b><i>member/sendconfirmation.php</i></b></li>
Calls login_data.php and connect_to_db.php
Checks if e-mail address has been confirmed. If it hasn't it will send an e-mail confirmation letter.
If it was already confirmed, it will ask you to go to the Login Screen.
If the e-mail was properly sent, it will show you a form where the user can re-send the confirmation e-mail just in case he wasn't able to receive it.
</ul>

