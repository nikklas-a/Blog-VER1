<?php require_once('../../config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public.php') ?>
<?php require_once( ROOT_PATH . '/php/user/includes/author_functions.php') ?>

<?php 
	if (isset($_GET['post-link'])) {
		$post = visaPost($_GET['post-link']);
	}

	if (isset($_GET['user'])) {
		$post = visaPost($_GET['user']);
	}
	
?>


<html>

	<link rel="stylesheet" type="text/css" href="/css/main.css">

<script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous">
</script>

<script src="/js/darkmode.js"></script>


	
<title> <?php echo $post['title'] ?> | <?php echo $blognamn ?> </title>

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

	<body>

		<div class="maintext">

	<main>

	<h1><?php echo $post['title'] ?></h1>
	
	<postdate> <?php echo date("F j, Y ", strtotime($post["created_at"])); ?></postdate>
		
	<br><br>
		
	<?php echo html_entity_decode($post['body']); ?>
	
	</main>
  </body>
</html>



