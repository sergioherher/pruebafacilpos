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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker-standalone.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.13.1/bootstrap-table.min.css">
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
	<nav class="navbar navbar-light bg-light">
		<a class="navbar-brand" href="transaccion">Listado de Transacciones</a>
		<a class="navbar-brand" href="registrar_transaccion">Registrar Transaccion</a>
		<a class="navbar-brand" href="admin_tasa">Administrar Tasa</a>
		<a class="navbar-brand" href="admin_bancos">Administrar Bancos</a>
	</nav>

	<h2>Listado de transacciones entre fechas</h2>
	<div class="container" align="center">
		Fecha Inicial
		<input id="datepicker1" class="datepicker" type="text" name="fecha_ini">
		Fecha Final
		<input id="datepicker2" class="datepicker" type="text" name="fecha_fin">
		<button class="botonFiltrar">Filtrar</button>
	</div>
	<div class="row">
		<div class="col-12 col-sm-12	col-md-12 col-lg-12 col-xl-12">
			<table class="table table-striped"  data-toggle="table">
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
			      <td scope="col"><?=$transaccion->desc_banco?></td>
			      <td scope="col"><?=$transaccion->numero_cuenta?></td>
			      <td scope="col"><?=$transaccion->desc_tipo?></td>
			      <td scope="col"><?=$transaccion->numero_documento?></td>
			      <td scope="col"><?=($transaccion->tipo_documento == 0) ? "Venezolano" : "Extranjero"?></td>
			      <td scope="col"><?=$transaccion->nombre_titular_cuenta?></td>
			      <td scope="col"><?=$transaccion->cantidad_pesos?></td>
			      <td scope="col"><?=($transaccion->tipo_documento == 0) ? "Compra" : "Venta"?></td>
			      <td scope="col"><?=$transaccion->comentario?></td>
			      <td scope="col"><?=$transaccion->created_at?></td>
			    </tr>	
			  	<?php } ?>
			  </tbody>
			</table>
		</div>
	</div>
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.13.1/bootstrap-table.min.js"></script>


<script type="text/javascript">
	$( document ).ready(function() {
    	$('#datepicker1').datepicker({
		    format: 'yyyy-m-d'
		});
		$('#datepicker2').datepicker({
		    format: 'yyyy-m-d'
		});
		$('.botonFiltrar').click(function(){
			var fecha_ini = $('#datepicker1').val();
			var fecha_fin = $('#datepicker2').val();
			$.ajax({
				type:"get",
				data: {"fecha_ini":fecha_ini,"fecha_fin":fecha_fin},
				url:"actualizar_listado_fechas",
				success: function(result) {

				},
				error: function() {

				}
			});
			$('#datepicker1')
		});
	});
</script>
</body>
</html>