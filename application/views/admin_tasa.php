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
	<h2>Gestionar Tasa</h2>
	<?php echo validation_errors(); ?>
	<?php 
		$attributes = array('id' => 'formulario_descripcion_tasa');
		echo form_open('admin_tasa',$attributes); ?>
		<div class="form-group">
			    <label for="tasa">Tasa de Conversión</label>
			    <input type="text" class="form-control" name="tasa" id="tasa">
		</div>
		<div class="form-check form-check-inline">
			    <input name="tipo_transacc" value="0" checked="checked" type="radio" class="form-check-input" id="compra">
			    <label class="form-check-label" for="compra">Compra</label>
		</div>
		<div class="form-check form-check-inline">
			    <input name="tipo_transacc" value="1" type="radio" class="form-check-input" id="venta">
			    <label class="form-check-label" for="venta">Venta</label>
		</div>
		<input type="hidden" id="tasa-agrega_o_edita" name="tasa-agrega_o_edita" value="0">
		<input type="hidden" id="id_tasa_a_enviar" name="id_tasa_a_enviar">
		<button id="agrega_tasa">Agregar Tasa</button>
	</form>
	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th colspan="3" scope="col">Tasa para el dia</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php foreach ($tasas->result() as $tasa) { ?>
	  	<tr id="fila_tasa-<?=$tasa->id?>">
	      <td scope="col"><div id="tasa-<?=$tasa->id?>"><?=$tasa->tasa?></div></td>
	      <td scope="col"><div id="tasa-created_at-<?=$tasa->id?>"><?=$tasa->created_at?></div></td>
	      <td scope="col"><div id="tasa-tipo_transacc-<?=$tasa->id?>"><?=($tasa->tipo_transacc==0)?"Compra":"Venta"?></div></td>
	      <td scope="col"><button type="button" class="btn btn-warning boton-editar" id="editar-<?=$tasa->id?>"><i class="material-icons">edit</i></button></td>
	      <td scope="col"><button type="button" class="btn btn-danger boton-borrar" id="borrar-<?=$tasa->id?>"><i class="material-icons">delete_forever</i></button></td>
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
	if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }

	$( document ).ready(function() {
		$("#agrega_tasa").click(function(){
			event.preventDefault();
			if ($("#tasa-agrega_o_edita").val()==0) {
				$("#formulario_descripcion_tasa").submit();
			}
			else {
				$("#tasa-agrega_o_edita").val(0);
				id_tasa_a_enviar = $("#id_tasa_a_enviar").val()
	    		tasa = $("#tasa").val();
	    		tipo_transacc = $("input[type=radio][name=tipo_transacc]:checked").val();
	    		alert(tipo_transacc);
	    		$.ajax({
	    			type:'get',
	    			url: 'editar_tasa/'+id_tasa_a_enviar,
	    			data: {'tasa':tasa,'tipo_transacc':tipo_transacc},
	    			success: function(result){
	    				var obj = $.parseJSON(result);
	    				var tipo_transacc = ((obj['tipo_transacc']==0)?"Compra":"Venta");
	    				$("#tasa-"+obj['id_tasa']).html(obj['tasa'])
	    				$("#tasa-tipo_transacc-"+obj['id_tasa']).html(tipo_transacc);
	    				$("#agrega_tasa").text("Agregar Tasa");
						$("#tasa").val("");
	    			},
	    			error: function(result){
	    				alert("Error: "+result);
	    			}
	    		});
			}

		});

		$(".boton-borrar").click(function(){
			event.preventDefault();
			id_tasa = this.id.split('-');
			$.ajax({
	    			type:'get',
	    			url: 'borrar_tasa/'+id_tasa[1],
	    			success: function(result){
	    				var obj = $.parseJSON(result);
	    				$("#fila_tasa-"+obj['id_tasa']).remove();
	    			},
	    			error: function(result){
	    				alert("Error al borrar");
	    			}
	    	});
		});

    	$(".boton-editar").click(function(){
			event.preventDefault();
    		id_tasa = this.id.split('-');
    		$("#tasa-agrega_o_edita").val(1);
    		$("#id_tasa_a_enviar").val(id_tasa[1]);
			$("#tasa").val($("#tasa-"+id_tasa[1]).html());
			$("#agrega_tasa").text("Editar Tasa");
			if($("#tasa-tipo_transacc-"+id_tasa[1]).html() == "Compra") {
				$("#compra").prop("checked", true);
			}
			else {
				$("#venta").prop("checked", true);
			}
    	});
	});
</script>
</body>
</html>