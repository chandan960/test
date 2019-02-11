<?php
include 'inc/header.php';
include 'lib/user.php';
session::checksession();
//session::checkLogin();


if (isset($_GET['id'])) {
	$userid = (int)$_GET['id'];
}
$user=new user();

if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['update'])) {
	$updateusr=$user->updateUser($userid, $_POST);
}
?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>User Profile <span class="pull-right"><a class="btn btn-primary" href="index.php">Back</a></span></h2>
			</div>
			<div class="panel-body">
				<div style="max-width: 600px;margin: 0 auto;">
					<?php
                    //if ($updateusr==true) {
					//echo $updateusr;
					//}
					$userdata=$user->getUserById($userid);
					if ($userdata==true) {
						
					
					?>
				<form action="" method="POST">
					<div class="form-group">
						<label for="name">Your Name</label>
						<input type="text" name="name" id="name" value="<?php echo $userdata->name; ?>" class="form-control" />
					</div>
					<div class="form-group">
						<label for="username">User Name</label>
						<input type="text" name="username" id="username" value="<?php echo $userdata->username; ?>" class="form-control" />
					</div>
					<div class="form-group">
						<label for="email">Email Address</label>
						<input type="text" name="email" id="email" value="<?php echo $userdata->email;; ?>" class="form-control" />
					</div>
					<?php
					$sesId=session::get("id");
					if ($userid==$sesId) {
					
					?>
					<button type="submit" name="update" class="btn btn-success">Update</button>
					<?php

					}
					?>
				</form>
				<?php
				}
				?>
				</div>
			</div>
		</div>
<?php
include 'inc/footer.php';
?>