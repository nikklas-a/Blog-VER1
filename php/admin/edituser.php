<?php require_once('../../config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public.php') ?>
<?php include(ROOT_PATH . '/php/admin/includes/functions.php') ?>

    <?php $user = visaUser(); ?>

    <?php 

        if($_SESSION['loggedIn']){

        } else {

        header('Location: /php/login.php');  

        }

    ?>

<html>

<link rel="stylesheet" type="text/css" href="../../css/admin.css">

<style>
        th, td {
        padding-top: 5px;
        padding-bottom: 5px;
        padding-left: 0px;
        padding-right: 25px;
        }
</style>

<script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous">
    </script>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script src="./js/darkmode.js"></script>

<div class="container">

    <header>

        <div class="headerdiv">		

            <div id="header">	
                <?php include('./includes/header.php'); ?>
            </div>

        </div>


    </header>
    
    <script>
		var app = document.getElementsByTagName("BODY")[0];
		if (localStorage.lightMode == "dark") {
			app.setAttribute("data-light-mode", "dark");
		}
	</script>

	<div class="maintext">

    <body>

    <main>
    
    <?php foreach ($user as $users): ?>
	<h1>Admin | Users | User profile: <i> <?php echo $users['username']; ?> </i> </h1>
    <?php endforeach ?>

    <hr>

    <div>

        <h2> Edit user profile</h2>
        <?php foreach ($user as $users): ?>
   
    <table class="table">

        <thead>
            <th style="text-align:left"> Var </th>
            <th style="text-align:left"> Current value </th>
            <th style="text-align:left" colspan ="2">Change </th>
        </thead>            
        
        <tbody>

            <tr>
                <td> User ID </td>
                <td><?php echo $users['id']; ?> <td>
        
                <form method="post" action="">
        
                <td>
                  Not possible
                </td>
                <td>
                    
                </td>
                        
                </form>
            </tr>

            <tr>
                <td> User Name </td>
                <td><?php echo $users['username']; ?> <td>
        
                <form method="post" action="">
        
                <td>
                   Not possible
                </td>
                <td>
                    
                </td>
                        
                </form>
            </tr>

            <tr>
                <td> User Email </td>
                <td><?php echo $users['email']; ?> <td>
        
                <form method="post" action="">
        
                <td>
                   <input typ="text" name="update_user_email" value="" placeholder="New data">
                </td>
                <td>
                    <button type="submit" class="btn" name="edit_useremail_btn">Confirm</button>
                </td>
                        
                </form>
            </tr>

            <tr>
                <td> User Role </td>
                <td><?php echo $users['role']; ?> <td>
        
                <form method="post" action="">
        
                <td>
                   <select name="roleSelect"> 
                        <option> Select new role </option>
                        <option> Author </option>
                        <option> Admin </option>
                    </select>
                </td>

                <td>
                    <button type="submit" class="btn" name="edit_userrole_btn">Confirm</button>
                </td>
                        
                </form>
            </tr>

        </tbody>
    </table>       

    <?php endforeach ?>
    </div>

    <h2> Edit user blogs</h2>
        <?php foreach ($user as $users): ?>
    <table class="table">
					<thead>
					    <th style="text-align:left">Blog #</th>
						<th style="text-align:left">Blog name</th>
						<th style="text-align:left">Action</th>
                        <th style="text-align:left">New data</th>
                    </thead>
					
                    <tbody>
					
						<tr>
                            <td>	
                                Comming soon....
							</td>
							<td> Comming soon....</td>
                            <td> 
                            
                                <select id="blogOptions">  
                                        <option value="select"> Select option </option>
                                        <option value = "change_blog_name"> Change blog name  </option>  
                                        <option id="displayDeleteWarning" value = "delete_blog"> Delete blog   </option>  
                                        </option>  
                                </select>  
                                                      
                            </td>

                            <script>
                                    
                                $("#blogOptions").change(function(){
                                    if($(this).val()=="delete_blog") {    
                                    
                                        $("#warning").html("<b> This will permentantly delete the blog and all posts.</b>");
                                    } else {
                                        $("#warning").html(" ");;
                                    }
                                });

                            </script>

                            <form method="post" action="">
                                <td>
                                    <input typ="text" name="update_blog" value="" placeholder="New data">
                                </td>
                                <td> <button type="submit" class="btn" name="edit_blog_btn">Confirm</button> </a> </td>
                            </form>
                        </tr>
                       
                        <tr>
                       
                        <td></td>
                       <td></td>
                       
                        <td id="warning" colspan="3"></td>
                           
                        </tr>
					
                    </tbody>
    </table>

    <?php endforeach ?>
    
    
     <h2> User Profile &#38; Activities </h2>
    
    <?php foreach ($user as $users): ?>
    
    
    <table>

    <tbody>

        <thead>

        <tr>
            <td> Member Since:       </td>
            <td>  <?php echo $users['created_at']; ?>    </td>
        </tr>   
        
        <tr>
            <td> Blogs:       </td>
            <td>  Kommer snart...   </td>
        </tr>   

        <tr>
            <td> Posts:       </td>
            <td>  Kommer snart...    </td>
        </tr>
        
        <tr>
            <td> Blog visits:       </td>
            <td>  Kommer snart...    </td>
        </tr>

        </thead>
    
    </tbody>

    </table>
    <?php endforeach ?>

    


    <br>

<div id="footer"><?php include( ROOT_PATH . '/includes/footer.php'); ?></div>

</main>
</body>
</html>

