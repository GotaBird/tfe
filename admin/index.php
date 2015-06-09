<?php 
require_once('../connect.php'); 
require_once('../class.upload.php'); 

$erreurs = array();

if( $_POST) {
    
    if($_POST['check'] != '' ){
        die("bien essayé...");
    }
    
    $title = strip_tags($_POST['title']);
    $description = strip_tags($_POST['description']);
    $contenu = $_POST['contenu'];
    
    if( $title !== '' && $description !== '' && $contenu !== '' && $cover !== '') {
        
        try{
            $query = "INSERT INTO hub_article (title, date, description, contenu) VALUES (:title, NOW(), :description, :contenu)";
            $preparedStatement= $connexion->prepare($query);
            $preparedStatement->bindParam(':title', $title);
            $preparedStatement->bindParam(':description', $description);
            $preparedStatement->bindParam(':contenu', $contenu);
            $preparedStatement->execute();                
            $lastID = $connexion->lastInsertId();
            
            if(!$lastID == '' ) {
                
                $document = new Upload($_FILES['cover'] );
                
                if($document->uploaded) {
                    
                    $document->file_new_name_body = $lastID;
                    $document->process('../hub/cover');
                    
                    if($document->processed) {
                        echo "ok";
                    }
                    
                    
                }
                
            }
            
        } catch(Exception $e){
                var_dump($e);
                exit;
        }
        
    } else { die('erreur'); }
    
}

?>
    
<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width" />
        <title>admin - Styx</title>
         <meta name="description" content="Styx est un projet de jeu imaginé pour iPad. Rencontrez Henry, l'un des personnages principaux.">
    <meta name="Keywords" content="Styx, case study, jeu iPad, styx game">
        <link rel="stylesheet" href="../css/reset.css">
        <link rel="stylesheet" href="../css/main.css">
         <link rel="stylesheet" type="text/css" href="css/responsive.css" >
        
        <link rel="shortcut icon" href="../img/favicon.ico">
        <link rel="shortcut icon" href="../img/favicon.png">
        
        <style>
            label{
                display:block;
                width:900px;
                margin: auto;
                margin-bottom:25px;
            }
            #check { display: none; }

        </style>
    </head>
    <body>
       <aside>
        <h1><a href="index.html">Styx</a></h1>
        
        <a id="open" href="#open">Menu</a>
        
        <ul>
            <li><a href="index.html"><h5>Introduction</h5><p>Envie d'une histoire</p></a></li>
            <li><a href="parcours.html"><h5>Parcours</h5><p>Première approche</p></a></li>
            <li><a href="#"><h5>Hub</h5><p>Et ensuite ?</p></a></li>
            <li><a href="partage.php"><h5>Partage</h5><p>À vos crayons !</p></a></li>
        </ul>
    </aside><!-- end aside -->
        
        
 <div id="container">
    

    <!-- <div id="en-tete">
        <img src="../img/henry-cover.jpg" alt="Départ d'Henry vers sa quête">
    </div>
     <div class="content" id="description_persos" contenteditable="true" style="display:block; visibility: visible; opacity:1;">
        
            <h3>Titre de l'article</h3>
            
            <h4>Description du contenu</h4>
            
            <p>Contenu texte de l'article</p>
 
      </div> -->
     <form action="" method="post" enctype="multipart/form-data"> 
        <label for="cover">
             <h4>Votre image de couverture</h4>
            <input type="file" name="cover" id="cover"/>
            <p class="erreur"><?php echo $erreurs['imagesize'];?></p>
        </label>
        
        <label for="title">
               <h4>Votre titre d'article</h4>
            <input type="text" name="title" id="title" required/>
        </label>
        
        <label for="description">
               <h4>Description intro du contenu</h4>
            <textarea name="description" id="description" required></textarea>
        </label>
        
        <label for="contenu">
               <h4>Contenu de l'article</h4>
            <textarea name="contenu" id="contenu" required></textarea>
        </label>
        <label for="check">
            <input type="text" id="check" name="check" placeholder="à laisser vide"/>
        </label> 

        <input type="submit" value="Poster" name="submit">
     </form>
     
     
</div><!-- end container -->
        
        <script src="../js/jquery-min.js"></script>
	<script src="../js/main.js"></script>
    </body>