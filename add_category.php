<?php
	include('connect.inc.php');
?>

<?php
session_start();

if(!empty($_SESSION['users_first_name1']) && !empty($_SESSION['users_last_name1']) ){
	
	$users_first_name1 = $_SESSION['users_first_name1'];
	$users_last_name1  = $_SESSION['users_last_name1'];

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Add Category | Stock Management System</title>
		<link rel="stylesheet" href="css/bootstrap.css">
	</head>
	
	<body>
		<header class="container-foluid bg-success text-white p-2">
			<?php include('topmenu.php'); ?>
		</header>
		
		<div class="container-foluid">
			<div class="row">
				<div class="col-sm-3 bg-light border-right border-success pt-4 pr-0">
					<?php include('leftmenu.php');?>
				</div>
				<div class="col-sm-9">
					<div class="container p-5">
						<h3>Add a New Category</h3>
						<hr>
							<?php
								if(isset($_POST['category_name'])){
									$category_name 		  = $_POST['category_name'];
									$category_entry_date  = $_POST['category_entry_date'];
									
									$sql = "INSERT INTO category (category_name, category_entry_date)
										   VALUES ('$category_name', '$category_entry_date')";
									
									if($conn->query($sql) == TRUE){
										echo 'Record inserted!';
										header('location:list_of_category.php');
									}else{
										echo $sql. "".$conn->error;
									}
								}
							?>
							<form action="add_category.php" method="POST">
								Category Name : </br>
								<input type="text" name="category_name"></br></br>
								Entry Date : </br>
								<input type="date" name="category_entry_date"></br></br>
								<input type="submit" value="Submit" class="btn btn-success">
								<a href="list_of_category.php"><button type="button" class="btn btn-secondary">Cancel</button></a>
							</form>
					</div><!--end container -->
				</div><!--end col-sm-9 -->
			</div><!--row -->
			<div class="container-fould border-top border-success ">
				<p class="p-1 text-center">SMS - Stock Management System | Developed By : Nazmus Saud</p>
			</div>
		</div><!--end container-foluid-->
	</body>
</html>

<?php
}else{
	header("location:login.php");
}
?>