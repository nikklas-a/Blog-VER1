<?php require_once('../../config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public.php') ?>
<?php require_once( ROOT_PATH . '/php/user/includes/author_functions.php') ?>

<?php 

	$aboutText = getAboutText('aboutBody');
    $blogTitle = getAboutText('aboutTitle');
	$posts = getAllPosts();

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


    <a href="#settings">Settings</a> &nbsp; | &nbsp;
    <a href="#posts">Manage Posts</a> &nbsp; | &nbsp;
    <br><br>
    <h1> Settings </h1>

    <p id="settings"></p>

    <h3> General settings </h3>

    <br><br>

    <table> 
        <form method="post" action="">
            <tbody>
                <tr>    
                    <td>Blog Name: </td>
                    
                    <td><b><?php echo $blogTitle['title']; ?></td></b>
                    <td>
                    <input typ="text" name="make_blog_title" value="" placeholder="New blog name">
                    </td>
                    <td>
                
                    <button type="submit" class="btn" name="update_blog_name_btn">Update blog name</button>
                
                    </td>
                </tr>        

            </tbody>
        </form>       
    </table>

    <h2> About </h2>

    <div class="action create-post-div">
        
            <form method="post" enctype="multipart/form-data" action="">

                <input type="hidden" name="about" value="<?php echo $blog_id; ?>">
                            
                <textarea name="blogBody" id="about" cols="30" rows="10"><?php echo html_entity_decode($aboutText['body']); ?>	</textarea>
                
                <br><br>

                <button type="submit" class="btn" name="update_about_btn">Update</button>
            
                        
            </form>
    </div>

    <br><br>

    <h1> Manage posts </h1>
    <p id="posts"></p>
    <?php if (empty($posts)): ?>
                    <h2>No posts in the database.</h2>
                <?php else: ?>
                    <table class="table">
                            <thead>
                            <th style="text-align:left">Post #</th>
                            <th style="text-align:left">Post ID</td>
                            <th style="text-align:left">Date created</td>
                            <th style="text-align:left">Date updated</td>
                            <th style="text-align:left">Title</th>
                            <th style="text-align:left">Published</th>
                            <th style="text-align:left">Views</th>
                            <th colspan = "3"> Action </th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </thead>
                        
                        <tbody>
                        

                    <?php foreach ($posts as $key => $post): ?>
                            <tr>
                                <td><?php echo $key + 1; ?></td>
                                <td><?php echo $post['id']; ?></td>
                                <td><?php echo $post['created_at']; ?></td>
                                <td><?php echo $post['updated_at']; ?></td>
                                

                            
                                <td>
                                    <a 	target="_blank"
                                    href="<?php echo '/php/user/post.php?user=' . $post['user_name'] . '&' . 'post-link=' . $post['link'] ?>">
                                        <?php echo $post['title']; ?>	
                                    </a>
                                </td>
                                <td>
                                    
                                <?php if ($post['published'] == true): ?>
                                    Yes
                                    <?php else: ?>
                                    No
                                    <?php endif ?>

                                </td>
                                
                                <td>
                                <?php echo $post['views']; ?>				
                                    </td>

                                
                                <td>
                                    <a href="editor.php?publish-post=<?php echo $post['id'] ?>">

                                        <button type="submit" class="btn" name="publish-post"> 

                                        <?php if ($post['published'] == true): ?>

                                            Unpublish

                                            <?php else: ?>

                                            Publish

                                            <?php endif ?>

                                        </button>
                                    </a>

                                </td>
                                    
                                <td>
                                <a href="edit_post.php?edit-post=<?php echo $post['id'] ?>"> <button type="submit" class="btn" name="edit-post">Edit</button> </a>
                                
                            
                                </td>
                            
                                <td>
                                <a href="editor.php?delete-post=<?php echo $post['id'] ?>"> <button type="submit" class="btn" name="delete-post">Delete</button> </a>
                                </td>

                            </tr>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                <?php endif ?>
            </div>
        </div>


    <script>
        ClassicEditor
            .create( document.querySelector( '#about' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>


    </main>
    </body>
</html>



