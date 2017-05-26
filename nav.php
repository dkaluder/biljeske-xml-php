
 <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Log</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li <?php echo ($page == 'login') ? "class='active'" : ""; ?>><a href="login.php">Login</a></li>
        <li <?php echo ($page == 'signup') ? "class='active'" : ""; ?>><a href="signup.php">Signup</a></li>
        <li <?php echo ($page == 'index') ? "class='active'" : ""; ?>><a href="index.php">Index</a></li>
		<li <?php echo ($page == 'dodaj') ? "class='active'" : ""; ?>><a href="dodaj.php">Dodaj bilješku</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout </a></li>
      </ul>
    </div>
  </div>