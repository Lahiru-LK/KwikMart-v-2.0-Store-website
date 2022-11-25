<?php session_start(); ?>

<?php
	if(!isset($_SESSION['user_id'])){
		header('Location: logging.php');
	}
?>


<!-- Header Section -->
<?php
@include 'header.php';
?>

<html>
	<head>
		
		

		<style>
			.proside.td{
				padding: 20px;
			}
		</style>

	</head>
	<body>
		<div class="main">
			<div class="userpic">
				<img src="./images/profile_image/user.png" alt="user image">
					
					<?php
						include 'config.php';

						$cus = mysqli_query($conn,"SELECT * FROM customer WHERE cus_id={$_SESSION['user_id']}");

						while($row = mysqli_fetch_assoc($cus)){
							echo "<table class='profile_table'>";
							echo "<tr>";
							echo "<td colspan='3'><h1 class='profile_h1'>".$row['name']."</h1></td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td>ADDRESS<td>";
							echo " : ";
							echo "<td>".$row['address']."<td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td>CONTACT<td>";
							echo " : ";
							echo "<td>".$row['contact']."<td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td>BIRTHDAY<td>";
							echo " : ";
							echo "<td>".$row['dob']."<td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td>EMAIL<td>";
							echo " : ";
							echo "<td>".$row['uname']."<td>";
							echo "</tr>";
							echo "</table>";
						}
					?>
			</div>
		</div>		
	</body>
</html>


<!-- Footer Section -->
<?php
@include 'footer.php';
?>
