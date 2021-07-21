<?php
session_start();
/* =================Recolección datos POST MIKROTIK=============== */
if(isset($_POST['mac'])){
  $_SESSION['Mac']=$_POST['mac'];
}else{
  echo "<script>alert('¡Vuelva a conectarse a la red inalambrica!');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta http-equiv="pragma" content="no-cache" />
  <meta http-equiv="expires" content="-1" />  
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0" />
  <link rel="stylesheet" href="login.css" media="screen">
</head>
<body class='login' id="login">
  <div style="margin:0;padding:50;display:inline"></div>
  <center>
    <div id="head">
      <img id="logo" src="logo.png"/> </div>
      <legend>
        <p>HOTEL MAR DE SUEÑOS</p>
      </legend>
      <div id="box">
        <div><input id="Pin" autocomplete="off" name="Pin" type="text" placeholder="PIN"/></div><br>
        <div><input id="boton" name="submit" type="submit" onclick="Login();"  value="" /></div>
      </div>
    </center>
  </body>
</div>
</html>
<script src="sweetalert2@9.js"></script>
<script src="jquery-3.5.1.min.js"></script>
<script type="text/javascript">
  /*Funcion Error*/
  function Error() {
    Swal.fire({icon: 'error', title: 'Oops...',text: '¡Ocurrió un error con la red, desconectese e intentalo de nuevo!'});
    $('#boton').hide();
  }
  /*Funcion Login*/
  function Login(){
    let Pin = $('#Pin').val();
    let Mac = "<?php if(isset($_SESSION['Mac'])){echo $_SESSION['Mac'];}else{echo "NA";} ?>";
    if(Pin!==""){
      Swal.showLoading()
      $.ajax({
        type:'POST',
        url:'Api/ProcesarLogin.php',
        data:{'Pin':Pin,'Mac':Mac},
        dataType: 'json',
        success:function(Response){
          Swal.close();
          if(Response.Estado=="OK"){
            let timerInterval
            Swal.fire({
              icon:  'success',
              title: '¡Exito!',
              html: '¡Empezarás a navegar en breve',
              timer: 2000,
              timerProgressBar: true,
              onBeforeOpen: () => {
                Swal.showLoading()
                timerInterval = setInterval(() => {
                }, 100)
              },
              onClose: () => {
                clearInterval(timerInterval)
              }
            }).then((result) => {
              if (result.dismiss === Swal.DismissReason.timer) {
                window.location.href = 'https://www.google.com';
              }
            })
          }else{
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: Response.Error
            })
          }

        }
      });
    }else{
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "¡Los campos no deben estar vacios!"
      })
    }
  }
</script>