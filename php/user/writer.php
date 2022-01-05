<?php require_once('../../config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public.php') ?>
<?php require_once( ROOT_PATH . '/php/user/includes/author_functions.php') ?>

<?php $posts = getAllPosts(); ?>

<?php if($_SESSION['loggedIn']){

} else {

header('Location: /php/login.php');  

} ?>

<html>

	<link rel="stylesheet" type="text/css" href="/css/main.css">

<script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous">
</script>

<script src="/js/darkmode.js"></script>

<title> Writer </title>


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

<style>
        th, td {
        padding-top: 5px;
        padding-bottom: 5px;
        padding-left: 0px;
        padding-right: 25px;
        }
    </style>

<body>


<div class="maintext">

<main>

<h1> Writer </h1>

<h2> Title </h2>


<div class="container">


<table class="table">

  <form method="post" action="">

  <?php include(ROOT_PATH . '/includes/error.php') ?>
		
  <tbody>
    <tr>
      <td>
        <input typ="text" name="postTitle" value="" placeholder="Post Title">
      </td>
    </tr>
    <tr>
      <td>
  
      </td>
    </tr>
  </tbody>
</table>       

<h2> Text </h2>

           <input type="hidden" name="postwriter" value="">
                        
            <textarea name="postBody" id="postwriter" cols="30" rows="10"></textarea>
            
            <br>

            <button type="submit" class="btn" name="save_blog_entry_btn">Save</button>
            
        </form>
</div>

<br>

      <script>
          ClassicEditor
              .create( document.querySelector( '#postwriter' ) )
              .catch( error => {
                  console.error( error );
              } );
      </script>


    </main>
  </body>
</html>