<?php require_once('../../config.php') ?>


<html>

	<link rel="stylesheet" type="text/css" href="/css/main.css">
	
	<?php include "globaltext.php"; ?>

<script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous">
</script>

<script src="./js/darkmode.js"></script>

<header>

<?php 

if($_SESSION['loggedIn']){

	include( ROOT_PATH . '/php/user/includes/header.php');


} else {

	include( ROOT_PATH . '/php/user/includes/header_publ.php');

}

?>

</header>

<body>

<main>

	<h1>Contact</h1>

		<h2> E-mail </h2>
            <br>
            <?php echo $user_email ?>
            username@arvidsson.xyz

        <h2> Instagram </h2>
            <br>   
            [instagramlink]
            
        <h2> Twitter </h2>
            <br>
            [Twitterlink]

            <br>
                <br>
                    <br>

	<div id="footer"><?php include( ROOT_PATH . '/includes/footer.php'); ?></div>

	</main>

	
  </body>
</html>
