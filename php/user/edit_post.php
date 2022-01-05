<?php require_once('../../config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public.php') ?>
<?php require_once( ROOT_PATH . '/php/user/includes/author_functions.php') ?>

<?php 

$post = getPostToEdit($editPost); 

?>

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

    <title> Editor </title>

    
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
        padding-right: 10px;
        }
    </style>

    <body>


    <main>

            <div class="maintext">
                <h1> Edit Posts </h1>
                <div class="action edit-post-div">
                    
                        <form method="post" enctype="multipart/form-data" action="">

                            <input type="hidden" name="edit_post" value="<?php echo $post['id']; ?>">
                                        
                            <textarea name="postText" id="edit_post" cols="30" rows="10"><?php echo html_entity_decode($post['body']); ?>	</textarea>
                            
                            <br><br>

                            <button type="submit" class="btn" name="update_post_btn">Update</button>
                            
                        </form>
                </div>

                        <br>
                            <br>
                                <br>
                            <br>
                        <br>

                <script>
                    ClassicEditor
                        .create( document.querySelector( '#edit_post' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>
            </div>
        </main>
    </body>
</html>



