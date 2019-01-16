<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Pagina de Transacciones de Facil POS</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker-standalone.css">

	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

</head>
<style type="text/css">
	body{
		font-family: 'Roboto', sans-serif;
	}
</style>
<body>
<header>
	<h1>Bienvenido a la página de Fácil Pagos POS</h1>
</header>
<div id="container-fluid">
	<nav class="navbar">
		<a class="navbar-brand" href="transaccion">Listado de Transacciones</a>
		<a class="navbar-brand" href="registrar_transaccion">Registrar Transaccion</a>
		<a class="navbar-brand" href="admin_tasa">Administrar Tasa</a>
		<a class="navbar-brand" href="admin_bancos">Administrar Bancos</a>
	</nav>

	<h2>Listado de transacciones entre fechas</h2>
	<div align="center">
		Fecha Inicial
		<input id="datetimepicker1" class="datetimepicker" type="text" name="fecha_ini">
		Fecha Final
		<input id="datetimepicker2" class="datetimepicker" type="text" name="fecha_fin">
		<button class="botonFiltrar">Filtrar</button>
	</div>
	<div class="row">
		<div class="col-12 col-sm-12	col-md-12 col-lg-12 col-xl-12">
			<table class="table table-striped">
			  <thead>
			    <tr>
			      <th scope="col">Banco</th>
			      <th scope="col">Nro Cuenta</th>
			      <th scope="col">Tipo de Cuenta</th>
			      <th scope="col">CI</th>
			      <th scope="col">Venezolano o Extranjero</th>
			      <th scope="col">Nombre del titular</th>
			      <th scope="col">Pesos</th>
			      <th scope="col">Compra o Venta</th>
			      <th scope="col">Comentario</th>
			      <th scope="col">Fecha/Hora de Transaccion</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php foreach ($transacciones->result() as $transaccion) { ?>
			  	<tr>
			      <td scope="col"><?=$transaccion->banco?></td>
			      <td scope="col"><?=$transaccion->numero_cuenta?></td>
			      <td scope="col"></td>
			      <td scope="col">CI</td>
			      <td scope="col">Venezolano o Extranjero</td>
			      <td scope="col">Nombre del titular</td>
			      <td scope="col">Pesos</td>
			      <td scope="col">Compra o Venta</td>
			      <td scope="col">Comentario</td>
			      <td scope="col"><?=$transaccion->created_at?></td>
			    </tr>	
			  	<?php } ?>
			  </tbody>
			</table>
		</div>
	</div>
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>


<script type="text/javascript">
	$( document ).ready(function() {
    	$('#datetimepicker1').datetimepicker({
		    format: 'dd/MM/yyyy hh:mm:ss'
		});
		$('.botonFiltrar').click(function(){
			
		});
	});
</script>
</body>
</html>