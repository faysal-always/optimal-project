<?php
session_start();
if(!isset($_SESSION['amibangali'])){
	exit();
}
$action  = $_GET['action'];
include "../config.php";
	if($action=='getupdatemodal'){
		$uid = $_REQUEST['userid'];
		$query = $db->query("SELECT * FROM users WHERE uid = $uid");
		$user = $query->fetch_array();
		?>
		<table>
			<tr>
				<td>Name</td>
				<input type="hidden" id="userid" value="<?=$user['uid']?>">
				<td><input id="uFullname" value="<?=$user['full_name']?>"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input id="uEmail"  value="<?=$user['email']?>"></td>
			</tr>
			<tr>
				<td>DOB</td>
				<td><input id="uDob"  value="<?=$user['dob']?>"></td>
			</tr>
		</table>
		<?php
	}elseif($action=='updateUserdata'){
		$uid = $_GET['userid'];
		$fname = $_GET['uname'];
		$email = $_GET['uemail'];
		$dob = $_GET['udob'];

		$updated = $db->query("UPDATE `users` SET `email`= '$email', `full_name`= '$fname',`dob`='$dob' WHERE uid = $uid");
		if($updated){
			echo 'updated';
		}
	}
?>