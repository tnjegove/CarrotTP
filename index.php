<?php
		include 'inc/head.inc.php';
	
		if(!isset($_SESSION['login'])) {
			echo
		"<div id='loginWindow' class='wrapper fadeInDown' style='display: none;'>
		<div id='formContent'>
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

		</div></div>
		<div id='registerWindow' class='wrapper fadeInDown' style='display: none;'>
		
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
	</div>";}
		/*else {
			echo '
			
			<p>Welcome back, '.$_SESSION['login'].'!</p>
			<form action="inc/signout.php">
				<input type="submit" class="fadeIn fourth" value="Log out">
			</form>
			
			';
			
		}*/
		?>
	
	
	<div class='container'>
	<div class='row carousel-holder'>
	<div class='col-md-12'>
	<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
			<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="./img/placeholder.png" class="d-block w-100" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h5>First slide label</h5>
					<p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img src="./img/placeholder.png" class="d-block w-100" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h5>Second slide label</h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img src="./img/placeholder.png" class="d-block w-100" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h5>Third slide label</h5>
					<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	</div>
	</div>
	<div class='col-lg-12' id='results'>
		<div class='row' id='white-space'>
		
		</div>
		<div class='row'>
			
				  
					<div class='col-lg-2'>
						<label for="formGroupExampleInput">Search recipes</label>
					</div>
					<div class='col-lg-8'>
						<input type="text" class="form-control" id="search-input" placeholder="Example input placeholder">
					</div>
					<div class='col-lg-2'>
						<button id='btn_search-recipes' class='btn btn-outline-success my-2 my-sm-0' type='button'>Search</button>
					</div>
				  
				  
				
		</div>
		<div class='row' id='white-space'>
		
		</div>
		<div  class='row'>
			<div class='mx-auto col-md-10'>
				<div class='row'>Recently searched</div>
				<div class='row'>
					<div class='col-md-12'>
						<div class='thumbnail'>Result 1</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-md-12'>
						<div class='thumbnail'>Result 2</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-md-12'>
						<div class='thumbnail'>Result 3</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>

    <?php
		include 'inc/footer.inc.php';
	?>