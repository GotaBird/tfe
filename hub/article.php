<?php 
  require_once('../connect.php');
    require_once('../trad_func.php');

// récup articles

$id_article = $_GET['id'];

$query = "SELECT * FROM hub_article WHERE id=:id";
$preparedStatement = $connexion->prepare($query);
$preparedStatement->bindParam(':id', $id_article);
$preparedStatement->execute();
$result = $preparedStatement->fetch();

$date = strtotime( $result['date'] );
$newdate = date( 'D, d M Y', $date );

?>
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width" />
        <title><?php echo $result['title'] ?> - Et ensuite ? - Styx</title>
         <meta name="description" content="Styx est un projet de jeu imaginé pour iPad. Rencontrez Henry, l'un des personnages principaux.">
    <meta name="Keywords" content="Styx, case study, jeu iPad, styx game">
        <link rel="stylesheet" href="../css/reset.css">
        <link rel="stylesheet" href="../css/main.css">
         <link rel="stylesheet" href="../css/responsive.css" >
        
        <link rel="shortcut icon" href="../img/favicon.ico">
        <link rel="shortcut icon" href="../img/favicon.png">
        <style type="text/css">
            
            #check { display: none; }
            
            @media screen and (max-width: 680px){
            #description_persos{
              padding-left: 25px !important;
              padding-right: 25px !important;
            }
            }
        </style>
        
    </head>
    <body>
       <aside>
        <h1><a href="../index.html">Styx</a></h1>
        
        <a id="open" href="#open">Menu</a>
        
        <ul>
            <li><a href="../index.html"><h5>Introduction</h5><p>Envie d'une histoire</p></a></li>
            <li><a href="../parcours.html"><h5>Parcours</h5><p>Première approche</p></a></li>
            <li class="current"><a href="index.php"><h5>Hub</h5><p>Et ensuite ?</p></a></li>
            <li><a href="../partage.php"><h5>Partage</h5><p>À vos crayons !</p></a></li>
        </ul>
    </aside><!-- end aside -->
        
 <div id="container">
     <div id="en-tete" style="background-image: url(<?php echo 'cover/'.$result['ID'].'.jpg' ?>);">
    </div>
     <div class="content" id="description_persos" style="display:block; visibility: visible; opacity:1;">
        
            <p id="date_article"><?php echo $newdate ?></p>
         
            <h3 id="h3_article"><?php echo $result['title'] ?></h3>
            
            <h4><?php echo $result['description'] ?></h4>
            
            <?php echo $result['contenu'] ?>
            
         <a id="back-fleche" href="index.php"><div class="flch flch-gauche"></div>Hub</a>
         
         
         
       <?php 
         
         if( $_POST) {
    
                if($_POST['check'] != '' ){
                    die("bien essayé...");
                }

                $numero = $result['ID'];
                $nom = strip_tags($_POST['nom']);
                $commentaire = strip_tags($_POST['commentaire']);

                if( $nom !== '' && $commentaire !== '') {

                    try{
                        $query = "INSERT INTO hub_avis (id_article, nom, commentaire, date) VALUES (:numero,:nom,:commentaire, NOW())";
                        $preparedStatement= $connexion->prepare($query);
                        $preparedStatement->bindParam(':numero', $numero);
                        $preparedStatement->bindParam(':nom', $nom);
                        $preparedStatement->bindParam(':commentaire', $commentaire);
                        $preparedStatement->execute();                

                    } catch(Exception $e){
                            var_dump($e);
                            exit;
                    }

                } else { die('erreur'); }

            }

         ?>  
         
         
         
         <p id="com_links"><a class="current" id="avis" href="#com_links">Avis</a> <a id="partager" href="#com_links">Partager votre avis</a></p> 
         <div id="commentaires">
             
             
             <section id="avis-list">
                <ul>
    
                    <?php

                $query = "SELECT * FROM hub_avis WHERE id_article=:id_article";
                $preparedStatement = $connexion->prepare($query);
                $preparedStatement->bindParam(':id_article', $id_article);
                $preparedStatement->execute();
                $result = $preparedStatement->fetchAll();

                        foreach(array_reverse($result, true) as $commentaire) {
                            
                            $date = strtotime( $commentaire['date'] );
                            $newdate = date( 'D, d M Y', $date );
                            
                            echo '<li class="les-avis"><h5>'.$commentaire['nom'].' <span>'.$newdate.'</span></h5><p>'.$commentaire['commentaire'].'</p></li>';
                        }

                        if( !$result ){
                         echo '<p id="aucun">Aucun avis</p>';
                        }

                    ?>
                </ul>
             </section>
             
             <section id="commenter">
                 <form action="" method="post">
                     
                     <label id="label-nom" for="nom">
                         <h5>Comment vous appelez-vous ?</h5>
                        <input type="text" placeholder="Inconnu" name="nom" id="nom" required/>
                     </label>

                     <label for="commentaire">
                        <textarea maxlength="140" name="commentaire" id="commentaire" placeholder="Votre avis en 140 lettres..." required></textarea>
                     </label>
                     
                     <label for="check">
                    <input type="text" id="check" name="check" placeholder="à laisser vide"/>
                    </label>
                     
                     <div id="poster">
                     <h5>Faites avancer ce projet,</h5>
                     <input id="envoyer" type="submit" value="Partager l'avis">
                    </div>
                 </form>
             </section>
         </div>
         
      </div>
        
        
        <ul id="autres_articles">
        <?php 
    $query = "SELECT * FROM hub_article ORDER BY date DESC";
    $preparedStatement= $connexion->prepare($query);
    $preparedStatement->execute();


    while($result = $preparedStatement->fetch() ){
        
        if($result['ID'] != $id_article ) {
        
        echo '<li style="background-image:url(cover/'.$result['ID'].'.jpg); background-position- y:center; ">
        <a href="article.php?id='.$result['ID'].'">
        
        <h4>'.$result['title'].'</h4>
        </a>
              </li>';
        }
    }
    
        
        ?>
        
        </ul>
        
         <footer>
        <div class="content" style="display:block; visibility: visible; opacity:1;"> 
            
            <div id="footer-logo">
                <h2>Styx</h2>
                <p>L'aventure continue</p>
            </div>
            
            <section>
                <h3>Github</h3>
                <p>La première intégration du jeu arrive.<br/> Retrouvez la sur <a href="https://github.com/GotaBird/styx.game" target="_blank">Github</a></p>
            </section>
            
            <section>
                <h3>Instagram</h3>
                <p>Retrouvez l’univers Styx sur instagram.
<br/>Abonnez-vous à <a href="https://instagram.com/styx.game/" target="_blank">styx.game</a></p>
            </section>
            <section>
                <h3>Contact</h3>
                <p>Une question, une suggestion ? <br/><a href="mailto:kevdelval@gmail.com">kevdelval@gmail.com</a></p>
            </section>
            
            <p id="copyrights">© Kevin Delval 2015. All rights reserved</p>
        </div>
    </footer>
</div><!-- end container -->
        
        <script src="../js/jquery-min.js"></script>
	    <script src="../js/main.js"></script>
    </body>