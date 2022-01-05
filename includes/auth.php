<?php

$username = "";
$email = "";
$errors = array();

//Registrera användare

if (isset($_POST['reg_user'])) {

    //Get POST input
    $username = esc($_POST['username']);
    $email = esc($_POST['email']);
    $password = esc($_POST['password']);
    $password_confirmation = esc($_POST['password_confirmation']);

    //make sure everything is filled out 
    if (empty($username))  { 
        array_push($errors, "Username, please.");
    }
    
     if (empty($email))  { 
        array_push($errors, "Your email, please."); 
        }

    if (empty($password))  {
        array_push($errors, "Password, please."); 
    }
    
    if ($password != $password_confirmation) { 
        array_push($errors, "Passwords do not match."); 
    }

    //Chekc database for exsisting users

    $check_user_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";

    $result = mysqli_query($conn, $check_user_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {

         if ($user['username'] === $username) { 
    
            if ($user['username'] == "") {      

            array_push($errors, "");
    
            } else {

            array_push($errors, "User already exists"); 
    
        }

    }

        if ($user['email'] === $email) {
    
            array_push($errors, "Email already exists.");
        }

    }

    //If no errors > Log in user.

    if (count($errors) == 0) {

        $password = md5($password); //kryptera lösenord
        $query = "INSERT INTO users (username, email, role, password, created_at, updated_at) VALUES('$username', '$email', 'Author', '$password', now(), now())";
        

        mysqli_query($conn, $query);

        //User-id
        $reg_usr_id = mysqli_insert_id($conn);

        //User session
        $_SESSION['user'] = getUserById($reg_usr_id);

        $user_id_blogs = $_SESSION['user']['id'];
        $usernameblogs = strtolower($username);

        $queryDefaultBlogData = "INSERT INTO blogs (user_id, user_name, title, body, published) VALUES ('$user_id_blogs', '$usernameblogs', 'Default Title', 'Defaul About-text. Please change.', '1');";

        mysqli_query($conn, $queryDefaultBlogData);
        
        //Create directory for every user
        $username = esc($_POST['username']);
                
        //Copy feed.php
        $source_index = 'feed_template.php';
        $source_about = 'about_template.php';
        $source_contact = 'contact_template.php';
        $source_contact = 'post_template.php';

        $newFileName_index = "index.php";
        $newFileName_about = "about.php";
        $newFileName_contact = "contact.php";
        $newFileName_contact = "post.php";

        $destination_index = "../users/" . strtolower($username) . "/" . $newFileName_index;
        $destination_about = "../users/" . strtolower($username) . "/" . $newFileName_about;
        $destination_contact = "../users/" . strtolower($username) . "/" . $newFileName_contact;
        $destination_post = "../users/" . strtolower($username) . "/" . $newFileName_post;

        //$srcUserFolder = "/var/www/html/blogver1/php/user";
        //$destUserFolder = "/var/www/html/blogver1/users/" . strtolower($username) . "/";

        //If blogger signs up then create the user folder structure and go to login-page. 
        
        //if (in_array($_SESSION['user']['role'],["Author"])) {

        //Create user directory and copy feed-php
        mkdir("../users/" . strtolower($username), 0777, true);
        mkdir("../users/" . strtolower($username) . "/src", 0777, true);
        mkdir("../users/" . strtolower($username) . "/img", 0777, true);
        
        copy($source_index, $destination_index);
        copy($source_about, $destination_about);
        copy($source_contact, $destination_contact);
        copy($source_post, $destination_post);
        
        //Copy folder with files. Not in use. 
        //shell_exec("cp -r $srcUserFolder $destUserFolder");

        header('Location: /php/login.php');
        
        exit(0);
       
        }
    }

    // Log in user
    if (isset($_POST['login_btn'])) {
    
        $username = esc($_POST['username']);
        $password = esc($_POST['password']);

        if (empty($username)) { array_push($errors, "Username please"); }
        
        if (empty($password)) { array_push($errors, "Password please"); }
        
        if (empty($errors)) {
        
            $password = md5($password); // krypterat lösenord
            $sql = "SELECT * FROM users WHERE username='$username' and password='$password' LIMIT 1";

            $result = mysqli_query($conn, $sql);
        
            if (mysqli_num_rows($result) > 0) {
                
                // User-ID
                $reg_user_id = mysqli_fetch_assoc($result)['id']; 

                // Logged in user > Session
                $_SESSION['user'] = getUserById($reg_user_id); 

                // If Admin logs in then go to admin-page:
                if (in_array($_SESSION['user']['role'],["Admin"])) {
                    
                    $_SESSION['loggedIn'] = true;   

                header('Location: /php/admin/admin.php');
                exit(0);

                } else {
                    
                    $_SESSION['loggedIn'] = true;  
                    
                    $username = esc($_POST['username']); 

                    //header('Location: /users/' . strtolower($username));
                  
                    header('Location: /php/feed.php');				
                
                    exit(0);
                }

                } else {

                array_push($errors, 'Error.');
              
            }
            
        }
    }


function esc(String $value)
{	
    global $conn;

    $val = trim($value); 
    $val = mysqli_real_escape_string($conn, $value);

    return $val;
}

function getUserById($id)

{
    global $conn;
    $sql = "SELECT * FROM users WHERE id=$id LIMIT 1";

    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    return $user; 
}

?>