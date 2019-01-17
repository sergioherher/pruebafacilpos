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
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
<div id="container">
	<nav class="navbar navbar-light bg-light">
		<a class="navbar-brand" href="transaccion">Listado de Transacciones</a>
		<a class="navbar-brand" href="registrar_transaccion">Registrar Transaccion</a>
		<a class="navbar-brand" href="admin_tasa">Administrar Tasa</a>
		<a class="navbar-brand" href="admin_bancos">Administrar Bancos</a>
	</nav>
	<h2>Gestionar Bancos</h2>
	<?php echo validation_errors(); ?>
	<?php 
		$attributes = array('id' => 'formulario_descripcion_banco');
		echo form_open('admin_bancos',$attributes); ?>
		<input type="text" id="desc_banco" name="desc_banco" size="50">
		<input type="hidden" id="agrega_o_edita" name="agrega_o_edita" value="0">
		<input type="hidden" id="id_banco_a_enviar" name="banco_a_enviar">
		<button id="agrega_banco">Agregar Banco</button>
	</form>
	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th colspan="3" scope="col">Descripcion del Banco</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php foreach ($bancos->result() as $banco) { ?>
	  	<tr id="fila_banco-<?=$banco->id?>">
	      <td scope="col"><div id="desc_banco-<?=$banco->id?>"><?=$banco->desc_banco?></div></td>
	      <td scope="col"><button type="button" class="btn btn-warning boton-editar" id="editar-<?=$banco->id?>"><i class="material-icons">edit</i></button></td>
	      <td scope="col"><button type="button" class="btn btn-danger boton-borrar" id="borrar-<?=$banco->id?>"><i class="material-icons">delete_forever</i></button></td>
	    </tr>	
	  	<?php } ?>
	  </tbody>
	</table>
</div>

<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


<script type="text/javascript">
	$( document ).ready(function() {
		$("#agrega_banco").click(function(){
			event.preventDefault();
			if ($("#agrega_o_edita").val()==0) {
				$("#formulario_descripcion_banco").submit();
			}
			else {
				$("#agrega_o_edita").val(0);

				id_banco = $("#id_banco_a_enviar").val()
	    		desc_banco = $("#desc_banco").val();
	    		$.ajax({
	    			type:'get',
	    			url: 'editar_banco/'+id_banco,
	    			data: {'desc_banco':desc_banco},
	    			success: function(result){
	    				var obj = $.parseJSON(result);
	    				$("#desc_banco-"+obj['id_banco']).html(obj['desc_banco'])
	    				$("#agrega_banco").text("Agregar Banco");
						$("#desc_banco").val("");
	    			},
	    			error: function(result){
	    				alert("Error: "+result);
	    			}
	    		});
			}

		});

		$(".boton-borrar").click(function(){
			event.preventDefault();
			id_banco = this.id.split('-');
			$.ajax({
	    			type:'get',
	    			url: 'borrar_banco/'+id_banco[1],
	    			success: function(result){
	    				var obj = $.parseJSON(result);
	    				$("#fila_banco-"+obj['id_banco']).remove();
	    			},
	    			error: function(result){
	    				alert("Error al borrar");
	    			}
	    	});
		});

    	$(".boton-editar").click(function(){
			event.preventDefault();
    		id_banco = this.id.split('-');
    		$("#agrega_o_edita").val(1);
    		$("#id_banco_a_enviar").val(id_banco[1]);
			$("#desc_banco").val($("#desc_banco-"+id_banco[1]).html());
			$("#agrega_banco").text("Editar Banco");
    	});
	});
</script>
</body>
</html>