<?php
	session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/d744bf4268.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/stylesheet.css">

    <title>FoodFind</title>
  </head>
  <body>
    <div class="wrapper fadeInDown">
		<?php
		if(!isset($_SESSION['login'])) {
			echo
		"<div id='formContent'>
		<!-- Tabs Titles -->

		<!-- Icon -->
		<div class='fadeIn first'>
			<i class='fas fa-carrot fa-3x'></i>
		</div>

		<!-- Login Form -->
		<form action='inc/login.php' method='POST'>
			<input type='text' id='login' class='fadeIn second' name='login' placeholder='login' required>
			<input type='password' id='user_pass' class='fadeIn third' name='user_pass' placeholder='password' required>
			<input type='submit' class='fadeIn fourth' value='Log In'>
		</form>

		<!-- Create account -->
		<div id='formFooter'>
			<a class='underlineHover' href='createacc.php'>Create account</a>
		</div>

		</div>";}
		else {
			echo '<p>Welcome back, '.$_SESSION['login'].'!</p>
			<form action="inc/signout.php">
				<input type="submit" class="fadeIn fourth" value="Log out">
			</form>
			';
			
		}
		?>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>