<?php
session_start();

if (isset($_POST['submit'])) {
  include 'dbh.inc.php';

  $userid = mysqli_real_escape_string($conn, $_POST['userid']);
   $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

 	if (empty($userid) || empty($pwd)) {
		header("Location: ../firstpage.php?login=empty");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE user_userid='$userid' OR user_email='$userid' ";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../firstpage.php?login=error");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				
				if ($pwd == $row['user_pwd']) {
					//Log in the user here
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_userid'] = $row['user_userid'];
					$_SESSION['u_usertype'] = $row['user_type'];
					header("Location: ../firstpage.php?login=success".$_SESSION['u_usertype']);
					exit();
				}
				else {
					header("Location: ../firstpage.php?login=error");
					exit();
				}
			}
		}
	}
}
 else {
	header("Location: ../firstpage.php?login=error");
	exit();
}

