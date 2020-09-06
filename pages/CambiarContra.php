<?php
if(empty($Flag)){
	echo "<script>window.location.replace('../../login.php');</script>";
}
include 'inc/conn.php';
/*POST*/
if(isset($_POST['Cambiar'])){
	$Pass=$link->real_escape_string($_POST['input']);
	/*Query*/
	$link->query("UPDATE usuarios SET pass='".md5($Pass)."' WHERE nombre='".$_SESSION['Nombre']."'");
	if($link->error){
		echo $link->error;
	}else{
		echo "<script>swal('¡Exito!', 'Se ha cambiado correctamente la contraseña.', 'success');</script>";
	}
}
?>
<div class="card">
	<div class="card-header">
		<div class="card-title">Cambiar contraseña</div>
	</div>
	<form action="" method="POST">
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="form-label">Contraseña</label>
						<input type="password" id="password" class="form-control" name="input" onkeyup='check();'>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label class="form-label">Confirmar contraseña</label>
						<input type="password" id="confirm_password" class="form-control" name="input2" onkeyup='check();'>
					</div>
				</div>
			</div>
			<br>
			<span id='message'></span>
			<br>
			<button type="submit" class="btn btn-success" id="submit" name="Cambiar">Cambiar</button>
		</div>
	</form>
</div>

<script type="text/javascript">
	var check = function() {
		if (document.getElementById('password').value ==
			document.getElementById('confirm_password').value) {
			document.getElementById('message').style.color = '';
		document.getElementById('message').innerHTML = '';
		document.getElementById('submit').disabled = false;
	} else {
		document.getElementById('submit').disabled = true;
		document.getElementById('message').style.color = 'red';
		document.getElementById('message').innerHTML = '¡Las contraseñas no coinciden!';
	}
}
</script>
