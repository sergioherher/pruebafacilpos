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
	<nav class="navbar">
		<a class="navbar-brand" href="admin_tasa">Administrar Tasa</a>
		<a class="navbar-brand" href="admin_bancos">Administrar Bancos</a>
		<a class="navbar-brand" href="#">Listado de Transacciones</a>
	</nav>

	<?php echo validation_errors(); ?>
	<?php echo form_open('admin_bancos'); ?>
		<input type="text" id="desc_banco" name="desc_banco" size="50">
		<button id="agrega_banco">Agregar Banco</button>
	</form>
	<table class="table table-dark">
	  <thead>
	    <tr>
	      <th scope="col">Descripcion del Banco</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php foreach ($bancos->result() as $banco) { ?>
	  	<tr>
	      <td scope="col"><?=$banco->desc_banco?></td>
	      <td scope="col"><button class="boton-editar" id="editar-<?=$banco->id?>"><i class="material-icons">edit</i></button></td>
	      <td scope="col"><button id="borrar-<?=$banco->id?>"><i class="material-icons">delete_forever</i></button></td>
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
    	$(".boton-editar").click(function(){
		event.preventDefault();
    		alert(this.id);
    		id_banco = this.id.split('-');
    		$.ajax({
    			type:'get',
    			url: 'index.php/editar_banco/'+id_banco[1],
    			success: function(result){
    				alert(result);
    			},
    			error: function(){

    			}
    		});
    	});
	});
</script>
</body>
</html>