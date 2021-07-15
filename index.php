<?php 
$_SESSION['username'] = "admin";
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Portfolio</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<section>
		<nav>
		<a href="index.php" class="logo">Waliullah Dhalet</a>
			<ul>
				<li><a href="Portfolio/index.html" class="active">Portfolio</a></li>
				<li><a href="">Contact Me</a></li>
			</ul>
		</nav>

		<div>
			<h2>Gallery</h2>

			<div class="gallery-container">
				<?php
				include_once 'includes/dbh.inc.php';
				$sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					echo "SQL statement failed!";
					  
				} else {
					mysqli_stmt_execute($stmt);
					$result = mysqli_stmt_get_result($stmt);
					while ($row = mysqli_fetch_assoc($result)) {
					
				echo '	<a target="_self" href="img/gallery/'.$row["imageFullNameGallery"].'">
						<div style="background-image: url(img/gallery/'.$row["imageFullNameGallery"].');"></div>
						<h3>'.$row["titleGallery"].'</h3>
						<p>'.$row["descGallery"].'</p>
					</a>';
					}
				}


				?>		

			</div>

		<?php  
		if (isset($_SESSION['username']))
		{
			echo '<div class="gallery-upload">
			<center>
			 	<form action="includes/gallery-upload.inc.php" method="post" enctype="multipart/form-data">
			 		<fieldset>
			 		<legend>Enter New Image:</legend>
					<input style="width:400px; height:30px" type="text"  name="filename" placeholder="File name..."></br></br>

					<input style="width:400px; height:30px" type="text" name="filetitle" placeholder="Image title..."></br></br>			 		
					<input style="width:400px; height:30px" type="text" name="filedesc" placeholder="Image description..."></br></br>

					<input style="width:400px; height:30px" type="file" name="file" ></br></br>
					<button style="width:400px; height:30px" type="submit" name="submit">UPLOAD</button>	</br>
					</fieldset>	
			 	</form>
			 </center>
			 </div>';

		}
						
			 ?>
			 
		</div>
		
	</section>
</body>
</html>

