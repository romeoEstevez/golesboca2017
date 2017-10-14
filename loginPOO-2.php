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
<?php
include "head.php";
?>
</head>
<body>
  <div class="container">
<div style="color:red">
    <?php
    include "header.php";

// Viejo html
// <html>
// <head>
// </head>
// <body>
// <!-- <div style="color:red"> -->



if(!empty($_POST)) {
foreach($errores as $e) {
	echo $e . "<br>";
}
}
?>
</div>

<!-- Viejo form  -->
<!-- <form method="post">

<label>Email:</label>
<input type="text" name="email">
<br>

<label>Password:</label>
<input type="password" name="password">
<br>

<input type="submit" name="enviar" value="enviar">

</form> -->

<!-- Formulario de bootstrap  -->
<form class="form-horizontal" method="post">
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label">Email:</label>
		<div class="col-sm-10">
			<input type="email" class="form-control" id="inputEmail3"  name="email">
		</div>
	</div>

  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Contraseña:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3"  name="password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Recuerdame
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="enviar" value="enviar">Logeate</button>
    </div>
  </div>
</form>

<?php
include "footer.php"
?>

</body>
</html>
