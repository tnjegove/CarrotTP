			<?php
				if(ISSET($_REQUEST['email'])){
					$email = $_REQUEST['email'];
			?>
				<center><h4>The email that you provided is verified.</h4></center>
				<h5>You may now login to your account <a href="login.php?email=<?php echo $email?>">here</a></h5>
				<h5>Thank You For Using Food Find!,</h5>
				
			<?php
				
				}
			?>