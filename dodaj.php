<?php 
session_start();

if($_SESSION["Slogged"] != 1) header("Location: login.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$ans=$_POST;

	if (empty($ans["naslov"]))  {
        	echo "naslov nije unesen.";
		
    		}
	else if (empty($ans["opis"]))  {
        	echo "Bilješka nije unesena.";
		
    		}
	else {
		$naslov= (string)$ans["naslov"];
		$opis= (string)$ans["opis"];
		$datum = date("Y-m-d");
		$vrijeme = date("H:i");
		$username = $_SESSION["Susername"];
		$ime = $_SESSION["Sime"];
		$prezime = $_SESSION["Sprezime"];
		
		spremi($naslov,$opis,$datum,$vrijeme,$username,$ime,$prezime);
	}
}
function spremi($naslov, $opis, $datum, $vrijeme,$username,$ime,$prezime) {
	
		$file = 'podaci.xml';

		$xml = simplexml_load_file($file);
		if(!$xml) echo "Nemogu ucitati xml datoteku";
		

		$biljeska = $xml->addChild('biljeska');
		$biljeska->addChild('naslov', $naslov);
		$biljeska->addChild('datum', $datum);
		$biljeska->addChild('vrijeme', $vrijeme);
		$biljeska->addChild('username', $username);
		$biljeska->addChild('ime', $ime);
		$biljeska->addChild('prezime', $prezime);
		$biljeska->addChild('text', $opis);

		$xml->asXML($file);
		
		
		$xmlFile = 'podaci.xml';
		if( !file_exists($xmlFile) ) die('Missing file: ' . $xmlFile);
		else
		{
		  $dom = new DOMDocument('1.0');
		  $dom->preserveWhiteSpace = false;
		  $dom->formatOutput = true;
		  $dl = $dom->load($xmlFile); // remove error control operator (@) to print any error message generated while loading.
		  if ( !$dl ) die('Error while parsing the document: ' . $xmlFile);
		  $dom->save($xmlFile);
		  
		}
		header("Location: index.php");
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'head.php';?>
</head>
<body>

<nav class="navbar navbar-inverse">
	<?php $page = 'dodaj'; include 'nav.php';?>
</nav>
  
   
    <div class="container text-center"> 
    <br>
	
      <form class="form-signin col-md-4 col-md-offset-4" action="" method="post">
	  
		<div class="form-group text-center">
			<h2 class="form-signin-heading">Dodaj bilješku</h2><hr/>
		</div>
		<div class="form-group">
			<label for="opis">Naslov bilješke</label>
			<input type="text" class="form-control" placeholder="Naslov" name="naslov" required />
			<br>
		</div>
		<div class="form-group">
			<label for="opis">Unesi bilješku</label>
			<textarea class="form-control" name="opis" rows="7" id="opis"></textarea>
			<small id="opisHelp" class="form-text text-muted"></small>
		 </div>
	
			<br>
			<input name="submit" class="btn btn-large btn-primary " type="submit" value=" Pohrani ">
			</div>
		</form>
    
   
  
	<br>
	</div>
    
  
</div>

<footer class="container-fluid text-center navbar-fixed-bottom">
  <p>Footer
  </p>
</footer>

</body>
</html>
