<?php
	require 'connect.php';
	
	if(isset($_POST['submit'])) {
		session_start();


		$first = mysqli_real_escape_string($con, $_POST['fname']);
		$last = mysqli_real_escape_string($con, $_POST['lname']);
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$age = mysqli_real_escape_string($con, $_POST['age']);
		$sex = mysqli_real_escape_string($con, $_POST['gender']);
		$profession = mysqli_real_escape_string($con, $_POST['profession']);
		$biography = mysqli_real_escape_string($con, $_POST['biography']);
		$file = $_FILES['image'];
		$filename = $file['name'];
	
		if ($filename=="" || $email=="" || $sex="" || $biography="" || $profession="") {
			if (empty($first) || empty($last) || empty($email)) {
			header("Location: profile.php?Update=Empty_field");
			exit();
			}
			else {
				if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
					header("Location: profile.php?Update=Invalid_inputs");
					exit();
				}
				else {
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						header("Location: profile.php?Update=Invalid_email");
						exit();	
					}
					else {

						$userid = $_SESSION['userUid'];
						$sql = "UPDATE users SET firstname='$first', lastname='$last', emailUsers='$email', age='$age', sex='$sex', profession='$profession', biography='$biography' WHERE uidUsers='$userid';";
						$result = mysqli_query($con, $sql);
						header("Location: profile.php?only_detail_Update_Success");
						echo '<script>alert("Successfully Updated!")</script>';
						exit();		
					}
				}
			}
		}

		else {
			
			$filename = $file['name'];

			$fileerror = $file['error'];
			$filetmp = $file['tmp_name'];

			$fileext = explode('.',$filename);
			$filecheck = strtolower(end($fileext));

			$allowed = array('png', 'jpg', 'jpeg');

			if (in_array($filecheck,$allowed)) {
				$destinationfile='upload/'.$filename;
				move_uploaded_file($filetmp, $destinationfile);
			}

			else {
				header("Location: profile.php?couldn't_upload_image");
			}

			if (empty($first) || empty($last) || empty($email)) {
				header("Location: profile.php?Update=Empty_field");
				exit();
			}
			else {
				if (!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)) {
					header("Location: profile.php?Update=Invalid_inputs");
					exit();
				}
				else {
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
						header("Location: profile.php?Update=Invalid_email");
						exit();	
					}
					else {

							$userid = $_SESSION['userUid'];
							$sql = "UPDATE users SET firstname='$first', lastname='$last', emailUsers='$email', img='$destinationfile', age='$age', sex='$sex', profession='$profession', biography='$biography' WHERE uidUsers='$userid';";
							$result = mysqli_query($con, $sql);
							header("Location: profile.php?Update_Success");
							echo '<script>alert("Successfully Updated!")</script>';
							exit();		
					}
				}
			}
		}
	}
	else {
		header("Location: profile.php");
		exit();
	}
?>