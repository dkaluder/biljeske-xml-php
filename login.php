<?php
session_start();
$username="";
$password="";
if(isset($_SESSION["Slogged"])) header("Location: index.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$ans=$_POST;

	if (empty($ans["username"]))  {
        	echo "Korisnicki račun nije unesen.";
		
    		}
	else if (empty($ans["password"]))  {
        	echo "Lozinka nije unesena.";
		
    		}
	else {
		$username= $ans["username"];
		$password= $ans["password"];
	
		provjera($username,$password);
	}
}


function provjera($username, $password) {
	

	$xml=simplexml_load_file("users.xml");
	
	
	foreach ($xml->user as $usr) {
  	 	$usrn = $usr->username;
		$usrp = $usr->password;
		$usrime=$usr->ime;
		$usrprezime=$usr->prezime;
		if($usrn==$username){
			if($usrp == $password){
				$_SESSION["Slogged"] = 1;
				$_SESSION["Susername"] = (string)$usr->username;
				$_SESSION["Sime"] = (string)$usr->ime;
				$_SESSION["Sprezime"] = (string)$usr->prezime;;
				session_write_close();
				header("Location:index.php");
				die();
				}
			else{
				echo "Netocna lozinka";
				
				}
			}
		}
		
	echo "Korisnik ne postoji.";
	
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<?php  include 'head.php';?>
	<style>
		
	</style>
</head>
<body id = "login">

<nav class="navbar navbar-inverse">
	<?php $page = 'login'; include 'nav.php';?>
</nav>
<div class="container ">  

    
      <form class="form-signin col-md-4 col-md-offset-4" action="" method="post">
		<div class="form-group">
			<h2 class="form-signin-heading text-center">Sign In.</h2><hr/>
		</div>
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Username" name="username" required />
		</div>
		<div class="form-group">
			<input type="password" class="form-control" placeholder="Password" name="password" required />
			<hr />
			<input name="submit" class="btn btn-large btn-primary" type="submit" value=" Login ">
		</div>	
		</form>
    
   
  </div>


<footer class="container-fluid text-center navbar-fixed-bottom">
  <p>Footer Text</p>
</footer>

</body>
</html>



