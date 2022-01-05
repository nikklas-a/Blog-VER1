<hr>

<div id="footer" style="display: flex; justify-content: flex-end; padding: 5px;">

<?php if($_SESSION['loggedIn']){ ?>

	<?php } else { ?>
		<a href="/php/login.php">Log in</a> &nbsp; | &nbsp;
		<a href="/php/signup.php">Sign up</a>
	<?php } ?>	

	&nbsp; | &nbsp;

	<a href="/">BlogVer-1</a>

</div>

