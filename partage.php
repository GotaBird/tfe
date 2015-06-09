<!DOCTYPE HTML>
<html>
<head>
	<title>À vos crayons ! - Styx</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="description" content="Styx est un projet de jeu imaginé pour iPad. Parcourez son case study pour en apprendre plus sur son évolution.">
    <meta name="Keywords" content="Styx, case study, jeu iPad, styx game">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="shortcut icon" href="img/favicon.png">
    
	<link rel="stylesheet" type="text/css" href="css/reset.css" >
    <link rel="stylesheet" type="text/css" href="css/main.css" >
     <link rel="stylesheet" type="text/css" href="css/responsive.css" >

</head>
<body>
    
    <aside>
        <h1><a href="index.html">Styx</a></h1>
        
        <a id="open" href="#open">Menu</a>
        
        <ul>
            <li><a href="index.html"><h5>Introduction</h5><p>Envie d'une histoire</p></a></li>
            <li><a href="parcours.html"><h5>Parcours</h5><p>Première approche</p></a></li>
            <li><a href="hub/index.php"><h5>Hub</h5><p>Et ensuite ?</p></a></li>
            <li class="current"><a href="#"><h5>Partage</h5><p>À vos crayons !</p></a></li>
        </ul>
    </aside><!-- end aside -->
    
<div id="container">
  
    
    
    <div id="explique">
        <div class="content" id="inst-content" style="display:block; visibility: visible; opacity:1;">
            
            <img src="img/insta/cov-2.png" alt="composition d'image Henry se faisant dessiner">
            
            <section>
            <h3>À vos crayons !</h3>
            <p>Vous aussi, donnez vie à votre imagination.</p>
            <p>Perdu près du Styx, Henry se sent seul et il lui faudrait un peu de compagnie. Une copine ? Un petit chat ? À vous de décider.</p> 
            <p>Participez au projet et envoyez-moi vos propositions de personnage via #projetstyx sur Instagram. <span style="font-family:'italic';">Enjoy !</span></p>
            </section>
        </div><!-- content -->
    </div><!-- explique -->
    
    
    <div id="dossier">
        <div class="content" style="display:block; visibility: visible; opacity:1;">
        <p>Vous ne savez pas par où commencer ? Téléchargez le <a href="#">dossier de conception.</a></p>
        </div><!-- content -->
    </div><!-- dossier -->
    <div id="merci-stagram" style="background-color:#f4f4f4; margin-bottom:5px;">
        <div class="content" id="insta-title" style="display:block; visibility: visible; opacity:1;">
            <h3>#Projetstyx</h3>
            <p id="lien-instagram">Abonnez-vous sur <a href="https://instagram.com/styx.game/" target="_blank">Instagram</a></p>
            
            <a id="mobile-link" href="https://instagram.com/styx.game/" target="_blank">Instagram</a>
        </div><!-- content -->
    </div><!-- merci-stagram -->
    
    <div id="refresh" class="content" style="display:block; visibility: visible; opacity:1;">   
<ul id="answers">    
<?php 
    function callInstagram($url)
    {
    $ch = curl_init();
    curl_setopt_array($ch, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLOPT_SSL_VERIFYHOST => 2
    ));

    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
    }

    $tag = 'projetstyx';
    $client_id = "d927fb9c03f1490d9b95fcf0c6035a25";
    $url = 'https://api.instagram.com/v1/tags/'.$tag.'/media/recent?client_id='.$client_id;

    $inst_stream = callInstagram($url);
    $results = json_decode($inst_stream, true);

    //Now parse through the $results array to display your results... 
   
        foreach($results['data'] as $item){
        $image_link = $item['images']['standard_resolution']['url'];
        $istg_caption = $item['caption']['text'];
        $istg_user = $item['caption']['from']['username'];
        $istg_link = $item['link'];
        
        echo '<li class="inst_img"><a class="instalink" href="'.$istg_link.'" target="_blank"><img src="'.$image_link.'" alt="'.$istg_caption.'"/><div class="overlay"><h3>'.$istg_user.'</h3><p>'.$istg_caption.'</p></div></a></li>';
    }
?>
</ul> 
</div><!-- end content -->
    
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


    <script src="js/jquery-min.js"></script>
	<script src="js/main.js"></script>
    
</body>
</html>