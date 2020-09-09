<?php
include 'inc/conn.php';
if(isset($_POST['Enviar'])){
  /* =================Recolección datos POST======================== */
  $Usuario=$link->real_escape_string($_POST['usuario']);
  $Pass=$link->real_escape_string(md5($_POST['pass']));
  /* =============================================================== */
  /* =================Consulta DB=================================== */
  $ConsultaLogin=$link->query("SELECT * FROM usuarios WHERE usuario='$Usuario' AND pass='$Pass'");
  $LoginValido= $ConsultaLogin->num_rows;
  if($LoginValido>0){
    //Consulta a DB para información
    $RowLogin=$ConsultaLogin->fetch_array();
    //Creando SESSION
    session_start();
    $_SESSION['Nombre'] = $RowLogin['nombre'];
    $_SESSION['Zona'] =   $RowLogin['zona'];
    $_SESSION['Priv'] = $RowLogin['priv'];
    header("location: index.php");
  }else{
     /* =================Modal ERROR================================== */
    echo "<script>alert('¡Usuario y contraseña incorrecta!');</script>";
    /* =============================================================== */
  }
  /* =============================================================== */
}if(isset($_POST['Restablecer'])){
  $Correo=$link->real_escape_string($_POST['correo']);
  function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
  }
  $CheckEmail=$link->query("SELECT * FROM usuarios WHERE correo='$Correo'");
  $RowEmail=$CheckEmail->fetch_array();
  $NewPass=randomPassword();
  $NewPassMD5=md5($NewPass);
  if($CheckEmail->num_rows>0){
    $link->query("UPDATE usuarios SET pass='$NewPassMD5' WHERE correo='$Correo'");
    /*PHP Mailer*/
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->CharSet = 'UTF-8';
    $mail->Host = $smtp;
    $mail->SMTPAuth = $SMTPAuth;
    $mail->Username = $usuarioSmtp;
    $mail->Password = $contraseñaSmtp;
    $mail->SMTPSecure = $SMTPSecure;
    $mail->SMTPAuth   = true;
    $mail->Port = $port;
    $mail->setFrom('data.podd.ini@gmail.com', 'PODD Data Tracker');
    $mail->addAddress($Correo);
    $mail->Subject = "Restablecer tu contraseña";
    $mail->isHTML(true);
    $mail->Body    = '<html><head><meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        </head>
        <body style="font-size: 45px;font-family: proxima_nova_rgregular, sans-serif;font-size: 16px;line-height: 28px;">
        <!-- Middle Section -->
        <div align="center" style="border:1px,red,solid;">
        <div align="center" id="padd" style="width:515px;border-style: solid;border-color: #D5D5D5;padding:30px;background-color:#F2F2F2;" >
            <img style="margin: 0; border: 0; padding: 0; display: block;" src="https://iabcanada.com/content/uploads/2016/11/Initiative_RGB_Blue.png" width="500px" height="120">
          <div  id="division1" style="width:500px;border-style: solid;border-color: #D5D5D5;background-color:#ffffff;" align="center">
           <h2>Hola '.$RowEmail[nombre].',</h2>
           <div class="extension-desc" align="center">
            <p style="margin:0 15px;">¡Hemos recibido una solicitud para restablecer la contraseña de tu cuenta! Si no es tuya, ignora este correo electrónico.</p>
            Tu contraseña temporal es: <b>'.$NewPass.'</b>
           </div>
           </div>
           </div>
           </div>
           </body>
           </html>';
        $mail->AltBody =  "Hola $_SESSION[Nombre], Data Tracker le informa que hay un nuevo mix de medios sin revisar.";
        $mail->send();
  }
  echo "<script>alert('¡Se ha enviado un correo con tu nueva contraseña!');</script>";
}
?>
<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<meta name="msapplication-TileColor" content="#2d89ef">
		<meta name="theme-color" content="#4188c9">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<link rel="icon" href="assets/images/brand/favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="assets/images/brand/favicon.ico" />

		<!-- Title -->
		<title>HOTEL MAR DE SUEÑOS</title>

		<!--Bootstrap.min css-->
		<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

		<!-- Dashboard css -->
		<link href="assets/css/style.css" rel="stylesheet" />

		<!-- Custom scroll bar css-->
		<link href="assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

		<!-- Sidemenu css -->
		<link href="assets/plugins/toggle-sidebar/sidemenu.css" rel="stylesheet" />

		<!--Daterangepicker css-->
		<link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />

		<!-- Sidebar Accordions css -->
		<link href="assets/plugins/accordion1/css/easy-responsive-tabs.css" rel="stylesheet">

		<!-- Rightsidebar css -->
		<link href="assets/plugins/sidebar/sidebar.css" rel="stylesheet">

		<!---Font icons css-->
		<link href="assets/plugins/iconfonts/plugin.css" rel="stylesheet" />
		<link href="assets/plugins/iconfonts/icons.css" rel="stylesheet" />
		<link  href="assets/fonts/fonts/font-awesome.min.css" rel="stylesheet">

	</head>
	<body>
	    <!-- page -->
		<div class="page">

			<!-- page-content -->
			<div class="page-content">
				<div class="container text-center text-dark">
					<div class="row">
						<div class="col-lg-4 d-block mx-auto">
							<div class="row">
								<div class="col-xl-12 col-md-12 col-md-12">
									<div class="card">
										<div class="card-body">
											<div class="text-center mb-6">
												<img src="assets/images/brand/logo.jpeg" class="logo-login" alt="Logo MIA">
											</div>
											<form action="" method="POST">
												<h3>Ingresar</h3>
												<p class="text-muted">Iniciar sesión</p>
												<div class="input-group mb-3">
													<span class="input-group-addon bg-white"><i class="fa fa-user"></i></span>
													<input type="text" class="form-control" name="usuario" placeholder="Usuario" required>
												</div>
												<div class="input-group mb-4">
													<span class="input-group-addon bg-white"><i class="fa fa-unlock-alt"></i></span>
													<input type="password" class="form-control" name="pass" placeholder="Contraseña" required>
												</div>
												<div class="row">
													<div class="col-12">
														<button type="submit" class="btn btn-success" name="Enviar">Ingresar</button>
													</div>
													<div class="col-12">
														<a href="forgot-password.html" class="btn btn-link box-shadow-0 px-0">¿Olvidaste tu contraseña?</a>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- page-content end -->
		</div>
		<!-- page End-->

		<!-- Jquery js-->
		<script src="assets/js/vendors/jquery-3.2.1.min.js"></script>

		<!--Bootstrap.min js-->
		<script src="assets/plugins/bootstrap/popper.min.js"></script>
		<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!--Jquery Sparkline js-->
		<script src="assets/js/vendors/jquery.sparkline.min.js"></script>

		<!-- Chart Circle js-->
		<script src="assets/js/vendors/circle-progress.min.js"></script>

		<!-- Star Rating js-->
		<script src="assets/plugins/rating/jquery.rating-stars.js"></script>

		<!-- Sidebar Accordions js -->
		<script src="assets/plugins/accordion1/js/easyResponsiveTabs.js"></script>

		<!--Moment js-->
		<script src="assets/plugins/moment/moment.min.js"></script>

		<!-- Daterangepicker js-->
		<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

		<!-- Custom scroll bar js-->
		<script src="assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!-- Custom js-->
		<script src="assets/js/custom.js"></script>

	</body>
</html>
