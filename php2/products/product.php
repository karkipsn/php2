
<?php 
include_once '../server.php';
?>

<!DOCTYPE html>
<html
<head>
	<title>Products</title>

	<style >

	* {
	margin: 0px;
	padding: 0px;
}

body {
	font-size: 100%;
	background: #FF0000;
	align-content: center;
}

.header {
	width: 30%;
	margin: 50px auto 0px;
	color: white;
	background: #FF0000;
	text-align: center;
	border: 1px solid #B0C4DE;
	border-bottom: none;
	border-radius: 10px 10px 0px 0px;
	padding: 20px;
}

	form, .content {
		width: 60%;
		margin: 10px ;
		margin: 50px auto 0px;
		padding: 10px;
		border: 1px solid #B0C4DE;
		background: white;
		border-radius: 0px 0px 10px 10px;
	}
	.input-group {
		width: 200px
		margin: 10px 0px 10px 0px;
	}

	.input-group label {
		width: 150px
		display: block;
		text-align: left;
		margin: 10px;
	}
	.input-group input {
		height: 30px;
		width: 93%;
		padding: 5px 10px;
		font-size: 16px;
		border-radius: 5px;
		border: 1px solid gray;
	}
	.btn {
		padding: 10px;
		font-size: 15px;
		color: white;
		background: #FF0000;
		border: none;
		border-radius: 5px;
	}
	.error {
		width: 92%; 
		margin: 0px auto; 
		padding: 10px; 
		border: 1px solid #a94442; 
		color: #a94442; 
		background: #f2dede; 
		border-radius: 5px; 
		text-align: left;
	}

</style>

</head>

<body>

	<div class="header">
		<h2>Products Creation</h2>
	</div>


	<form  id="product" method="post" action="product.php" >

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
