<?php
include 'inc/header.php';
include 'lib/user.php';
session::checksession();
//session::checkLogin();



$loginmsg=session::get("loginmsg");
if (isset($loginmsg)) {
	echo $loginmsg;
}
session::set("loginmsg",NULL);
?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h2>User list <span class="pull-right">Welcome!<strong>

					<?php
					$name=session::get("username");
					if (isset($name)) {
						echo $name;
					}
					?>


				</strong></span></h2>
			</div>
			<div class="panel-body">
				<table class="table table-striped">
					<th width="20%">Serial</th>
					<th width="20%">Name</th>
					<th width="20%">User name</th>
					<th width="20%">Email Address</th>
					<th width="20%">Action</th>

					<?php
					$user=new user();
					$userdata=$user->getUserData();
					if ($userdata==true) {
						$i=0;
						foreach ($userdata as $data) {
							$i++;

					?>
					<tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $data['name']; ?></td>
						<td><?php echo $data['username']; ?></td>
						<td><?php echo $data['email']; ?></td>
						<td>
							<a class="btn btn-primary" href="profile.php?id=<?php echo $data['id']; ?>">View</a>
						</td>
					</tr>
					<?php
				}
			}else{
				?>
				<tr><td colspan="5"><h2>No Data In Database</h2></td></tr>
				<?php
			}
			?>

				</table>
			</div>
		</div>
<?php
include 'inc/footer.php';
?>