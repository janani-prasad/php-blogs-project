<?php
	session_start();
	#DB conn
	include_once("config.php");
	if (isset($_POST['register_btn'])) {
	    $username = mysqli_real_escape_string($conn, $_POST["username"]);
		$email = mysqli_real_escape_string($conn, $_POST["email"]);
		$password = mysqli_real_escape_string($conn, $_POST["password"]);
		$password2 = mysqli_real_escape_string($conn, $_POST["password2"]);
		if($password == $password2) {
			$password = md5($password); //hash password for security purpose
			$sql = "INSERT INTO `users` (`username`, `email`, `password`) VALUES ('".$_POST['username']."', '".$_POST['email']."', '".$_POST['password']."')";
			mysqli_query($conn, $sql);
			if(!$sql){
			   echo "Error: " . mysqli_error($conn);
			}
			$_SESSION['message'] = "You are logged in";
			$_SESSION['username'] = $username;
			header("location: home.php"); //to redirect to home page
		}
		else {
			$_SESSION['message'] = "The passwords do not match";
		}
	}
	// elseif($conn) {
	// 	echo "Connected successfully";
	// }

?>


<!DOCTYPE html>
<html lang="en">
	<?php include 'header-scripts.php'; ?>
    <body>		
		<div id="wrapper" class="container">
						
			<section class="header_text sub">
			<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
				<h4><span>Regsiter</span></h4>
			</section>			
			<section class="main-content">				
				<div class="row">
					
					<div class="span7">					
						<h4 class="title"><span class="text"><strong>Register</strong> Form</span></h4>
						<?php
										if (isset($_SESSION['message'])){
											echo "<span>" .$_SESSION['message']. "</span>";
											unset($_SESSION['message']);

										} 
						?>
						<form action="register.php" method="post" class="form-stacked">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Username</label>
									<div class="controls">
										<input type="text" placeholder="Enter your username" class="input-xlarge" name="username" required>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Email address:</label>
									<div class="controls">
										<input type="email" placeholder="Enter your email" class="input-xlarge" name="email" required>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Password:</label>
									<div class="controls">
										<input type="password" placeholder="Enter your password" class="input-xlarge" name="password" required>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Confirm Password:</label>
									<div class="controls">
										<input type="password" placeholder="ReEnter your password" class="input-xlarge" name="password2" required>
									</div>
								</div>							                            
								<div class="control-group">
									<p>Now that we know who you are. I'm not a mistake! In a comic, you know how you can tell who the arch-villain's going to be?</p>
								</div>
								<hr>
								<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" name="register_btn" value="Register"></div>
							</fieldset>
						</form>					
					</div>				
				</div>
			</section>			
			<?php include 'footer.php'; ?>
		</div>		
    </body>
</html>