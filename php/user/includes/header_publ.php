<?php require_once('../../config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public.php') ?>
<?php require_once( ROOT_PATH . '/php/user/includes/author_functions.php') ?>

    <?php 
        $blogTitle = getAboutTextPublic('aboutTitle');
        $blogTitlePost = getBlogTitlePublicHeader('aboutTitle');
        $indexLink = getIndexPath();
    ?>
  
<hr>

<div class="header-logo">
    
        <div class="logo">

            <br>

                <h1>
                    <?php echo $blogTitle['title'] ?>
                </h1>
        </div>
        
        <div class="header-nav">
            <nav>
                <ul>
                    <li><a href="index.php"> Home </a></li>
                    <li><a href="about.php">About</a></li>
                </ul>
            </nav>
        </div>
</div>

<hr>
                    
    <div class="header-sub">

        <?php 
            if (isset($_SESSION['user']['username']))
        ?>

        &nbsp; | &nbsp; <a href="#" onclick="toggle_light_mode()" class="dm">Dark Mode </a>
        &nbsp;  
        &nbsp;  
    
    </div>	

<hr>
