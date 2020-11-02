<?php
		include 'inc/head.inc.php';
	?>
  <body>
    <div class="wrapper fadeInDown">
		
		<div id='formContent'>
		<!-- Tabs Titles -->

		<!-- Icon -->
		<div class='fadeIn first'>
			<i class='fas fa-carrot fa-3x'></i>
		</div>

		<!-- Login Form -->
		<form action='inc/create_account.php' method='POST'>
			<input type='text' id='login' class='fadeIn second' name='login' placeholder='login' required>
			<input type='password' id='user_pass' class='fadeIn third' name='user_pass' placeholder='password' required>
			<input type='submit' class='fadeIn fourth' value='Create account'>
		</form>

		<!-- Create account -->
		<div id='formFooter'>
			<a class='underlineHover' href='index.php'>Sign in</a>
		</div>

		</div>
	</div>

    <?php
		include 'inc/footer.inc.php';
	?>