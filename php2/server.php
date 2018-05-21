<?php 
session_start();

	// variable declaration
$username = "";
$email    = "";
$errors = ""; 
$_SESSION['success'] = "";

	// CONNECTION TO THE DATABASE NAMED REGISTRATION
$db = mysqli_connect('localhost', 'root', '', 'registration');

	// REGISTER USER
if (isset($_POST['reg_user'])) {
		// receive all input values from the form
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
	if (empty($username)) { $errors= "Username is required"; }
	if (empty($email)) { $errors= "Email is required"; }
	if (empty($password_1)) { $errors= "Password is required"; }

	if ($password_1 != $password_2) {
		$errors= "The two passwords do not match";
	}

		// register user if there are no errors in the form
	else {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO users (username, email, password) 
			VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}

	}
// TASKS INPUT
	if (isset($_POST['task_add'])) {

		    $task = mysqli_real_escape_string($db,$_POST['task']);
			$date = mysqli_real_escape_string($db,$_POST['date']);
			$priority= mysqli_real_escape_string($db,$_POST['priority']);
			$descs= mysqli_real_escape_string($db,$_POST['descs']);
			$email=mysqli_real_escape_string($db,$_POST['email']);


      if (empty($task)) { $errors = "Task is required"; }
	if (empty($date)) { $errors = "date is required"; }
	if (empty($priority)) { $errors = "priority is required"; }
	if (empty($descs)) {$errors= "descs is required"; }
	if (empty($date)) { $errors= "date is required"; }
	if (empty($email)) { $errors= "Email is required"; }

		else{
			$sql = "INSERT INTO tasks (task,date,priority,descs,email) VALUES ('$task','$date','$priority','$descs','$email') ";
			mysqli_query($db, $sql);
			header('location: index.php');
		}
		
	}

	if (isset($_GET['del_task'])) {
		$id = $_GET['del_task'];

		mysqli_query($db, "DELETE FROM tasks WHERE id=".$id);
		header('location: index.php');
	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			$errors= "Username is required";
		}
		if (empty($password)) {
			$errors= "Password is required";
		}

		else {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}else {
				$errors= "Wrong username/password combination";
			}
		}
	}

	?>