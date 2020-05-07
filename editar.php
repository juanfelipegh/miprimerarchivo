<?php include ('seguridad.php')?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body class="mt-5">

	<?php 

		include ('conexion.php');
		$id_nota = $_GET['id'];

		if ($_POST) {
			$texto = $_POST['texto'];
            $prioridad = $_POST['prioridad'];
            $id_usuario = $_POST['id_usuario'];
			$sql = "UPDATE notas SET texto = '$texto', prioridad = '$prioridad', id_usuario = '$id_usuario' WHERE id = $id_nota";
			$result = $con->query( $sql );	

			if ($result) 
				header('location: notas.php');
			
			echo "<p>Error!</p> <a href='notas.php'>Volver</a>";

		}else{
			$sql = "SELECT * FROM notas WHERE id = $id_nota";
			$result = $con->query( $sql );	
            $nota = $result->fetch_assoc();
            
		}
	?>

	<div class="container">
		<div>
			<a href="nuevo.php" class="btn btn-primary float-right"> Nuevo</a>
			<a href="index.php" class="btn btn-info float-right mr-2"> Volver</a>
			<h1> Editor notas </h1>
		</div>
		
		<hr>
		<div>
			
        <form method="POST">
            <div class="form-group">    
            <textarea class="form-control" id="exampleFormControlTextarea1" name="texto" rows="3" placeholder="">
            <?= $nota['texto'] ?>
            </textarea>
            </div>				
            <input class="form-control" name="prioridad" placeholder="<?= $nota['prioridad'] ?>" autofocus required>
            <br>
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