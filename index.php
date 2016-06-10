<?php  
ini_set('display errors','On');
error_reporting (E_ALL| E_STRICT);
?>

<?php
@session_start();
$montant=rand (2501,15000);
$montant=$montant*12;

if(($montant<=50000)&&($montant>=30001)){
$pourcentage=10/100;
$Somme_deduire=3000;
$Impot=($montant/12)*$pourcentage-($Somme_deduire/12);
$Impot = number_format($Impot,2,'.',''); 
}
if(($montant<=60000)&&($montant>=50001)){
$pourcentage=20/100;
$Somme_deduire=8000;
$Impot=($montant/12)*$pourcentage-($Somme_deduire/12);
$Impot = number_format($Impot,2,'.','');  
}
if(($montant<=80000)&&($montant>=60001)){
$pourcentage=30/100;
$Somme_deduire=14000;
$Impot=($montant/12)*$pourcentage-($Somme_deduire/12);
$Impot = number_format($Impot,2,'.','');
}

if(($montant<=180000)&&($montant>=80001)){
$pourcentage=34/100;
$Somme_deduire=17200;
$Impot=($montant/12)*$pourcentage-($Somme_deduire/12);
$Impot = number_format($Impot,2,'.','');
}
if($montant>180000){
$pourcentage=8/100;
$Somme_deduire=24400;
$surplus=$montant-180000;
$Impot_surplus=($surplus/12)*$pourcentage-($Somme_deduire/12);
$Impot=($montant/12)*(34/100)-(17200/12)+$Impot_surplus;
$Impot = number_format($Impot,2,'.','');
}
$montant=$montant/12;
$montant= number_format($montant,0,'',' ');
$_SESSION['montant']=$montant;
$_SESSION['Impot']=$Impot;
?>
<!DOCTYPE HTML>

<html>
  
  
	<head>
		<title>jeu</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<script language="Javascript">
function verif_nombre(champ)
  {
	var chiffres = new RegExp("[0-9.]");
	var verif;
	var points = 0;
 
	for(x = 0; x < champ.value.length; x++)
	{
            verif = chiffres.test(champ.value.charAt(x));
	    if(champ.value.charAt(x) == "."){points++;}
            if(points > 1){verif = false; points = 1;}
  	    if(verif == false){champ.value = champ.value.substr(0,x) + champ.value.substr(x+1,champ.value.length-x+1); x--;}
	}
  }
</script>
					
	</head>
	<body>

	<header> 
       <div> 
          <div>                 	
              <h1><a href="index.html"><img src="" alt=""></a></h1> 
              <nav>  
                <ul class="menu">
                      
                      <li style="background: #edecec;"><a href="index.php">Jeux</a></li>
                      <li><a href="#">Score</a></li>
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
					<h2>Testez votre conscience budgétaire</h2>
				</header>
				<p>
				<?php echo "<H1>Scénario : Vous avez un salaire mensuel de ".$montant." DH net, vous avez payé environ ".$Impot." DH d’impôt.</H1>";?>
				</p>
				<footer>
					<a href="#first" class="button style2 scrolly">Commencer à jouer </a>
				</footer>
			</section>

		<!-- Feature 1 -->
		<form  action="action1.php" method="post" "> 
			<article id="first" class="container box style1 right">
				<a href="#" class="image fit"><img src="images/pic01.jpg" alt="" /></a>
				<div class="inner">
					<header>
						<h2>Question 1 :</h2> <br />
						
A votre avis, selon le budget 2015, combien de votre argent a été dépensé dans les domaines suivants
					</header>
					
					<div class="row 50%">
						<div class="6u 12u$(mobile)"> <input id="sante1" type="text" class="text" name="sante1" placeholder="Santé" value="" onkeyup="verif_nombre(this);" required/></div>
						<div class="6u$ 12u$(mobile)"><input id="education1" type="text" class="text" name="education1" placeholder="Education" value="" onkeyup="verif_nombre(this);" required/></div>
						<div class="6u 12u$(mobile)"><input id="environnement1" type="text" class="text" name="environnement1" placeholder="Envir." value="" onkeyup="verif_nombre(this);"required /></div>
						<div class="6u$ 12u$(mobile)"><input id="finance1" type="text" class="text" name="finance1" placeholder="Finances" value=""onkeyup="verif_nombre(this);" required /></div>
						<div class="6u 12u$(mobile)"><input id="defense1" type="text" class="text" name="defense1" placeholder="Défense" value="" onkeyup="verif_nombre(this);"required /></div>
						<div class="6u$ 12u$(mobile)"><input id="autres1" type="text" class="text" onFocus="remplir()" name="autres1" placeholder="Autres" readonly="readonly" onkeyup="verif_nombre(this); "required/></div>
						<script type="text/javascript">
						
							function remplir()
								{	
							var sante = parseFloat(document.getElementById("sante1").value); 
							var Education = parseFloat(document.getElementById("education1").value);
							var Environnement = parseFloat(document.getElementById("environnement1").value); 
							var Finances = parseFloat(document.getElementById("finance1").value);
							var Defense = parseFloat(document.getElementById("defense1").value); 
							var impot = <?php echo $Impot; ?>; 
							var somme = sante + Education + Environnement + Finances + Defense;
									
									var autre = impot - somme;
									
									document.getElementById("autres1").value = autre;
								}
						</script>
												
					 <section>
																								
				<footer>
					<a href="#second" class="button style2 scrolly">Veuillez continuer vers la question suivante</a>
				</footer>
			</section>
						
					</div>
				</div>
			</article>

		<!-- Feature 2 -->
			<article id="second"  class="container box style1 left">
				<a href="#" class="image fit"><img src="images/pic02.jpg" alt="" /></a>
				<div class="inner">
					<header>
						<h2> Question 2</h2><br /> 
                         Si vous étiez Ministre des finances, combien donneriez vous dans les domaines suivants 
						
					</header>
					
					<div class="row 50%">
							<div class="6u 12u$(mobile)"><input id="sante2" type="text" class="text" name="sante2" placeholder="Santé " onkeyup="verif_nombre(this);" required/></div>
						<div class="6u$ 12u$(mobile)"><input id="education2" type="text" class="text" name="education2" placeholder="Education " onkeyup="verif_nombre(this);" required/></div>
						<div class="6u 12u$(mobile)"><input id="environnement2" type="text" class="text" name="environnement2" placeholder="Envir." onkeyup="verif_nombre(this);" required/></div>
						<div class="6u$ 12u$(mobile)"><input id="finance2" type="text" class="text"name="finance2" placeholder="Finances" onkeyup="verif_nombre(this);" required/></div>
						<div class="6u 12u$(mobile)"><input id="defense2" type="text" class="text" name="defense2" placeholder="Défense" onkeyup="verif_nombre(this);" required/></div>
						<div class="6u$ 12u$(mobile)"><input id="autres2" type="text" class="text" onFocus="remplir1()" name="autres2" placeholder="Autres" readonly="readonly" onkeyup="verif_nombre(this);" required/></div>
						
						<script type="text/javascript">
						
							function remplir1()
								{	
							var sante2 = parseFloat(document.getElementById("sante2").value); 
							var Education2 = parseFloat(document.getElementById("education2").value);
							var Environnement2 = parseFloat(document.getElementById("environnement2").value); 
							var Finances2 = parseFloat(document.getElementById("finance2").value);
							var Defense2 = parseFloat(document.getElementById("defense2").value); 
							var impot = <?php echo $Impot; ?>; 
							var somme2 = sante2 + Education2 + Environnement2 + Finances2 + Defense2;

									var autre2 = impot - somme2;									
									document.getElementById("autres2").value = autre2;
								}
						</script>
						
						
						<div class="12u$">
							<ul class="actions">
								<button type="submit" class="btn btn-success" style="margin-top:30px" name="Soumettre">Soumettre</button>
							</ul>
							</form>
						</div>
					</div>
				
					</div>
			</article>

	


	

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