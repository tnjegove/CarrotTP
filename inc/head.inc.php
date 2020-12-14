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
	<link rel="stylesheet" href="css/stylesheet.css?rnd=132">

    <title>FoodFind</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src=./js/btn_signin.js></script>
  </head>
  <body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">FoodFind</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a href="#" id="btn_search-recipe" class="nav-link" >Search recipes <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a href="#" id="btn_write-recipe" class="nav-link" >Write a recipe</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Dropdown
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Action</a>
						<a class="dropdown-item" href="#">Another action</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Something else here</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
				</li>
			</ul>
			
			<ul class='navbar-nav navbar-right'>
				<?php
					if(!isset($_SESSION['login'])) { 
						echo "
							<li class='nav-item '><button id='btn_signin' class='btn btn-outline-success my-2 my-sm-0' type='submit'><i class='fas fa-sign-in-alt'></i> Sign in</button></li>
							<li class='nav-item'>&nbsp&nbsp&nbsp</li>
							<li class='nav-item '><button id='btn_register' class='btn btn-outline-success my-2 my-sm-0' type='submit'><i class='fas fa-user-plus'></i> Register</button></li>
						";}
					else {
						echo "
							<li class='nav-item'><p class='nav-link'>Welcome back, ".$_SESSION['login']."!</p> </li>
							<li class='nav-item'>&nbsp&nbsp&nbsp</li>
							<li class='nav-item '><a href='inc/signout.php'><button id='btn_signout' class='btn btn-outline-success my-2 my-sm-0' type='submit'><i class='fas fa-sign-out-alt'></i> Sign out</button></a></li>
						
						";}
				?>
			</ul>
		</div>
	</nav>