<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<title>Document</title>
</head>
<body class="text-center" style='background:url(img/classroom.jpg)'>
<div class="container" style="margin-top:130px">
<center>
<form action="control.php" class="form-signin" method="POST">
  <img class="mb-4" src="img/login.png" alt="" width="100" height="100">
  <h1 class="h3 mb-3 font-weight-normal">Inicia Sesion </h1>
  <?php 
				if ($_GET){	
					if ($_GET["error"] == "si"){?> 
						<span style="color:red;backgroud-color:black"><b>Datos incorrectos</b></span>
				<?php }}else{?>
				<p colspan="2" align="center" style="color:blue;backgroud-color:blue">Introduce tu clave de acceso
				<?php } ?>
				</p>
					
  
  <input type="text" name="user" id="inputEmail" class="form-control mb-4 col-4" placeholder="Usuario" required="" autofocus="">
  
  
  <input type="password" name="pass" id="inputPassword" class="form-control mb-4 col-4" placeholder="Password" required="">
  <div class="checkbox mb-3">    
  </div>
  <button class="btn btn-lg btn-primary btn-block col-4" type="submit">Entra</button>  
</form>
</center>
</div>

		 	
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>


				
    



		
