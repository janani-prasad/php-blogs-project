<?php
	session_start();
	#DB conn
	include_once("config.php");
	if (isset($_POST['login_btn'])) {
	    $username = mysqli_real_escape_string($conn, $_POST["username"]);
		$password = mysqli_real_escape_string($conn, $_POST["password"]);
		$password = md5($password); //hash password for security purpose
		$sql = "SELECT * FROM `users` WHERE username = '".$_POST['username']."' AND password = '".$_POST['password']."'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) == 1) {
			$_SESSION['message'] = "You are logged in";
			$_SESSION['username'] = $username;
			header("location: home.php"); //to redirect to home page

		}
		else {
			$_SESSION['message'] = "The username or password is incorrect";

		}
		
	}
	
?>

<!DOCTYPE html>
<html lang="en">
	<?php include 'header-scripts.php'; ?>
    <body>		
		<div id="wrapper" class="container">
						
			<section class="header_text sub">
			<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
				<h4><span>Login</span></h4>
			</section>			
			<section class="main-content">				
				<div class="row">
					<div class="span5">					
						<h4 class="title"><span class="text"><strong>Login</strong> Form</span></h4>
						<form action="#" method="post">
							<input type="hidden" name="next" value="/">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Username</label>
									<div class="controls">
										<input type="text" placeholder="Enter your username" id="username" class="input-xlarge" name="username">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Username</label>
									<div class="controls">
										<input type="password" placeholder="Enter your password" id="password" class="input-xlarge" name="password">
									</div>
								</div>
								<div class="control-group">
									<input tabindex="3" class="btn btn-inverse large" type="submit" value="Sign into your account" name="login_btn">
									<hr>
									<?php
										if (isset($_SESSION['message'])){
											echo "<span>" .$_SESSION['message']. "</span>";
											unset($_SESSION['message']);

										} 
									?>
									<!-- <p class="reset">Recover your <a tabindex="4" href="#" title="Recover your username or password">username or password</a></p> -->
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