<?php

function getPosts() {
	
	global $conn;

    $userID = $_SESSION['user']['id'];

    $sql = "SELECT * FROM posts WHERE user_id='$userID' AND published=true ORDER BY created_at DESC;";
    
    $result = mysqli_query($conn, $sql);

	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	return $posts;
    
    }

function getUserPosts() {

    global $conn;
    
    $req_uri = $_SERVER['REQUEST_URI'];
    $path = substr($req_uri,0,strrpos($req_uri,'/'));
    
    $userName = str_replace('/users/', "", $path);
    
    $sql = "SELECT * FROM posts WHERE user_name='$userName' AND published=true ORDER BY created_at DESC;";
    
    $result = mysqli_query($conn, $sql);

    $userposts = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $userposts;
    
    }
    

function visaPost($link) {

    global $conn;

    $post_link = $_GET['post-link'];
    $post_link_user = $_GET['user'];

    $sql = "SELECT * FROM posts WHERE link='$post_link' AND published=true AND user_name='$post_link_user'";

    $result = mysqli_query($conn, $sql);

    $post = mysqli_fetch_assoc($result);

    return $post;

    }


function getAboutTextPublic($link) {

    global $conn;
    
    $req_uri = $_SERVER['REQUEST_URI'];
    $path = substr($req_uri,0,strrpos($req_uri,'/'));
    
    $userName = str_replace("/users/", "", $path);
    


    $sql = "SELECT * FROM blogs WHERE user_name='$userName'";
    
    $result = mysqli_query($conn, $sql);

    $aboutText = mysqli_fetch_assoc($result);

    return $aboutText;

    }

function getBlogTitlePublicHeader($link) {

    global $conn;
    
    $userName = $_GET['user'];
    
    $sql = "SELECT * FROM blogs WHERE user_name='$userName'";
    
    $result = mysqli_query($conn, $sql);

    $aboutText = mysqli_fetch_assoc($result);

    return $aboutText;

    }

function getAboutText($link) {

    global $conn;
    
    $userName = $_SESSION['user']['username'];;
    
    $sql = "SELECT * FROM blogs WHERE user_name='$userName'";
    
    $result = mysqli_query($conn, $sql);

    $aboutText = mysqli_fetch_assoc($result);

    return $aboutText;

    }

function getIndexPath() {

    $userIndexPath = $_GET['user'];
    
    return $userIndexPath;

    }

function yearByYears() {

    global $conn;
    
    $req_uri = $_SERVER['REQUEST_URI'];
    $path = substr($req_uri,0,strrpos($req_uri,'/'));
    
    $userName = str_replace('/users/', "", $path);
    
    $sql = "SELECT count(*) as cnt, DATE(created_at) as created_year, link, user_name FROM posts WHERE user_name='$userName' AND published=true GROUP BY created_year;";
        
    $result = mysqli_query($conn, $sql);

    $yearByYears = mysqli_fetch_all($result, MYSQLI_ASSOC);

    return $yearByYears;
    
    }

?>

<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>


