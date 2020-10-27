			<?php
				if(ISSET($_REQUEST['firstname']) && ISSET($_REQUEST['lastname']) && ISSET($_REQUEST['email'])){
			?>
				<h3><strong>You're ready to go!</strong></h3>
				<br />
				<h5>Hi, <?php echo $_REQUEST['firstname']." ".$_REQUEST['lastname']?><h5>
				<h5>We sent you a confirmation to your email account, Please click to link in your email.<h5>
				<a class="btn btn-primary" href="https://<?php echo $_REQUEST['email']?>" target="_blank">Confirm Email</a>
			<?php
				}
			?>
