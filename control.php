<?PHP
	session_start();

	include("conexion.php");

	$email = $_POST['user'];

	$pass = md5( $_POST['pass'] );

	$sql = "SELECT * FROM usuarios WHERE user = '$email' AND password = '$pass'";	

	$res = $con->query($sql);


	//vemos si el usuario y contrase�a es v�lido
	if ($res->num_rows > 0){	
	
		$user = $res->fetch_assoc();

		//usuario y contrase�a v�lidos - Crear variable para la sesi�n
		$_SESSION["autentificado"]= "si";
		
		$_SESSION["id"] = $user['id'];
		$_SESSION["name"] = $user['nombre'];
		$_SESSION["email"] = $user['user'];

		$sql = "SELECT nombre FROM roles WHERE id = ".$user['id_rol'];
		$res = $con->query($sql);
		$rol = $res->fetch_assoc();

		 $_SESSION["rol"] = $rol['nombre'];

		header ("Location: notas.php");	
	}else {
		//si no existe, ir a la P�gina de Inicio
		header("Location: index.php?error=si");
	}
?>

