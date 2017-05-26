<?php 
session_start();
if(isset($_SESSION["Slogged"])) header("Location: index.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$ans=$_POST;

	if (empty($ans["username"]))  {
        	echo "Korisnicki račun nije unesen.";
		
    		}
	else if (empty($ans["password"]))  {
        	echo "Lozinka nije unesena.";
		
    		}
	else if (empty($ans["ime"]))  {
        	echo "Lozinka nije unesena.";
		
    		}
	else if (empty($ans["prezime"]))  {
        	echo "Lozinka nije unesena.";
		
    		}
	else {
		$username= (string)$ans["username"];
		$password= (string)$ans["password"];
		$ime = (string)$ans["ime"];
		$prezime = (string)$ans["prezime"];
		spremi($username,$password,$ime,$prezime);
	}
}
function spremi($username, $password,$ime,$prezime) {
	

	
	
		$file = 'users.xml';

		$xml = simplexml_load_file($file);
		if(!$xml) echo "nemogu ucitati xml datoteku";
		

		$user = $xml->addChild('user');
		$user->addChild('username', $username);
		$user->addChild('password', $password);
		$user->addChild('ime', $ime);
		$user->addChild('prezime', $prezime);

		$xml->asXML($file);
		
		
		$xmlFile = 'users.xml';
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
		header("Location: login.php");
}




?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'head.php';?>
	<style>
		
	</style>
</head>
<body id = "login">

<nav class="navbar navbar-inverse">
	<?php  $page = 'signup'; include 'nav.php';?>
</nav>
<div class="container ">  

    
      <form class="form-signin col-md-4 col-md-offset-4" action="" method="post">
	  
		<div class="form-group text-center">
			<h2 class="form-signin-heading">Sign Up.</h2><hr/>
		</div>
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Username" name="username" required />
		</div>
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Ime" name="ime" required />
		</div>
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Prezime" name="prezime" required />
		</div>
		<div class="form-group">
			<input type="password" class="form-control" placeholder="Password" name="password" required />
			<hr />
			<input name="submit" class="btn btn-large btn-primary " type="submit" value=" Signup ">
		</div>	
		</form>
    
   
  </div>


<footer class="container-fluid text-center navbar-fixed-bottom">
  <p>Footer Text</p>
</footer>

</body>
</html>

