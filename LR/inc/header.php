<!DOCTYPE html>
<html>
<?php
$filepath=realpath(dirname(__FILE__));
include_once $filepath.'/../lib/session.php';
session::init();
?>
<head>
	<title>Login Register System PHP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<?php
if (isset($_GET['action']) && $_GET['action']=="logout") {
	session::destroy();
}
?>
<body>
	<div class="container">
		<nav class="navbar navbar-default">
			<div class="container-fluid">
				<div class="navbar-header"> 
					<a class="navbar-brand" href="index.php">Login Registration System PHP & PDO</a>
				</div>
				<div class="navbar-header pull-right">
					<ul class="nav navbar-nav pull-right">
						<?php
						$id=session::get("id");
						$userlogin=session::get("login");
						if ($userlogin==true) {
							?>
							<li><a href="index.php">Home</a></li>
						   <li><a href="profile.php?id=<?php echo $id; ?>">Profile</a></li>
					       <li><a href="?action=logout">Logout</a></li>
						<?php
						}
						else{
						?>
					   <li><a href="login.php">Login</a></li>
					   <li><a href="register.php">Register</a></li>
					   <?php
					}
					?>
				    </ul>
				</div>
				
			</div>
		</nav>