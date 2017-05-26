<?php 
session_start();
if($_SESSION["Slogged"] != 1) header("Location: login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'head.php';?>
</head>
<body>

<nav class="navbar navbar-inverse">
	<?php $page = 'index'; include 'nav.php';?>
</nav>
  
<div class="container-fluid text-center">    
	 <div class="col-sm-2 text-left">
	</div>
    <div class="col-sm-8 text-left"> 
    <br>
	<div class="row">
	<?php 
		  $xmlPodaci=simplexml_load_file("podaci.xml");
		  
			foreach ($xmlPodaci->biljeska as $unos) {
				$username = (string)$unos->username;
				$userIme=(string)$unos->ime;
				$userPrezime=(string)$unos->prezime;
				$text = (string)$unos->text;
				$naslov = (string)$unos->naslov;
				$datum = (string)$unos->datum;
				$vrijeme = (string)$unos->vrijeme;
				
				
				if($username == $_SESSION["Susername"] && $userIme == $_SESSION["Sime"] && $userPrezime == $_SESSION["Sprezime"]){
					
				echo '<div class="col-sm-4">
						<div class="panel panel-primary">
							<div class="panel-heading">'.$naslov.'</div>' ;
					
				echo '<div class="panel-body">'.$text.'</div>' ;
				echo '<div class="panel-footer">Datum: '. $datum."<br>Vrijeme: ".$vrijeme .'</div>';
				echo '</div> </div>';	
					
					
				}
			}	
			
				
				
	  ?>
		</div>
		<br>
	</div>
  
</div>



</body>
</html>
