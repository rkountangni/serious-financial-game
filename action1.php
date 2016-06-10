<?php  
ini_set('display errors','On');
error_reporting (E_ALL| E_STRICT);
?>

<?php 
@session_start();
  $montant=$_SESSION['montant'];
    $Impot=$_SESSION['Impot'];
	
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=base;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

	
 
 


  $sante_1= $_POST["sante1"] ;
  $education_1 = $_POST["education1"] ;
  $environnement_1 = $_POST["environnement1"] ;
  $finance_1 = $_POST["finance1"] ;
  $defense_1 = $_POST["defense1"] ;
  $autres_1 = $_POST["autres1"] ;
 

  $sante_2= $_POST["sante2"] ;
  $education_2 = $_POST["education2"] ;
  $environnement_2 = $_POST["environnement2"] ;
  $finance_2 = $_POST["finance2"] ;
  $defense_2 = $_POST["defense2"] ;
  $autres_2 = $_POST["autres2"] ;
  
?>
<?php 



 $result = $bdd->query("Select * from budget where Date like '%2016%'");
   $sante1=0;
   $environnement1=0;
   $finance1=0;
   $defense1=0;
   $education1=0;
   $autres1=0;

while ($row = $result->fetch()) {
    $sante1=$row["sante"];
    $environnement1=$row["environnement"];
    $finance1=$row["finance"];
    $defense1=$row["defense"];
    $education1=$row["education"];
    $autres1=$row["autres"];
}

$result->closeCursor();



$reponsejuste=0;
$Sum_ecarts=0;
$pourcentage_Reussite=0;
?>



<?php     
 $Pourcentage_sante_1= ($sante_1*100)/$Impot;
 $Pourcentage_education_1= ($education_1*100)/$Impot;
 $Pourcentage_environnement_1= ($environnement_1*100)/$Impot;
 $Pourcentage_finance_1= ($finance_1*100)/$Impot;
 $Pourcentage_defense_1= ($defense_1*100)/$Impot;
  $Pourcentage_autres_1= ($autres_1*100)/$Impot;
?>





<?php
$ecart_sante1=$sante1-$Pourcentage_sante_1;
$ecart_environnement1=$environnement1-$Pourcentage_environnement_1;
$ecart_finance1=$finance1-$Pourcentage_finance_1;
$ecart_defense1=$defense1-$Pourcentage_defense_1;
$ecart_education1=$education1-$Pourcentage_education_1;
$ecart_autres1=$autres1-$Pourcentage_autres_1;
?>


<?php  

if($ecart_sante1<0){
$ecart_sante1=$ecart_sante1*(-1);
}
if($ecart_environnement1<0){
$ecart_environnement1=$ecart_environnement1*(-1);
}
if($ecart_finance1<0){
$ecart_finance1=$ecart_finance1*(-1);
}
if($ecart_defense1<0){
$ecart_defense1=$ecart_defense1*(-1);
}
if($ecart_education1<0){
$ecart_education1=$ecart_education1*(-1);
}
if($ecart_autres1<0){
$ecart_autres1=$ecart_autres1*(-1);
}


$Sum_ecarts=$ecart_sante1+$ecart_environnement1+$ecart_finance1+$ecart_defense1+$ecart_education1+$ecart_autres1;



 ?>
 
     




<?php 
$sum_users=$sante_1+$education_1+ $environnement_1+$finance_1+$defense_1+ $autres_1;
$sum_users2=$sante_2+$education_2+ $environnement_2+$finance_2+$defense_2+ $autres_2;
if($sum_users >$Impot):
 $score=0;

elseif ($sum_users==$Impot):
	 $pourcentage_Reussite=abs(100-$Sum_ecarts);
	 
	 
	 $score=1;
	 $_SESSION['pourcentage_Reussite']=$pourcentage_Reussite;
	 ob_start();
system('ipconfig /all');
$mycom=ob_get_contents();
ob_clean();
 $findme = 'physique';
$pmac = strpos($mycom, $findme);
$Adresse_Mac =substr($mycom,($pmac+28),17);
	//création de la requête SQL:
  $sql = "INSERT  INTO reponse (id_reponse,sante,education,environnement,finance,defense,autres,id_ques,date)
            VALUES ( NULL, '$sante_1','$education_1','$environnement_1','$finance_1','$defense_1','$autres_1','1',NOW()) " ;

             //création de la requête SQL:
  $sql2 = "INSERT  INTO reponse (id_reponse,sante,education,environnement,finance,defense,autres,id_ques,date)
            VALUES ( NULL, '$sante_2','$education_2','$environnement_2','$finance_2','$defense_2','$autres_2','2',NOW()) " ;
 
 
   $sql3 = "INSERT  INTO scenario (id_scenario,montant,impot)
            VALUES ( NULL, '$montant','$Impot') " ;
			
			
$sql4 = "INSERT  INTO score (id_score,pourcentage,mac_utilisateur)
            VALUES ( NULL, '$pourcentage_Reussite','$Adresse_Mac') " ;


  //exécution de la requête SQL:
  $requete = $bdd->query($sql);
  
  $requete = $bdd->query($sql2);

  $requete = $bdd->query($sql3);
  
  $requete = $bdd->query($sql4);
 
else:
$score=2;
endif;
header('Location:score1.php');
$_SESSION['score']=$score;



?>