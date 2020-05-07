<?php  include ("seguridad.php"); ?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>
<body class="mt-5">
    <?php 
    include ("conexion.php");
		if ($_GET) {
            
			$texto = $_GET['texto'];
			$prioridad = $_GET['prioridad'];
			$id_usu = $_GET['id_usuario'];					

			$sql = "INSERT INTO notas (texto,prioridad,id_usuario) 
			VALUES('$texto','$prioridad','$id_usu')";

			$result = $con->query( $sql );	

			if ($result) 
				header('location: notas.php');
			
			echo "<p>Error!</p> <a href='notas.php'>Volver</a>";

		}
	?>
	<div class="container">
		<div>			
			<a href="notas.php" class="btn btn-info float-right mr-2"> Volver</a>
			<h1> Nueva nota </h1>
		</div>		
		<hr>
		<div>			
			<form>
            <div class="form-group">    
            <textarea class="form-control" id="exampleFormControlTextarea1" name="texto" rows="3" placeholder="Ingrese texto"></textarea>
            </div>				
            <input class="form-control" name="prioridad" placeholder="Prioridad de la nota" autofocus required><br>
				<select class="form-control" name="id_usuario" required>
					<option value="" disabled selected>Seleccione...</option>
                    <?php 
                    $sql = "SELECT * FROM usuarios";        
                    $res = $con->query( $sql );
                    while ($usuarios = $res->fetch_assoc()) {
                        $usuario[] = $usuarios;
                    }
						foreach ($usuario as $usuarios){
							echo "<option value='{$usuarios['id']}'> {$usuarios['nombre']} </option>";
						}
					?>					
				</select><br>
				
				<br><br>
				<input type="submit" class="btn btn-success">
			</form>
		</div>
	</div>	
</body>
</html>