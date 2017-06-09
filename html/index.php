<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Wear Weather</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="color/default.css" rel="stylesheet">
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>    

</head>
<body> <?php


// coneccao(); ?>
<!-- navbar -->
<div class="navbar-wrapper">
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<!-- Responsive navbar -->
				<h1 class="brand"><a href="index.php">Wear Weather</a></h1>
				<!-- navigation -->
				<nav class="pull-right nav-collapse collapse">
				<ul id="menu-main" class="nav">
					<li><a href="display.html">Display</a></li>
					<li></li>
				</ul>
				</nav>
			</div>
		</div>
	</div>
</div>
</header>
<body>
<!-- Header area -->

<div id="header-wrapper" class="header-slider">
<body>
  <div class="login-page">
  <div class="form">
	<form class="login-form" name="login-form" method="post">
	<fieldset>
	  <input type="text" placeholder="username" name="username"/>
      <input type="password" placeholder="password" name="password"/>
      <input type ='submit' value="login" name="submit_login">
      <p class="message">Not registered? <a href="#">Create an account</a></p>
	</fieldset>
    </form>
	
	
	 <!--?php
	
	// $servidor='10.2.110.81:3306';
	// $bd='wearweather';
	// $user='root';
	// $pass='root';

	// $ligacao = mysqli_connect($servidor, $user, $pass, $bd);
	// if($ligacao){ echo " ligacao sucedida";} else { echo "falha na ligacao a BD"; } -->
	
	
	
	<?php
$servername = "10.2.110.81:3306";
$username = "dolly";
$password = "password";
$dbname = "wearweather";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
//$conn=new mysqli($servername, $username, $password, $dbname);
// Check connection
if (mysqli_error($conn)){
    die("Connection failed: " .mysqli_error($conn));
} 
echo "Connected successfully <br>";

	
	
	
	
	if(isset($_POST['submit_login'])){
		echo "Bem vindo Andre, <br>";
		// $username=$_REQUEST['username'];
		// $password=$_REQUEST['password'];
		
		// $sql=mysqli_query("SELECT * FROM 'wearweather'.'user' WHERE username='abel' AND password= 'abelabel'") or die (mysqli_error());
		// //$resultado = $conn->query($sql);
		// echo $username."<br>".$password."<br>";
		
		// $num_resultados	= mysqli_num_rows($sql);
		// echo $num_resultados."<br>";
			// if($num_resultados > '0'){ 
			
				// echo "Bem Vindo user";
				// $_SESSION['userlog'] = 1; 
				header ('location:page.php');
			
			// }
			// else{
			// //header ('location:index.php');
			// echo "Nao existem users com esses dados";
			// }
	}
		
	
	?> 
	
	
	
	
	
	<form name="register-form" method="post" action="index.php" class="register-form">
	<fieldset>
      <input type="text" name="username" placeholder="username"/>
      <input type="password" name="password" placeholder="password"/>
      <input type="text" name="emailaddress" placeholder="email"/>
	  <input type="submit" name="submitcreat" value="create">
      <p class="message">Already registered? <a href="#">Sign In</a></p>
	</fieldset>
    </form>	
	
	<?php
		
	$servidor='10.2.110.81';
		$bd='wearweather';
		$user='dolly';
		$pass='password';
		$ligacao = mysqli_connect($servidor, $user, $pass, $bd);
		
	if(isset($_POST['submitcreat'])){
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['emailaddress'];
		$tbl="user";
		$query = "INSERT INTO $tbl (id, username, password, email) VALUES (NULL, '$username', '$password', '$email')";
		$resultado1 = mysqli_query($ligacao,$query);
		if($resultado1){
			echo "Registou com sucesso.<br>";
		}else{
			echo "erro ao registar.";
		}
	}?>
  </div>
</div>
</div>
<script src="js/jquery.js"></script>
<script src="js/jquery.scrollTo.js"></script>
<script src="js/jquery.nav.js"></script>
<script src="js/jquery.localscroll-1.2.7-min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/isotope.js"></script>
<script src="js/jquery.flexslider.js"></script>
<script src="js/inview.js"></script>
<script src="js/animate.js"></script>
<script src="js/validate.js"></script>
<script src="js/custom.js"></script>
<script src="js/index.js"></script>

</body>
</html>