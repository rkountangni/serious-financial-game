<?php  
ini_set('display errors','On');
error_reporting (E_ALL| E_STRICT);
?>
<?php
@session_start();
$pourcentage_Reussite=$_SESSION['pourcentage_Reussite'];


// Create connection
try
{
	$conn = new PDO('mysql:host=localhost;dbname=base;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}


 
$sql = "SELECT pourcentage  FROM score ";
$sql1 = "SELECT pourcentage  FROM score WHERE pourcentage>=0  and pourcentage<=24.9";
$sql2 = "SELECT pourcentage  FROM score WHERE pourcentage>=25  and pourcentage<=49.9";
$sql3 = "SELECT pourcentage  FROM score WHERE pourcentage>=50  and pourcentage<=74.9";
$sql4 = "SELECT pourcentage  FROM score WHERE pourcentage>=75 and pourcentage<=99.9";
$sql5 = "SELECT pourcentage  FROM score WHERE pourcentage>=99.9 and pourcentage<=100";
$result = $conn->query($sql);
$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);
$result3 = $conn->query($sql3);
$result4 = $conn->query($sql4);
$result5 = $conn->query($sql5);
$nombreTotal = $result->rowCount();
$nombre1 = $result1->rowCount();
$nombre2 = $result2->rowCount();
$nombre3 = $result3->rowCount();
$nombre4 = $result4->rowCount();
$nombre5 = $result5->rowCount();



?>
<?php
$Statistique1=round(($nombre1/$nombreTotal)*100);
$Statistique2=round(($nombre2/$nombreTotal)*100);
$Statistique3=round(($nombre3/$nombreTotal)*100);
$Statistique4=round(($nombre4/$nombreTotal)*100);
$Statistique5=round(($nombre5/$nombreTotal)*100);


?>


<html>
  
  
	<head>
		<title>jeu</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8">
		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/js.js"></script>
		<script src="http://code.highcharts.com/modules/data.js"></script>
		<script src="http://code.highcharts.com/modules/drilldown.js"></script>
		
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	

  
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/main.css" />


		

  <style type="text/css">
.table {
    width: 100%;
    max-width: 100%;
    margin-bottom: 20px;
    color: white;
}
h2{
	color:white;
}

.button{
    font-size: 16px;
    margin-bottom: 10px;
    margin-top: 44px;

  </style>
</head>
	<body>

	<header> 
       <div> 
          <div>                 	
              <h1><a href="index.html"><img src="" alt=""></a></h1> 
              <nav>  
                <ul class="menu">
                      
                      <li><a href="index.php">Jeux</a></li>
                      <li><a href="#">Score</a></li>
                      <li style="background: #edecec;"><a href="meilleur.php">Meilleur Score</a></li>
                  </ul>
              </nav>
              <div class="clear"></div>
          </div>
      </div>
</header>

<!-- Banner -->
			<section id="banner">
				<header>
					<h2>Meilleur Score:</h2>
				</header>
		<?php		 
			 	if($pourcentage_Reussite>=0 && $pourcentage_Reussite<=24.9) 

{
echo"Vous êtes dans l"."' intervalle:[0% - 24.9%] ";
}

if($pourcentage_Reussite>=25 && $pourcentage_Reussite<=49.9) 

{
echo"Vous êtes dans l"."' intervalle:[25% - 49.9%]";
}

if($pourcentage_Reussite>=50 && $pourcentage_Reussite<=74.9) 

{
echo"Vous êtes dans l"."' intervalle:[50% - 74.9%] ";
}

if($pourcentage_Reussite>=75 && $pourcentage_Reussite<=99.9) 

{
echo"Vous êtes dans l"."' intervalle:[75% - 99.9%]";
}

if($pourcentage_Reussite>=99.9 && $pourcentage_Reussite<=100) 

{
echo"Vous êtes dans l"."' intervalle:[100%] ";
}


?>
			
				
			</section>
		  <div class="container">



<table class="table" class="table">

<h2>Table des statistiques</h2>

<tr>
    <th>Intervalle</th>
    <th>Pourcentage des personnes ayant joué</th>
</tr>

<tr>
    <td>0% - 24.9%</td>
    <td>
<?php

echo $Statistique1.'%';

?>
</td></tr>

<tr>
    <td>25% - 49.9</td>
    <td>
<?php

echo $Statistique2.'%';
?>
</td></tr>

<tr>
    <td>50% - 74.9% </td>
    <td>
<?php
echo $Statistique3.'%';
?>
</td></tr>

<tr>
    <td>75% - 89% </td>
    <td>
<?php
echo $Statistique4.'%';
?>
</td></tr>

<tr>
    <td>90% - 100% </td><td>
<?php
echo $Statistique5.'%';

?>
</td></tr>



<?php 



$conn=null;








?>
</table>

	<section>
	

	<h2>Histogramme des statistiques</h2>	

	
	
        <script type="text/javascript">
$(function () {
    // Create the chart
    $('#cont').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Statistiques : le nombre de personnes ayant joué '
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'le nombre de personnes ayant joué'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },

        series: [{
            name: "Intervalle",
            colorByPoint: true,
            data: [{
                name: "[0% - 24.9%]",
                y: <?php echo   $Statistique1;   ?>,
                drilldown: "Microsoft Internet Explorer"
            }, {
                name: "[25% - 49.9]",
                y: <?php echo   $Statistique2;   ?>,
                drilldown: "[50% - 74.9%]"
            }, {
                name: "[50% - 74.9% ]",
                y: <?php echo   $Statistique3;   ?>,
                drilldown: "Firefox"
            },{
                name: "[75% - 89%]",
                y: <?php echo   $Statistique4;   ?>,
                drilldown: "Firefox"
            },{
                name: "[90% - 100%]",
                y: <?php echo   $Statistique5;   ?>,
                drilldown: "Firefox"
            }
			
			]
        }],
    });
});
	</script>
 <div id="cont" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
	<div>
	<a type="button" href="https://www.facebook.com/sharer/sharer.php?u=mundiapolis.ma" target="_blank" class="button style2 scrolly" value="Partager sur facebook !" style="font-size:large" >Partager sur facebook !</a>
	
</div>

    </section>
	
	


	</div>

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

		

	</body>
</html>
