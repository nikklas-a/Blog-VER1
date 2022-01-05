<?php require_once('../../config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public.php') ?>
<?php include(ROOT_PATH . '/php/admin/includes/functions.php') ?>

<?php 

if($_SESSION['loggedIn']){

} else {

header('Location: /php/login.php');  

}

?>

<?php 
	$userCount = countUsers();
    $postCount = countPosts();
?>

<style>
        th, td {
        padding-top: 5px;
        padding-bottom: 20px;
        padding-left: 0px;
        padding-right: 25px;
        }
    </style>

<html>

<link rel="stylesheet" type="text/css" href="../../css/admin.css">

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

	<h1>Admin Area</h1>

          <h3>Statistics</h3>
   <div style="width: max-content; padding-bottom: 20px;">
        <t>
        <table class="fixed">
            <col width="100px" />
            <col width="100px" />
            <col width="100px" />
            <col width="100px" />
        
        <thead>
            <tr>     
            <th></th>
            </tr>
        </thead>
        
        <tbody>

            <tr>
                <td>Users </td>
                <td>
                       <?php echo $userCount['total']; ?></td>
            <!--
                <td>Blogs </td>
                <td> TBD </td>-->
            </tr>
            <tr>
                <td>Posts </td>
                <td>  <?php echo $postCount['total']; ?></td>
             </td>
           <!--
                <td>Words </td>
                <td> TBD </td>
            </tr>

            <tr>
                <td>Comments </td>
                <td> TBD </td>
            </tr>
            <tr>
                <td>Views, total </td>
                <td> TBD</td>
                <td>Views, per week </td>
                <td> TBD </td>
            </tr>
    -->
        </tbody>
    </table>
    </t>
   </div>

   <br>

<div id="footer"><?php include( ROOT_PATH . '/includes/footer.php'); ?></div>

</main>
</body>
</html>




	