<?php

$user_id = 0;
$editUser = false;
$deleteUser = false;
$username = "";
$role = "";
$email = "";

$errors = [];

//Admin functions

//Delete user
if (isset($_GET['delete-user'])) {

    $user_id = $_GET['delete-user'];
    
    $query = "DELETE FROM users WHERE id = $user_id;";
        
    mysqli_query($conn, $query);
}
/*
//Edit username !!! Not possible any more.
if (isset($_POST['edit_username_btn'])) {

    $user_id = $_GET['edit-user'];
    $updateUsername = $_POST['update_user_name'];
        
    $query = "UPDATE users SET username='$updateUsername' WHERE id = $user_id;";
    $editUser = mysqli_fetch_assoc($result);
    mysqli_query($conn, $query);
}
*/
//Edit user email
if (isset($_POST['edit_useremail_btn'])) {
    $user_id = $_GET['edit-user'];
    $updateEmail = $_POST['update_user_email'];
    $query = "UPDATE users SET email = '$updateEmail' WHERE id = $user_id;";
    $editUser = mysqli_fetch_assoc($result);
    mysqli_query($conn, $query);
}

//Edit user role
if (isset($_POST['edit_userrole_btn'])) {
    $user_id = $_GET['edit-user'];
    $updateRole = $_POST['roleSelect'];      
    $query = "UPDATE users SET role='$updateRole' WHERE id = $user_id;";
    $editUser = mysqli_fetch_assoc($result);
    mysqli_query($conn, $query);
}


function visaUser(){
    global $conn, $roles;
    $user_id = $_GET['edit-user'];
    $sql = "SELECT * FROM users WHERE id='$user_id'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $user;
}

function getUsers(){
	global $conn, $roles;
	$sql = "SELECT * FROM users";
	$result = mysqli_query($conn, $sql);
	$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $users;
}

function countUsers(){
    global $conn;
    $sql = "SELECT COUNT(*) as total FROM users";
    $result = mysqli_query($conn, $sql);
    $userCount = mysqli_fetch_assoc($result);
    return $userCount;
}

function countPosts(){
    global $conn;
    $sql = "SELECT COUNT(*) as total FROM posts";
    $result = mysqli_query($conn, $sql);
    $postCount = mysqli_fetch_assoc($result);
    return $postCount;
}

function esc(String $value){
	global $conn;
	$val = trim($value); 
	$val = mysqli_real_escape_string($conn, $value);
	return $val;
}

function makeSlug(String $string){
	$string = strtolower($string);
	$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
	return $slug;
}

?>