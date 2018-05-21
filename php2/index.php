<?php 
session_start(); 

if (!isset($_SESSION['username'])) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['username']);
	header("location: login.php");
}
   // initialize errors variable
$errors = "";

	// connect to database
$db = mysqli_connect("localhost", "root", "", "registration");
	// insert a quote if submit button is clicked
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Home Page</h2>
	</div>
	<!-- notification message -->
	<?php if (isset($_SESSION['success'])) : ?>
		<div class="error success" >
			<h3>
				<?php 
				echo $_SESSION['success']; 
				unset($_SESSION['success']);
				?>
			</h3>
		</div>
	<?php endif ?>

	<!-- logged in user information -->

	<?php  if (isset($_SESSION['username'])) : ?>

		<div class="header">
			<h4>Welcome <strong><?php echo $_SESSION['username']; ?></strong>!!!</h4>
			<h5> Remainder of Your tasks</h5>
		</div>


		<form  id="tasks" method="post" action="index.php" class="input_form">

			<div class="input-group">
				<label for="tasks-task">Task:</label>
				<input id="tasks-task" name="task" type="text" required>
			</div>
			<!-- <input type="text" name="task" class="task_input"> -->
			<div class="input-group">
				<label for="tasks-date">Date:</label>
				<input id="tasks-date"  name="date" class="date_input"  type="date" required>
			</div>

			<div class="input-group">
				<label for="tasks-priority">Priority:</label>
				<input id="tasks-priority" name="priority" type="number" required min="1" max="5" step="1" value="2">
			</div>
			<div class="input-group">	
				<label for="tasks-descs">Description:</label>
				<input id="tasks-descs" name="descs" type="text" required>
			</div>
			<div class="input-group">
				<label for="tasks-email">Invite:</label>
				<input id="tasks-email" name="email" type="email" multiple>
			</div>
			
			<button class = "btn" type = "submit" 
               name = "task_add">Add</button>
			
			<!-- <?php if (isset($errors)) { ?>
				<p><?php echo $errors; ?></p>
			<?php } ?> -->
		

		<p> <a href="index.php?logout='1'" style="color: red;">logout</a> <a href="products/product.php" style="color: red;">Products</a> </p> 
		</form>

	<?php endif ?>
</div>

</body>

<body>
	<table border="1"
	>

	<thead>
		<tr>
			<th >N</th>
			<th>Tasks</th>
			<th width="40px"> Date</th>
			<th>Priority</th>	
			<th>Description</th>
			<th>Email</th>
			<th align="center">Action</th>
		</tr>
	</thead>

	<tbody>
		<?php 
		// select all tasks if page is visited or refreshed
		$tasks = mysqli_query($db, "SELECT * FROM tasks");

		$i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td class="task"> <?php echo $row['task']; ?> </td>
				<td class="date"> <?php echo $row['date']; ?> </td>
				<td align="center" class="priority"> <?php echo $row['priority']; ?> </td>
				<td class="descs"> <?php echo $row['descs']; ?> </td>
				<td  align="center" class="email"> <?php echo $row['email']; ?> </td>

				<td align="center" class="delete"> 
					<a href="server.php?del_task=<?php echo $row['id'] ?>">x</a> 
				</td>
			</tr>

			<?php $i++; } ?>	

		</tbody>
	</table>

</body>

</html>