
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
			<div class="sidebar">

				<?php include( ROOT_PATH . '/php/user/includes/sidebar.php'); ?>
			
			</div>

			<div class="maintext">

		
			
			<h1> Feed </h1>

				<hr>

				<?php foreach ($posts as $post): ?>
				
					<div class="post" style="margin-left: 0px;">
						
							<div class="post_info">
				
								<h3><?php echo $post['title'] ?></h3>
								<p><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></p>
								<p>		<?php 
											//Cut the posts in length on the feed-page. 
											$fullpost = $post['body']; 
											$choppedpost = substr($fullpost, 0, rand(250, 500));

											echo $choppedpost; ?>
								</p>
								<a href="post.php?user=<?php echo $post['user_name']?>&post-link=<?php echo $post['link']; ?>">More... </a>
							</div>
					</div>

					<hr>

				<?php endforeach ?>
		
			<div id="footer" style="padding-top: 150px; padding-bottom: 150px">
				<?php include( ROOT_PATH . '/includes/footer.php'); ?>
			</div>
		</body>
	</div>
</html>
