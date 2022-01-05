<?php require_once('../../config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public.php') ?>

<?php 

	$aboutText = getAboutText('aboutBody');
	
 ?>

<html>

	<link rel="stylesheet" type="text/css" href="/css/main.css">
	
<script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous">
</script>

<script src="./js/darkmode.js"></script>

<div class="container">

	<header>

		<div class="headerdiv">		

		<div id="header">	

			<?php 

			if($_SESSION['loggedIn']){

				include( ROOT_PATH . '/php/user/includes/header.php');

			} else {

				include( ROOT_PATH . '/php/user/includes/header_publ.php');

			}

			?>

		</div>

	</header>

	<script>
		var app = document.getElementsByTagName("BODY")[0];
		if (localStorage.lightMode == "dark") {
			app.setAttribute("data-light-mode", "dark");
		}
	</script>

	<div class="maintext">

	<body>
		<main>
			<h1>About <?php //echo($aboutText['blogtitle']); ?> </h1>

			<?php echo html_entity_decode($aboutText['body']); ?>	
			
			<br>

			<div id="footer"><?php include( ROOT_PATH . '/includes/footer.php'); ?></div>

		</main>
	</body>
</html>
