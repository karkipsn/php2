<?php 

$errors ="";

$db = mysqli_connect('localhost', 'root', '', 'registration');

if (isset($_POST['product_submit'])) {
	if (empty($_POST['id'] and ($_POST['name']and $_POST['price'] and $_POST['description'] and $_POST['created_at'] and $_POST['updated_at']))) {
		
		$errors = "You must fill all the field";
	}else{
		$id= $_POST['id'];
		$name = $_POST['name'];
		$price = $_POST['price'];
		$description= $_POST['description'];
		$created_at= $_POST['created_at'];
		$updated_at=$_POST['updated_at'];
		$sql = "INSERT INTO product (id,name,price,description,created_at,updated_at) VALUES ('$id','$name','$price','$description','$created_at','$updated_at')  ";
		mysqli_query($db, $sql);
		header('location: product.php');
	}
}

?>
<!DOCTYPE html>
<html>

<head>
	<<title>Products</title>

	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div class="header">
		<h2>Products Creation</h2>
	</div>

	<form  id="product" method="post" action="Product.php" class="input_form">
             
			<div class="input-group">
				<label for="product-id">ID:</label>
				<input id="product-task" name="id" type="number" required>
			</div>
			<!-- <input type="text" name="task" class="task_input"> -->
			<div class="input-group">
				<label for="product-name">Name:</label>
				<input id="product-date"  name="name" class="date_input"  type="text" required>
			</div>

			<div class="input-group">
				<label for="product-price">Price:</label>
				<input id="product-price" name="price" type="number" required>
			</div>
			<div class="input-group">	
				<label for="product-description">Description:</label>
				<input id="product-description" name="description" type="text">
			</div>
			<div class="input-group">
				<label for="product-created_at">Created:</label>
				<input id="product-created_at" name="created_at" class="date_input"  type="date" required>
				<div>
					<div class="input-group">
				<label for="product-updated_at">Updated:</label>
				<input id="product-updated_at" name="updated_at" class="date_input"  type="date" required>
				<div>
					<div class="input-group">
						<button type="submit" name=product_submit" class="btn">Add Product</button>
					</div>
	</form>


</body>
</html>