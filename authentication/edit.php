<?php
// include database connection file
include_once("bconfig.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$title=$_POST['title'];
	$email=$_POST['email'];
	$content=$_POST['content'];
		
	// update user data
	$result = mysqli_query($mysqli, "UPDATE `blogs` SET `title`='".$_POST['title']."', `email`='".$_POST['email']."', `content`='".$_POST['content']."' WHERE id=$id");


	
	// Redirect to homepage to display updated user in list
	header("Location: home.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM blogs WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
	$title = $user_data['title'];
	$email = $user_data['email'];
	$content = $user_data['content'];
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'header-scripts.php'; ?>

<body>
	<div id="wrapper" class="container">
	<section class="header_text sub">
		<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
		<h4><span>Edit Blog</span></h4>
	</section>
	<br/><br/>
	<a href="home.php">Home</a>
	<br/><br/>
	
	<section class="main-content">				
	<div class="row">
		<div class="span5">					
			<h4 class="title"><span class="text"><strong>Blog</strong> Form</span></h4>
			<form name="update_user" method="post" action="edit.php">
				<input type="hidden" name="next" value="/">
				<fieldset>
					<div class="control-group">
						<label class="control-label">Title</label>
						<div class="controls">
							<input type="text" placeholder="Enter the title" id="title" class="input-xlarge" name="title" value=<?php echo $title;?>>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Email</label>
						<div class="controls">
							<input type="text" placeholder="Enter the email" id="email" class="input-xlarge" name="email" value=<?php echo $email;?>>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Content</label>
						<div class="controls">
							<input type="text" id="content" class="input-xlarge" name="content"  value=<?php echo $content;?>>
						</div>
					</div>
					<div class="control-group">
						<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
						<input tabindex="3" class="btn btn-inverse large" type="submit" value="Update the blog" name="update">
						<hr>
					</div>
				</fieldset>
			</form>				
		</div>
						
	</div>
</section>	
	<?php include 'footer.php'; ?>
</div>
</body>
</html>

