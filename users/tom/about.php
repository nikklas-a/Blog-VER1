
<?php require_once('../../config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public.php') ?>

<?php 

	$aboutText = getAboutTextPublic('aboutBody');
    $blogTitle = getAboutTextPublic('aboutTitle');
	
 ?>

	<?php 

		if($_SESSION['loggedIn']){

			$posts = getPosts();

		} else {

			$posts = getUserPosts();
			$blogTitle = getAboutText('aboutTitle');
			
	} ?>

<script>
		var app = document.getElementsByTagName("BODY")[0];
		if (localStorage.lightMode == "dark") {
			app.setAttribute("data-light-mode", "dark");
		}
</script>

<html>

	<link rel="stylesheet" type="text/css" href="/css/main.css">

	<script
		src="https://code.jquery.com/jquery-3.3.1.js"
		integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
		crossorigin="anonymous">
	</script>

	<script src="/js/darkmode.js"></script>

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
			</div>
		</header>
			
		<body>

				<div class="maintext">

					<h1>
						About

						<i>	
							<?php echo $aboutText['title']; ?>
						</i>
					</h1>

					<hr>
		
					<?php echo html_entity_decode($aboutText['body']); ?>			

					<div id="footer" style="padding-top: 150px">
						<?php include( ROOT_PATH . '/includes/footer.php'); ?>
					</div>
				</div>
		</body>
	</div>
</html>



