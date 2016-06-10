<?php  
ini_set('display errors','On');
error_reporting (E_ALL| E_STRICT);
?>
<?php 
@session_start();



$score=$_SESSION['score'];
$Impot=$_SESSION['Impot'];
$pourcentage_Reussite=$_SESSION['pourcentage_Reussite'];

 ?>
<!DOCTYPE HTML>

<html>
  
  
	<head>
		<title>jeu</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	
    </head>
	<body>

	<header> 
       <div> 
          <div>                 	
              <h1><a href="index.html"><img src="" alt=""></a></h1> 
              <nav>  
                <ul class="menu">
                      
                      <li><a href="index.php">Jeux</a></li>
                      <li style="background: #edecec;"><a href="#">Score</a></li>
                      <li><a href="meilleur.php">Meilleur Score</a></li>
                  </ul>
              </nav>
              <div class="clear"></div>
          </div>
      </div>
</header>

<!-- Banner -->
			<section id="banner">
				<header>
					<h2>Score:</h2>
				</header>
				 <?php if($score==1): ?>
           
           <?php
             $pourcentage_Reussite= number_format($pourcentage_Reussite,2);
             ?>
			 
			 <?php if($pourcentage_Reussite>=70): ?>
			 
			 	<div style="z-index:-10; position: absolute; visibility: hidden;">
				<audio controls autoplay>
		 			 <source  src="music/mus.wav" type="audio/wav">
		  		</audio>
				</div>
				
			 <?php else: ?>
			 
			 	<div style="z-index:-10; position: absolute; visibility: hidden;">
				<audio controls autoplay>
		 			 <source  src="music/334.wav" type="audio/wav">
		  		</audio>
				</div>
			 	
			 <?php endif; ?>
			 
       <p class="bonne">
           <?php echo " VOTRE SCORE EST ".$pourcentage_Reussite."/100";?></p></br>
            <input type="button" class="button style2 scrolly" value="Meilleur Score" onClick="document.location='meilleur.php'" style="font-size:large"></p>
            <?php elseif ($score==0):?>

<p class="mauvaise">
<?php echo "Attention vous avez depassé les ".$Impot." Dhs!";?></p></br>
   <input type="button" class="button style2 scrolly" value="Retour" onClick="document.location='index.php'" style="font-size:large">
 <?php else:?>
<p  class="mauvaise">
 <?php echo "Attention la somme est inferieur à ".$Impot."Dhs!";?></p></br>
  <input type="button" class="button style2 scrolly" value="Retour" onClick="document.location='index.php'" style="font-size:large">

</p>
<?php endif; ?>
				
			</section>
		  
		
			

	


	

		<section id="footer">
			<ul class="icons">
				<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
				<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
				<li><a href="#" class="icon fa-google-plus"><span class="label">Google+</span></a></li>
				<li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
				<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
				<li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
			</ul>
		
		</section>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.poptrox.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
