<?PHP include ("seguridad.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
	<title>Notas</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">Bienvenido <?php echo $_SESSION['name'];?></a>
  <?php if ($_SESSION['rol'] == "Admin"){
echo "<a class='btn btn-success' href='nuevo.php'>Nuevo</a>";
  }?>
  
  
  <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    SESION
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="salir.php">SALIR</a>    
  </div>
  
</div>
    
  
</nav>	

<div class="container tablero">
<div class="row">
	<?php 

	include('conexion.php');
	if ($_SESSION['rol'] == "Admin"){
		$sql = "SELECT * FROM notas";
	}else{
$sql = "SELECT * FROM notas WHERE id_usuario = '{$_SESSION['id']}'";}

	$res = $con->query($sql);

while($nota=$res->fetch_assoc()){
	echo "<div class='col-sm-3 nota'>
	<div class='notabody'>
	<img class='img' src='img/notas.png' >
	<p class='texto'>{$nota['texto']}</p>
	<br>";
	if  ($_SESSION['rol'] == "Admin"){
	echo "<a class='btn btn-warning' href='editar.php?id={$nota['id']}'>Editar</a>	
	<a onclick='return confirm(&#39;Está seguro de eliminar la nota&#39;)' href='eliminar.php?id={$nota['id']}' class='btn btn-danger'>Eliminar</a>
	";}
	
	echo "</div>
	</div>";

}
	?>
</div>
</div>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>  		
		$( ".row" ).sortable({
	      revert: true
	    });

		$( ".nota" ).draggable({ 
			containment: ".row", 
			scroll: true,
			cancel: ".notabody",
			connectToSortable: ".row",
		    // helper: "clone",
		    // revert: "invalid"
		});
		</script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
