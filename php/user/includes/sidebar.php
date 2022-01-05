<?php require_once('../../config.php') ?>
<?php require_once( ROOT_PATH . '/includes/public.php') ?>

    <?php 
        $cntYears = yearByYears();
    ?>

    <?php 

        if($_SESSION['loggedIn']){

            $posts = getPosts();

        } else {

            $posts = getUserPosts();
            $blogTitle = getAboutText('aboutTitle');
            
        } 
    
    ?>
    
    <style>

        * {
        margin:0;
        padding:0;
        }

        ul {
        font-family: "Computer Modern";
        }

        ul li ul {
        height:0px;
        transition:500ms all;
        -webkit-transition:500ms all;
        -moz-transition:500ms all;
        -o-transition:500ms all;
        overflow:hidden;
        }

        ul li ul li {
        transition:1300ms all;
        -webkit-transition:1300ms all;
        -moz-transition:1300ms all;
        -o-transition:1300ms all;
        opacity:0
        }

        ul li ul li a {

        }

        ul li .expandable +ul:nth-child(1), ul li .expandable +ul:nth-child(1), ul li .expandable +ul:nth-child(1), ul li .expandable +ul:nth-child(1) {
        height:0px;
        overflow:hidden;
        }

        ul li ul li {
        line-height:30px;
        font-size:16px;
        }

        ul li .expandable {
        font-size:20px;
        line-height:35px;
        text-decoration:none;
        padding-left:20px;
        }

        ul li .expandable:hover {
        text-decoration:underline;
        }

        ul li ul li:before {
        padding-left:20px;
        content:"-";
        font-size:16px;
        margin-left:20px
        }

        ul li .expandable:focus {

        }
        ul li .expandable:focus +ul:nth-child(1) {
        height:380px ;
        }

        ul li .expandable:focus +ul:nth-child(2) {
        height:380px;
        }

        ul li .expandable:focus +ul:nth-child(3) {
        height:380px;
        }

        ul li .expandable:focus +ul:nth-child(4) {
        height:380px;
        }

        ul li .expandable:focus +ul:nth-child(1) li, ul li .expandable:focus +ul:nth-child(2) li, ul li .expandable:focus +ul:nth-child(3) li, ul li .expandable:focus +ul:nth-child(4) li {
        opacity:1;
        }

        li > a:after { content:  ''; }
        li > a:only-child:after { content: ''; }

    </style>

    <ul>

        <li><a href="#" class="expandable"> 2022 </a>
            
            <ul>

           <?php foreach ($posts as $post): ?>
				<li>
                    <a href="post.php?user=<?php echo $post['user_name']?>&post-link=<?php echo $post['link']; ?>">
                    
                    <?php 

                    //Cut lenght of title
                    $fulltitel = $post['title'];
                    $choppedtitle = substr($fulltitel, 0, rand(15,20));
                    $dots = "...";

                    //If title is shortened then put ... after else display full title.
                    
                    if ($choppedtitle == $fulltitel) {

                        echo $choppedtitle;

                    } else {
                    
                    
                        echo $choppedtitle . $dots; } 
                        
                    ?>                
                    
                    </a>
                </li>

            <?php endforeach ?>

           </ul>
    </ul> 
    
    
    <?php 
									