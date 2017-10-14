
<?php
require 'registroPOO/clsValidacion.php';
require 'registroPOO/clsUsuario2.php';
if($_POST) {

	$validar = new Validacion();

	//validamos

	$errores = array();

	if(!$validar->validarPassword($_POST['password'])) {
		$errores[] = 'El password no es valido';
	}

	if(!$validar->validarEmail($_POST['email'])) {
		$errores[] = 'El email no es valido';
	}

	if(empty($errores)) {

		$db = new PDO('mysql:host=localhost;dbname=registro',
						'root',
						'root');

		$usuario = new Usuario($db);

		$usuario->logeo($_POST);


	}

}
?>


<html>
<head>
</head>
<body>
<div style="color:red">
<?php
if(!empty($_POST)) {
foreach($errores as $e) {
	echo $e . "<br>";
}
}
?>
</div>

<form method="post">

<label>Email:</label>
<input type="text" name="email">
<br>

<label>Password:</label>
<input type="password" name="password">
<br>

<input type="submit" name="enviar" value="enviar">

</form>


</body>
</html>
