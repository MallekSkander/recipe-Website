<?php 

    include "../Controller/commentC.php";

    $sujetC = new  commentC();

    $listeU = $sujetC->afficherComs();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital@1&display=swap" rel="stylesheet">
</head>

<body>
<div class="navigate">
            <span><a href="index.html">Le site </a> >> <a href="ajouterCom.php">Ajouter un commentaire </a> >> <a href="detail.php"> Le forum </a>  >>  <a href="forums.php"> Les commentaires</a> </span>
        </div>

    <header>
        <!--NavBar Section-->
        <div class="navbar">
            <nav class="navigation hide" id="navigation">
                <span class="close-icon" id="close-icon" onclick="showIconBar()"><i class="fa fa-close"></i></span>
                <ul class="nav-list">
                    <li class="nav-item"><a href="forums.html">Forums</a></li>
                    <li class="nav-item"><a href="posts.html">Posts</a></li>
                    <li class="nav-item"><a href="detail.html">Detail</a></li>
                </ul>
            </nav>
            <a class="bar-icon" id="iconBar" onclick="hideIconBar()"><i class="fa fa-bars"></i></a>
            <div class="brand">My Forum</div>
        </div>
        <!--SearchBox Section-->
        <div class="search-box">
            <div>
                <select name="" id="">
                    <option value="Everything">Everything</option>
                    <option value="Titles">Titles</option>
                    <option value="Descriptions">Descriptions</option>
                </select>
                <input type="text" name="q" placeholder="search ...">
                <button><i class="fa fa-search"></i></button>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="subforum">
            <div class="subforum-title">
                <h1>General Information</h1>
            </div>
            <?php 
                      

        foreach ($listeU as $comment) {
            ?>
                                   

            <div class="subforum-row">
                <div class="subforum-icon subforum-column center">
                    <i class="fa fa-car center"></i>
       
                </div>
                <div class="subforum-description subforum-column">
                       <h4><a href="#"><?php echo $comment['thread']; ?></a></h4>
                       <br> 
                       <tr> 
                       
    <td> <?php echo $comment['user']; ?></td>
    <br> <br>
        <td><?php echo $comment['content']; ?></td> 
        <br>
        <br>
<br>
        <td><?php echo $comment['date_comment']; ?></td> 

<!--     
        <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="">JustAUser</a> 
                    <br>on <small>12 Dec 2020</small>
                </div> -->
                <form action="supprimerC.php" method="post">
                         <button>  Supprimer </button>  
                        <input type="hidden" name="ID" value="<?php echo $comment['ID'] ?>">
        </form>
        <form action="modifierC.php" method="post">
                         <button>  Modifier </button>  
                        <input type="hidden" name="ID" value="<?php echo $comment['ID'] ?>">
        </form>
    </tr> 
    </div>
               
                       </div>
                       </div>
             
                       </div>


    <?php
        } ?>

            </div>
        </div>
        <!--More-->
        
      
<!--       
        
        <div class="subforum">
            <div class="subforum-title">
                <h1>General Information</h1>
            </div>
            <div class="subforum-row">
                <div class="subforum-icon subforum-column center">
                    <i class="fa fa-car center"></i>
                </div>
                <div class="subforum-description subforum-column">
                    <h4><a href="#">Description Title</a></h4>
                    <p>Description Content: let's try to be cool, otherwise,w at 'sthe point in libing together with people youdont' live.</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span>24 Posts | 12 Topics</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="">JustAUser</a> 
                    <br>on <small>12 Dec 2020</small>
                </div> -->
          
          
            <!-- The fields just next to forum -->
            <!-- <hr class="subforum-devider">
            <div class="subforum-row">
                <div class="subforum-icon subforum-column center">
                    <i class="fa fa-car center"></i>
                </div>

                <div class="subforum-description subforum-column">
                    <h4><a href="#">Description Title</a></h4>
                    <p>Description Content: let's try to be cool, otherwise,w at 'sthe point in libing together with people youdont' live.</p>
                </div>
                <div class="subforum-stats subforum-column center">
                    <span>24 Posts | 12 Topics</span>
                </div>
                <div class="subforum-info subforum-column">
                    <b><a href="">Last post</a></b> by <a href="">JustAUser</a> 
                    <br>on <small>12 Dec 2020</small>
                </div>
            </div> -->

           
        </div>
        <!---->
    </div>

    <!-- Forum Info -->
    <!-- <div class="forum-info">
        <div class="chart">
            MyForum - Stats &nbsp;<i class="fa fa-bar-chart"></i>
        </div>
        <span><u>5,369</u> Posts in <u>48</u> Topics by <u>8,124</u> Members.</span><br>
        <span>Latest post: <b><a href="">Random post</a></b> on Dec 15 2021 By <a href="">RandomUser</a></span>.<br>
        <span>Check <a href="">the latest posts</a> .</span><br>
    </div> -->

    <footer>
        <span>&copy;   DMAK | All Rights Reserved</span>
    </footer>
    <script src="main.js"></script>
</body>
</html>