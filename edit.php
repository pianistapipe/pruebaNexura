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
	<title>Datos de empleados</title>

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
			<h2>Datos del empleados &raquo; Editar datos</h2>
			<hr />
			
			<?php
			// escaping, additionally removing everything that could be (html/javascript-) code
			$nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
			$sql = mysqli_query($con, "SELECT * FROM empleados WHERE id='$nik'");
			if(mysqli_num_rows($sql) == 0){
				header("Location: index.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
				$id		     = mysqli_real_escape_string($con,(strip_tags($_POST["id"],ENT_QUOTES)));
				$nombre		     = mysqli_real_escape_string($con,(strip_tags($_POST["nombre"],ENT_QUOTES)));
				$email	 = mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));
				$sexo	 = mysqli_real_escape_string($con,(strip_tags($_POST["sexo"],ENT_QUOTES)));
				$area_id	     = mysqli_real_escape_string($con,(strip_tags($_POST["area_id"],ENT_QUOTES)));
				$boletin		 = mysqli_real_escape_string($con,(strip_tags($_POST["boletin"],ENT_QUOTES)));
				$descripcion		 = mysqli_real_escape_string($con,(strip_tags($_POST["descripcion"],ENT_QUOTES)));
				
				
				$update = mysqli_query($con, "UPDATE empleados SET nombre='$nombre', email='$email', sexo='$sexo', area_id='$area_id', boletin='$boletin', descripcion='$descripcion', id='$id' WHERE id='$nik'") or die(mysqli_error());
				if($update){
					header("Location: edit.php?nik=".$nik."&pesan=sukses");
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
			}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">id</label>
					<div class="col-sm-2">
						<input type="text" name="id" value="<?php echo $row ['id']; ?>" class="form-control" placeholder="NIK" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Nombre</label>
					<div class="col-sm-4">
						<input type="text" name="nombre" value="<?php echo $row ['nombre']; ?>" class="form-control" placeholder="Nombre" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">email</label>
					<div class="col-sm-4">
						<input type="text" name="email" value="<?php echo $row ['email']; ?>" class="form-control" placeholder="email" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">sexo</label>
					<div class="col-sm-4">
						<input type="text" name="sexo" value="<?php echo $row ['sexo']; ?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Area</label>
					<div class="col-sm-3">
						<textarea name="area_id" class="form-control" placeholder="area_id"><?php echo $row ['area_id']; ?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Descripcion</label>
					<div class="col-sm-3">
						<input type="text" name="descripcion" value="<?php echo $row ['descripcion']; ?>" class="form-control" placeholder="Teléfono" required>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
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