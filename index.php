<?php
		include 'inc/head.inc.php';
	?>
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

    <?php
		include 'inc/footer.inc.php';
	?>