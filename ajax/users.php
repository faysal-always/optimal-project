<?php
session_start();
if(!isset($_SESSION['amibangali'])){
	exit();
}
include "../config.php";
	if(isset($_REQUEST['userid'])){
		$uid = $_REQUEST['userid'];
		$query = $db->query("SELECT * FROM users WHERE uid = $uid");
		$user = $query->fetch_array();
		?>
		<table>
			<tr>
				<td>Name</td>
				<input type="hidden" id="userid" value="<?=$user['full_name']?>">
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
	}
?>