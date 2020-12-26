<!DOCTYPE html>
<html>
<head>
	<title>Mochamad Megi Saputra</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="assets/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>

<?php

if (isset($_POST[submit])) {

$email = $_POST[email];
$pass = $_POST[password];

$q = mysqli_query($con,"SELECT * from users_tb where email='$email' and password=md5('$pass')");
$r = mysqli_num_rows($q);

if ($r > 0) {
session_start();
$e = mysqli_fetch_array($q);
$_SESSION[login] = true;
$_SESSION[user] = $email;
$_SESSION[name] = $e[name];
$_SESSION[id_user] = $e[id];
header("location:./");
}
else{
  echo "<script>alert('Username atau password yang anda masukan salah!');</script>";
}

}

?>

  <div class="navbar-fixed">
    <nav class="teal lighten-2">
    	<div class="container">	
	      <div class="nav-wrapper">
	        <a href="#!" class="brand-logo">Kilogram</a>
	        <ul class="right hide-on-med-and-down">
<?php
if (isset($_SESSION[login])) {
 ?>
  <!-- Dropdown Structure -->
<ul id="dropdown2" class="dropdown-content">
  <li><a href="?pages=logout">Logout</a></li>
</ul>
    <li><a class="dropdown-trigger" href="#!" data-target="dropdown2" style="text-transform: capitalize;"><?php echo $_SESSION[name]; ?><i class="material-icons right">arrow_drop_down</i></a></li>

<?php
}else{
?>
            <li><a class="modal-trigger" href="#login">Login</a></li>

<?php
}
?>
	        </ul>
	      </div>
	  </div>
    </nav>
  </div>

    <div id="login" class="modal">
<form class="col s12" method="post" action="#" >
    <div class="modal-content">
      <h4>Login</h4>
      <div class="row">
        <div class="input-field col s12">
          <i class="material-icons prefix">account_circle</i>
          <input id="icon_prefix" name="email" type="email" class="validate" required>
          <label for="icon_prefix">Email</label>
        </div>
        <div class="input-field col s12">
          <i class="material-icons prefix">lock</i>
          <input id="icon_lock" name="password" type="password" class="validate" required>
          <label for="icon_lock">Password</label>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <input type="submit" name="submit" class="btn teal" value="Login">
      <a href="#!" class="modal-close btn grey">Cancel</a>
    </div>
</form>
  </div>

