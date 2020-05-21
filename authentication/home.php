<?php
session_start();

include_once("bconfig.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM blogs ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
	<?php include 'header-scripts.php'; ?>
	<style>
#blogs {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#blogs td, #blogs th {
  border: 1px solid #ddd;
  padding: 8px;
}

#blogs tr:nth-child(even){background-color: #f2f2f2;}

#blogs tr:hover {background-color: #ddd;}

#blogs th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
.navbar-inner.main-menu {	
	height: 50px;
	padding-left:5px;
	padding-top:10px;	
	padding-right:0;	
	border-right: 0;
	border-left: 0;
	border-top: 0;
	border-bottom:5px solid #eb4800;
	-webkit-border-radius: 0;
	-moz-border-radius: 0;	
	border-radius: 0;
	filter: none;	
}
</style>
    <body>		
		
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="index.html" class="logo pull-left"><img src="themes/images/blog-logo.png" class="site_logo logo-style" style="height:40px;" alt=""></a>
					<nav id="menu" class="pull-right">
						<ul>
							<li><a href="./products.html">Category</a>					
								<ul>
									<li><a href="./products.html">Travel Blogs</a></li>			
									<li><a href="./products.html">Festival Blogs</a></li>
									<li><a href="./products.html">Seminar Experiences</a></li>	
								</ul>
							</li>															
							<li><a href="./products.html">Popular Blogs</a></li>			
							<li><a href="./products.html">Best Seller</a></li>
							<li><a href="./products.html">Top Seller</a></li>
							<li><a href="#">My Account</a></li>				
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</nav>
				</div>
			</section>
			<section  class="homepage-slider" id="home-slider">
				<div class="flexslider">
					<ul class="slides">
						<li>
							<img src="themes/images/carousel/ban-3.jpg" alt="" />
						</li>
						<li>
							<img src="themes/images/carousel/ban-4.jpg" alt="" />
						</li>
						<li>
							<img src="themes/images/carousel/ban-5.jpg" alt="" />
						</li>
					</ul>
				</div>			
			</section>
			<?php
				if (isset($_SESSION['message'])){
					echo "<span>" .$_SESSION['message']. "</span>";
					unset($_SESSION['message']);

				} 
			?>
			<section class="header_text">
				<h2>Welcome home <?php echo $_SESSION['username']; ?></h2>
				Here you can find the blogs that you have created so far. Feel free to add more!!
			</section>

			<a href="add.php" style="font-size: 16px;">Add New Blog</a><br/><br/>
			<table width='80%' border=1 id="blogs">

		    <tr>
		        <th>Title</th> <th>Email</th> <th>Content</th> <th>Update</th>
		    </tr>
		    <?php  
		    while($user_data = mysqli_fetch_array($result)) {         
		        echo "<tr>";
		        echo "<td>".$user_data['title']."</td>";
		        echo "<td>".$user_data['email']."</td>";
		        echo "<td>".$user_data['content']."</td>";    
		        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
		    }
		    ?>
		    </table>
			
			<?php include 'footer.php'; ?>
		</div>
		<script src="themes/js/common.js"></script>
		<script src="themes/js/jquery.flexslider-min.js"></script>
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>
    </body>
</html>