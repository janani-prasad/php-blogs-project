<!DOCTYPE html>
<html lang="en">
<?php include 'header-scripts.php'; ?>

<body>
	<div id="wrapper" class="container">
	<section class="header_text sub">
		<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
		<h4><span>Add Blog</span></h4>
	</section>
	<br/><br/>
	<a href="home.php">Home</a>
	<br/><br/>

	<section class="main-content">				
	<div class="row">
		<div class="span5">					
			<h4 class="title"><span class="text"><strong>Blog</strong> Form</span></h4>
			<form action="add.php" method="post" name="form1">
				<input type="hidden" name="next" value="/">
				<fieldset>
					<div class="control-group">
						<label class="control-label">Title</label>
						<div class="controls">
							<input type="text" placeholder="Enter the title" id="title" class="input-xlarge" name="title">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Email</label>
						<div class="controls">
							<input type="text" placeholder="Enter the email" id="email" class="input-xlarge" name="email">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Content</label>
						<div class="controls">
							<textarea id="content" class="input-xlarge" name="content" rows="4" cols="50"></textarea>
						</div>
					</div>
					<div class="control-group">
						<input tabindex="3" class="btn btn-inverse large" type="submit" value="Add the blog" name="Submit">
						<hr>
					</div>
				</fieldset>
			</form>				
		</div>
						
	</div>
</section>			
	
	<?php

	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$name = $_POST['title'];
		$email = $_POST['email'];
		$mobile = $_POST['content'];
		
		// include database connection file
		include_once("bconfig.php");
				
		// Insert user data into table
		$result = mysqli_query($mysqli, "INSERT INTO `blogs` (`title`, `email`, `content`) VALUES('".$_POST['title']."', '".$_POST['email']."', '".$_POST['content']."')");
		
		// Show message when user added
		echo "Blog added successfully. <a href='home.php'>View Blogs</a>";
	}
	?>
	<?php include 'footer.php'; ?>
</div>
</body>
</html>
