<!DOCTYPE html>

<html>
	<head>
		<title>hamburgueria</title>
		<meta charset="UTF-8" />
		<link class="src-styles" rel="stylesheet" href="<?php echo $styles?>" />
		<link rel="stylesheet" href="<?php echo $stylesBurguer?>" />
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $iconeBurguer?>"/>
		<meta name="author" content="Daniel Guimarães" />
		
	</head>
	<body>
		<header>
		<div align="center"><img src="<?php echo $imgHeader?>"  />
		<div id="login">
			<?php  if(isset($_SESSION['usuario'])){
				
			?>	
			<a class="login-logout" href="/Hamburgueria/includes/logout.php">Logout</a>
			<?php
			}
			else {

					?>
			<a class="login-logout" href="login.php">Login</a>
			<?php  } 
						?>
			
			
			
			
		</div></div>
		
		</header>
