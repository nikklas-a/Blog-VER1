<?php require_once('../../config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public.php') ?>
<?php include(ROOT_PATH . '/php/admin/includes/functions.php') ?>

	<?php 
		$admins = getUsers();
		$roles = ['Admin', 'Author'];		

	
	?>

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
	<h1>Admin | Users </h1>

   	<div>
		
       <?php include(ROOT_PATH . '/includes/messages.php') ?>

			<?php if (empty($admins)): ?>
				<h3>No admins in the database.</h3>
			<?php else: ?>
			<t>
                <table class="table">
					<thead>
						<th>#</th>
                        <th>ID</th>
						<th>Username</th>
						<th>Email</th>
                        <th>Role</th>
						<th colspan="2">Action</th>
                     </thead>
					<tbody>
                        <tr> <hr> </tr>
					<?php foreach ($admins as $key => $admin): ?>
                        
                        <tr>
							<td><?php echo $key + 1; ?></td> &nbsp;
							<td><?php echo $admin['id']; ?> </td> &nbsp;
                            
                            <td>
								<?php echo $admin['username']; ?> &nbsp;
							</td>
                            <td>	
                                <?php echo $admin['email']; ?>	
							</td>
							<td><?php echo $admin['role']; ?></td>
							
                            <td>
								<a href="edituser.php?edit-user=<?php echo $admin['id'] ?>"> <button type="submit" class="btn" name="edit-user">See profile / Edit </button> </a>
                            </td>
							<td>

                       		<a href="users.php?delete-user=<?php echo $admin['id'] ?>" > <button type="submit" class="btn" name="delete-user">Delete</button> </a>
							</td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
			<?php endif ?>
		</div>           
                    </t>
<br><br><br>
 

<br>

<div id="footer"><?php include( ROOT_PATH . '/includes/footer.php'); ?></div>

</main>
</body>
</html>

