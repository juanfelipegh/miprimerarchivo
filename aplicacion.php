<?PHP include ("seguridad.php");?>
<html>
	<head>
		<title>Notas</title>
	</head>
	<body>
	  <h1>Bienvenido <?php echo $_SESSION["name"] . ' [ ' . $_SESSION["rol"] . ' ]';   ?></h1>
	  <br>	 
	  <br>
	 	
	 <form method="POST">
	 	<input name="nombre">
		<br><br>
		<input type="submit">
	 </form>

		<?php 

			if ($_POST) {
				$nom = $_POST['nombre'];

				$con = new mysqli('localhost', 'root', '', 'uao_usuarios');
				$sql = "INSERT INTO libros(nombre, usuario_id) 
							VALUES('$nom', '{$_SESSION['id']}')";
				$res = $con->query($sql);

				if ($res) 
					echo "Libro almacenado";
				else
					echo "Error!";
			}

		 ?>


	  <br>
	   ----
	  <br><br>
	  <a href="otra.php">Continuar</a>
	 </body>
</html>

