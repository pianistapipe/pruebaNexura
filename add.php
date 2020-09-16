<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<!--
Project      : Datos de empleados con PHP, MySQLi y Bootstrap CRUD  (Create, read, Update, Delete) 
Author		 : Obed Alvarado
Website		 : http://www.obedalvarado.pw
Blog         : http://obedalvarado.pw/blog/
Email	 	 : info@obedalvarado.pw
-->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Latihan MySQLi</title>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-datepicker.css" rel="stylesheet">
	<link href="css/style_nav.css" rel="stylesheet">
	<style>
		.content {
			margin-top: 80px;
		}
	</style>

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<?php include("nav.php");?>
	</nav>
	<div class="container">
		<div class="content">
			<h2>Datos del empleados &raquo; Agregar datos</h2>
			<hr />

			<?php
			if(isset($_POST['add'])){
				$id	= mysqli_real_escape_string($con,(strip_tags($_POST["id"],ENT_QUOTES)));
				$nombre		     = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
				$email	 = mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));
				$sexo	 = mysqli_real_escape_string($con,(strip_tags($_POST["area_id"],ENT_QUOTES)));
				$area_id	     = mysqli_real_escape_string($con,(strip_tags($_POST["area_id"],ENT_QUOTES)));
				$boletin		 = mysqli_real_escape_string($con,(strip_tags($_POST["boletin"],ENT_QUOTES)));
				$descripcion		 = mysqli_real_escape_string($con,(strip_tags($_POST["descripcion"],ENT_QUOTES)));
				$cek = mysqli_query($con, "SELECT * FROM empleados WHERE id='$id'");
				if(mysqli_num_rows($cek) == 0){
						$insert = mysqli_query($con,"INSERT INTO empleados(id, nombre, email,sexo, area_id, boletin, descripcion)
							VALUES('$id','$nombre', '$email', '$sexo', '$area_id', '$boletin', '$descripcion')") or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
						}
					 
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. id exite!</div>';
				}
			}
			?>

			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">id</label>
					<div class="col-sm-4">
						<input type="text" name="id" class="form-control" placeholder="id" require >
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombre completo</label>
					<div class="col-sm-4">
						<input type="text" name="nombre" class="form-control" placeholder="Nombre completo" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Correo electronico</label>
					<div class="col-sm-4">
						<input type="email" name="email" class="form-control" placeholder="correo electronico" required>
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label">Sexo</label>
					<div class="col-sm-4">
						<label><input type="radio" name="sexo" enable>Femenino</label>
						<label><input type="radio" name="sexo" enable>Masculino</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Area</label>
					<div class="col-sm-4">
						<select name="area_id" class="form-control">
							<option value=""> seleccione</option>
                            <option value="1">Ventas</option>
							<option value="2">Calidad</option>
							<option value="3">Produccion</option>
							
							</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">descripcion</label>
					<div class="col-sm-4">
						<textarea name="descripcion" class="form-control" placeholder="use una descripcion"></textarea>
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label"></label>
					<div class="col-sm-4">
						<label><input type="checkbox" name="boletin" enable>Deseo recibir boletin informativo</label>
					</div>
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label">Roles*</label>
					<div class="col-sm-4">
						<label><input type="checkbox" name="" enable>Profesional de proyectos- Desarrollador</label>
					</div>
					
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label"></label>
					<div class="col-sm-4">
						<label><input type="checkbox" name="" enable>Gerente Estrategico</label>
					</div>
					
				</div>
				<div class="form-group">
				<label class="col-sm-3 control-label"></label>
					<div class="col-sm-4">
						<label><input type="checkbox" name="checkbox" enable>Auxiliar Administrativo</label>
					</div>
					
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="index.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
	$('.date').datepicker({
		format: 'dd-mm-yyyy',
	})
	</script>
</body>
</html>
