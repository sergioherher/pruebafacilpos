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

	.error {
		color:red;
	}
</style>
<body>
<header>
	<h1>Bienvenido a la página de Fácil Pagos POS</h1>
</header>
<div id="container">
	<div class="row">
		<div class="col-2">
		</div>
		<div class="col-8">
			<nav class="navbar">
				<a class="navbar-brand" href="transaccion">Listado de Transacciones</a>
				<a class="navbar-brand" href="registrar_transaccion">Registrar Transaccion</a>
				<a class="navbar-brand" href="admin_tasa">Administrar Tasa</a>
				<a class="navbar-brand" href="admin_bancos">Administrar Bancos</a>
			</nav>
			<?php 
			$attributes = array('id' => 'formulario_registrar_transaccion');
			echo form_open('registrar_transaccion',$attributes); ?>
			  <?php echo form_error('banco','<div class="error">', '</div>'); ?>
			  <div class="form-group">
			    <label for="banco">Banco</label>
				<select name="banco" id="banco" class="form-control">
					<option></option>
					<?php foreach ($bancos->result() as $banco) { ?>
					<option id="<?=$banco->id?>" value="<?=$banco->id?>"><?=$banco->desc_banco?></option>
					<?php } ?>
				</select>
			  </div>
			  <?php echo form_error('numero_cuenta','<div class="error">', '</div>'); ?>
			  <div class="form-group">
			    <label for="numero_cuenta">N° Cuenta</label>
			    <input data-validation="number" data-validation-error-msg="Debe escribir unicamente valores numericos" type="text" class="form-control" name="numero_cuenta" id="numero_cuenta" placeholder="20 digitos sin espacios ni guiones" maxlength="20">
			  </div>
			  <?php echo form_error('tipo_cuenta','<div class="error">', '</div>'); ?>
			  <div class="form-group">
			    <label for="tipo_cuenta">Tipo de Cuenta</label>
				<select name="tipo_cuenta" id="tipo_cuenta" class="form-control">
					<option></option>
					<?php foreach ($tipocuentas->result() as $tipocuenta) { ?>
					<option id="<?=$tipocuenta->id?>" value="<?=$tipocuenta->id?>"><?=$tipocuenta->desc_tipo?></option>
					<?php } ?>
				</select>
			  </div>
			  <div class="form-check form-check-inline">
			    <input name="tipo_documento" value="0" checked="checked" type="radio" class="form-check-input" id="venezolano">
			    <label class="form-check-label" for="venezolano">Venezolano</label>
			  </div>
			  <div class="form-check form-check-inline">
			    <input name="tipo_documento" value="1"type="radio" class="form-check-input" id="extranjero">
			    <label class="form-check-label" for="extranjero">Extranjero</label>
			  </div>
			  <?php echo form_error('numero_documento','<div class="error">', '</div>'); ?>
			  <div class="form-group">
			    <label for="numero_documento">Cedula de Identidad</label>
			    <input type="text" class="form-control" name="numero_documento" id="numero_documento" placeholder="">
			  </div>
			  <?php echo form_error('nombre_titular_cuenta','<div class="error">', '</div>'); ?>
			  <div class="form-group">
			    <label for="nombre_titular_cuenta">Nombre del Titular de la Cuenta</label>
			    <input type="text" class="form-control" name="nombre_titular_cuenta" id="nombre_titular_cuenta" placeholder="Igual al registrado en el banco">
			  </div>
			  <div class="form-check form-check-inline">
			    <input name="tipo_transaccion" value="0" checked="checked" type="radio" class="form-check-input" id="compra">
			    <label class="form-check-label" for="venezolano">Compra</label>
			  </div>
			  <div class="form-check form-check-inline">
			    <input name="tipo_transaccion" value="1" type="radio" class="form-check-input" id="venta">
			    <label class="form-check-label" for="venta">Venta</label>
			  </div>
			  <?php echo form_error('cantidad_pesos','<div class="error">', '</div>'); ?>
			  <div class="form-group">
			    <label for="cantidad_pesos">Pesos</label>
			    <input type="text" class="form-control" name="cantidad_pesos" id="cantidad_pesos" placeholder="$00.00">
			  	<div id="equivalente_bolivares">
				  	Esta es una prueba
				</div>
			  </div>
			  <?php echo form_error('comentario','<div class="error">', '</div>'); ?>
			  <div class="form-group">
			    <label for="comentario">Comentarios</label>
			    <input type="text" class="form-control" name="comentario" id="comentario" placeholder="">
			  </div>
			  <button type="submit" class="btn btn-primary">Registrar</button>
			</form>	
		</div>	
		<div class="col-2">
		</div>
	</div>
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>

<script type="text/javascript">
	$( document ).ready(function() {
    	$.validate();
    	$("#cantidad_pesos").keyup(function() {
  			event.preventDefault();
  			$.ajax({
  				type:"get",
  				url:"consultar_tasa",
  				success: function(result){
  					alert(result);
  					var obj = $.parseJSON(result);
  					alert(JSON.stringify(result, null, 4));
  					$("#equivalente_bolivares").val(obj['tasa'])
  				},
  				error: function() {

  				}  				
  			});
  			$("#equivalente_bolivares").val();
		});
	});
</script>
</body>
</html>