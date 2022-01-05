
        <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>

    <hr>
        <h3>
            Manage... &nbsp; | &nbsp; <a href="users.php"> Users </a> &nbsp; | &nbsp; <a href="#">Blogs </a> &nbsp; | &nbsp; <a href="#"> Posts </a> &nbsp; |  &nbsp; <a href="/php/admin/admin.php"> Back to Home </a> &nbsp; | &nbsp;
        </h3>

<hr>
                    
    <body>

        <div id="container" style="display: flex; justify-content: flex-end">

        <?php if (isset($_SESSION['user']['username'])) ?>
        <?php if (isset($_GET)) ?>

        <div>Logged in as <?php echo $_SESSION['user']['username'] ?></div>  
        &nbsp; | &nbsp; &nbsp; 
        <a href="/php/logout.php">Log out </a> 

        </div>


    </body>

        
<hr>