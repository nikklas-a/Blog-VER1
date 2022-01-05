<?php 

$username = "";
$email = "";

$postTitle = "";
$postLink = "";
$postBody = "";
$errors = array();

//Add post

if (isset($_POST['save_blog_entry_btn'])) {

	//hämta input från formuläret
    $postTitle = $_POST['postTitle'];
    
	//auto-create link/slug
	$postLink = makeLink($postTitle); 

	//image
	//$postImage = $_FILES['image']['name'];

	//$target = "../static/images/" . basename($featured_image);
	//  	if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target)) {
	  //		array_push($errors, "Failed to upload image. Please check file settings for your server");
	  //	}

    $saveSelect = $_POST['saveSelect'];
	$postBody = $_POST['postBody'];
	$userID = $_SESSION['user']['id'];
	$userName = strtolower($_SESSION['user']['username']);
   
	//säkertställ att formuläret är korrekt ifyllt
   if (empty($postTitle))  { 
        array_push($errors, "Title missing");
    }
    
   if (empty($postBody))  { 
		array_push($errors, "You should probaly write something."); 
		}

	if (count($errors) == 0) {
			
		$query = "INSERT INTO posts (user_id, title, link, image, body, published, created_at, updated_at, user_name) VALUES ('$userID', '$postTitle', '$postLink', 'test.jpg', '$postBody', '1', now(), now(), '$userName');";

		mysqli_query($conn, $query);
	
		header('Location: editor.php#posts');	

		}
	}

if (isset($_POST['update_about_btn'])) {

	$blogBody = $_POST['blogBody'];
	$userID = $_SESSION['user']['id'];
	$userName = strtolower($_SESSION['user']['username']);
	
	$query = "UPDATE blogs SET body = '$blogBody' WHERE user_id = $userID;";

	mysqli_query($conn, $query);

	}

if (isset($_POST['update_blog_name_btn'])) {

	$blogTitle = $_POST['make_blog_title'];
	$userID = $_SESSION['user']['id'];
	$userName = strtolower($_SESSION['user']['username']);
	
	$query = "UPDATE blogs SET title = '$blogTitle' WHERE user_id = $userID;";

	mysqli_query($conn, $query);

	}

//Delete post
if (isset($_GET['delete-post'])) {

	$post_id = $_GET['delete-post'];
	
	$query = "DELETE FROM posts WHERE id='$post_id';";
		
	mysqli_query($conn, $query);
}

if (isset($_GET['publish-post'])) {

	$post_id = $_GET['publish-post'];

	$sql = "SELECT published FROM posts WHERE id=$post_id;";

	$result = mysqli_query($conn, $sql);

	$publishedStatus = mysqli_fetch_array($result);
	
	if ($publishedStatus['published'] == 1) {

		$query = "UPDATE posts SET published='0' WHERE id = $post_id;";
		mysqli_query($conn, $query);
		
	} else {

		$query = "UPDATE posts SET published='1' WHERE id = $post_id;";
		mysqli_query($conn, $query);
	}
}

//Edit post
if (isset($_POST['update_post_btn'])) {

	$post_id = $_GET['edit-post'];
	$postBody = $_POST['postText'];
	$userID = $_SESSION['user']['id'];
	
	$query = "UPDATE posts SET body = '$postBody' WHERE id='$post_id' AND user_id='$userID';";

	$userName = strtolower($_SESSION['user']['username']);
	
	mysqli_query($conn, $query);

	}

function getPostToEdit($link) {

	global $conn;
	
		$user_id = $_SESSION['user']['id'];
		$post_id = $_GET['edit-post'];

		$sql = "SELECT * FROM posts WHERE user_id=$user_id AND id=$post_id";
		
		$result = mysqli_query($conn, $sql);

		$editPost = mysqli_fetch_assoc($result);

		return $editPost;
}

function getAllPosts()
{
	global $conn;
	
    $_SESSION['user']['role'] == "Author"; {
		$user_id = $_SESSION['user']['id'] ;
		$sql = "SELECT * FROM posts WHERE user_id=$user_id";
	
        $result = mysqli_query($conn, $sql);
        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    	return $posts;
}

function getPostAuthorById($user_id)
{
	global $conn;
	$sql = "SELECT username FROM users WHERE id=$user_id";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		// return username
		return mysqli_fetch_assoc($result)['username'];
	} else {
		return null;
	}
}

function esc(String $value) 
{	
    global $conn;

    $val = trim($value); 
    $val = mysqli_real_escape_string($conn, $value);

    return $val;
	}

}

function makeLink(String $string){

	$string = strtolower($string);
	$link = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
	return $link;
	
}



?>