    <?php 

      $blogTitle = getAboutText('aboutTitle');

    ?>
  
<div class="header-logo">
    
</div>
    
    <div class="header-nav">
        <div class="menu">
            <nav>
                <ul>
                    <li><a href="/php/feed.php"><?php echo $blogTitle['title']; ?></a></li>
                    <li><a href="/php/user/aboutblog.php">About the blog</a></li>
                    <li><a href="#">Options</a>
                        <ul>
                            <li><a href="/php/user/writer.php">Writer</a></li>
                            <li><a href="/php/user/editor.php">Editor</a></li>
                            <li><a href="/php/logout.php">Log out</a></li>
                
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
  
    </div>
<br>
<hr>
                    
<div style="padding-top: 5px; padding-bottom: 5px">

    Logged in as <?php echo $_SESSION['user']['username'] ?>

        &nbsp; | &nbsp; <a href="#" onclick="toggle_light_mode()" class="dm">Dark Mode </a>
        &nbsp; | &nbsp; <a href="/php/logout.php"> Log out </a> &nbsp;&nbsp;&nbsp;&nbsp;

</div>	

<hr>


