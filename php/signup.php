<?php require_once('../config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public.php') ?>
<?php include( ROOT_PATH . '/includes/auth.php') ?>

<?php $posts = getPosts(); ?>



<html>
	<link rel="stylesheet" type="text/css" href=".././css/main.css">
	
	<?php include "globaltext.php"; ?>

<script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous">
</script>

<script src="../js/darkmode.js"></script>


<header>

<div class="headerdiv">	

	<div id="header"><?php include( ROOT_PATH . '/includes/indexheader.php'); ?></div>
</div>
</header>

<title> | <?php echo $blognamn ?> </title>

	<body>

	<div class="maintext">

		<main>

		<h1>Sign up</h1>

		<div class="container">

			<?php include(ROOT_PATH . '/includes/error.php') ?>
		
			<form method="post" action="signup.php">
			<div>
				<input typ="text" name="username" value="<?php echo $username; ?>" placeholder="username">
			<div><br>
				<input type="email" name="email" value="<?php echo $email; ?>" placeholder="email">
			<div><br>
				<input type="password" name="password" placeholder="password"> 
			<div><br>
				<input type="password" name="password_confirmation" placeholder="password confirmation">
			<div><br>
				<button type="submit" class="btn" name="reg_user">Register</button>
			
				</div>
			</div>
		</div>
	</div>
</div>
</div>

			<p>	or <a href="login.php">login</a> </p>
			
			</form>
	
		
	
			<div id="footer" style="padding-top: 150px"><?php include( ROOT_PATH . '/includes/footer.php'); ?></div>

	</main>

	
  </body>
</html>
