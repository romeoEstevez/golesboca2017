


<!DOCTYPE html>
<html>
<head>
<?php
include "head.php";
?>
</head>
<body>
  <div class="container">
    <?php
    include "header.php";

require 'registroPOO/clsValidacion.php';
require 'registroPOO/clsUsuario.php';

if($_POST) {

	$validar = new Validacion();

	//validamos

	$errores = array();

	if(!$validar->validarEmail($_POST['email'])) {
		$errores[] = 'El email no es valido';
	}

	if(!$validar->validarPassword($_POST['password'])) {
		$errores[] = 'El password no es valido';
	}

	if(!$validar->validarUsuario($_POST['usuario'])) {
		$errores[] = 'El usuario no es valido';
	}

	// $dsn = 'mysql:host=localhost;dbname=peliculas_clase_4;charset=utf8mb4;port:3307';
	// $username = 'root';
	// $password = 'root';
	// try {
	//     $pdo = new PDO($dsn, $username, $password);
	// } catch (PDOException $e) {
	//   echo $e->getMessage();
	// }


	if(empty($errores)) {

		$db = new PDO('mysql:host=localhost;dbname=registro',
						'root',
						'root');

		$usuario = new Usuario($db);

		$idusuario = $usuario->registrarUsuario($_POST);

    // header('location:/loginpoo-2.php');

		echo "el id unico es " . $idusuario;

		die('. Ya lo hemos registrado');
	}

}
?>

<div style="color:red">
<?php
if(!empty($_POST)) {
foreach($errores as $e) {
	echo $e . "<br>";
}
}
?>
</div>
<!-- Viejo form  -->

<!-- <form method="post">
<label>Usuario:</label>
<input type="text" name="usuario">
<br>
<label>Email:</label>
<input type="text" name="email">
<br>
<label>Password:</label>
<input type="password" name="password">
<br>
<input type="submit" name="enviar" value="enviar">

</form>
</div> -->


<script>


function validateform(){
  // var name=document.miformulario.usuario.value;
  // var pass=document.miformulario.password.value;
// var password=document.myform.password.value;
// console.log(name);
// console.log("asd");
// errores=0;
// if (name==null || name==""){
//   alert("Usuario can't be blank");
//   errores++;
// }else if(name.length<6){
//   alert("Usuario must be at least 6 characters long.");
//   errores++;
// }



// Validate User
var name = document.miformulario.usuario.value;
console.log(name);
errores=0;
if (name=="" || name==null) {
  alert("Por favor completa el usario");
errores++;} else {
}
if(name.length<6){ alert("Usuario tiene que tener por lo menos 6 caracteres.");
errores++;};

// Validate pass
var pass = document.miformulario.password.value;
console.log(pass);
errores=0;
if (pass=="" || pass==null) {
  alert("Por favor completa la contraseña");
errores++;} else {
}
if(pass.length<8){ alert("la constraseña tiene que tener por lo menos 8 caracteres.");
errores++;};
// Validate si la pass es igual
var pass2 = document.miformulario.password2.value;
if (pass == pass2) {
} else {
  alert("las constraseñas no coinciden.");
  errores++;
}



    // Validate Email
    var email = document.miformulario.email.value;
    if (email=="" || email==null) { alert("Por favor completa el mail");
  errores++;} else {
    }
    if ((/(.+)@(.+){2,}\.(.+){2,}/.test(email)) || email=="" || email==null) { } else {
        alert("Por favor pone un mail valido")
        errores++;;
    }
    // return false;




if (errores > 0) {
  console.log("no submiteo");

} else {
    console.log(" submiteo");
  document.miformulario.submit();

}



}
</script>



<!-- Formulario de bootstrap  -->
<form class="form-horizontal" method="post" name="miformulario">
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label">Email:</label>
		<div class="col-sm-10">
			<input type="email" class="form-control" id="inputEmail3"  name="email">
		</div>
	</div>
	<div class="form-group">
    <label for="inputUsuario" class="col-sm-2 control-label">Usuario:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputUsuario"  name="usuario">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Contraseña:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3"  name="password">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword4" class="col-sm-2 control-label">
      Repetir Contraseña:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword4"  name="password2">
    </div>
  </div>
  <!-- <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div> -->
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="button" class="btn btn-default" name="enviar" value="enviar" onclick="validateform()" >Registraté</button>
    </div>
  </div>
</form>




<?php
include "footer.php"
?>

</body>
</html>
