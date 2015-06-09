<?php 

require_once('../connect.php');

    $query = "SELECT * FROM hub_article ORDER BY date DESC";
    $preparedStatement= $connexion->prepare($query);
    $preparedStatement->execute();
   
?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width" />
        <title>Et ensuite ? - Styx</title>
         <meta name="description" content="Hub du projet styx, d'où il vient et où il va.">
    <meta name="Keywords" content="Styx, case study, jeu iPad, styx game,hub">
        <link rel="stylesheet" href="../css/reset.css">
        <link rel="stylesheet" href="../css/main.css">
         <link rel="stylesheet" href="../css/responsive.css" >
        
        <link rel="shortcut icon" href="../img/favicon.ico">
        <link rel="shortcut icon" href="../img/favicon.png">
    </head>
    <body>
    <aside>
        <h1><a href="../index.html">Styx</a></h1>
        
        <a id="open" href="#open">Menu</a>
        
        <ul>
            <li><a href="../index.html"><h5>Introduction</h5><p>Envie d'une histoire</p></a></li>
            <li><a href="../parcours.html"><h5>Parcours</h5><p>Première approche</p></a></li>
            <li class="current"><a href="#"><h5>Hub</h5><p>Et ensuite ?</p></a></li>
            <li><a href="../partage.php"><h5>Partage</h5><p>À vos crayons !</p></a></li>
        </ul>
    </aside><!-- end aside -->
        
        
    <div id="container" style="background:#f4f4f4;">
            
         <div id="en-tete" class="en-tetehub" style=" background-image: url(../img/hub.jpg);">
        <h2 id="hub_h2">J’aimerais partager cette expérience avec vous</h2>
        </div>
        
        
            <div id="merci-stagram" style="background-color:#fff; margin-bottom:5px;">
        <div class="content" id="insta-title" style="display:block; visibility: visible; opacity:1;">
            <h3><img src="../img/hub/plume.png" alt="Plume d'écriture"> styx<span>HUB.</span></h3>
            
            <form id="search-form">
                    <img src="../img/hub/srch-icon.png" alt="icone de loupe"/>
                    <input id="search" type="text" placeholder="Rechercher" />
            </form>
            
        </div><!-- content -->
    </div><!-- merci-stagram -->
        
            <div class="content" style="display:block; visibility: visible; opacity:1;">
                
                <ul id="liste_articles">
                   
                   <?php   

                        while($result = $preparedStatement->fetch()) {
                             
                            $date = strtotime( $result['date'] );
                            $newdate = date( 'D, d M Y', $date );
                            
                            echo '<li>
                                    <a href="article.php?id='.$result['ID'].'">
                                    <div class="article_bg" style="background-image:url(cover/'.$result['ID'].'.jpg); background-position-y:center; "></div>
                                
                                    <div class="article_name">
                                    <span class="date"> '.$newdate.' </span>
                                    <h4>'.$result['title'].'</h4>
                                    </div>
                                
                                    </a>
                                 </li>';
                        }
                    ?>
                   
                </ul>
                
            </div>
        
        
            <footer>
        <div class="content" style="display:block; visibility: visible; opacity:1;"> 
            
            <div id="footer-logo">
                <h2>Styx</h2>
                <p>L'aventure continue</p>
            </div>
            
            <section>
                <h3>Github</h3>
                <p>La première intégration du jeu pointe le bout 
de son nez. Retrouvez la sur <a href="https://github.com/GotaBird/styx.game">Github</a></p>
            </section>
            <section>
                <h3>Instagram</h3>
                <p>Retrouvez l’univers graphique sur instagram.
<br/>Abonnez-vous à <a href="#">styx.game</a></p>
            </section>
            <section>
                <h3>Contact</h3>
                <p>Une question, une suggestion ? <br/> Contactez moi sur <a href="mailto:kevdelval@gmail.com">kevdelval@gmail.com</a></p>
            </section>
            
            <p id="copyrights">© Kevin Delval 2015. All rights reserved</p>
        </div>
    </footer>
        </div>
        <script src="../js/jquery-min.js"></script>
	    <script src="../js/main.js"></script>
    </body>
</html>