<?php
include 'inc/conn.php';
if(isset($_POST['Agregar'])){
  /* =====================Variables POST======================== */
  $Nombre=mysqli_real_escape_string($link,$_POST['NombreU']);
  $Usuario=mysqli_real_escape_string($link,$_POST['Usuario']);
  $Pass=mysqli_real_escape_string($link,md5($_POST['Pass']));
  $Privilegio=mysqli_real_escape_string($link,$_POST['Priv']);
  $Des=$link->real_escape_string($_POST['des']);
  $Zona=$link->real_escape_string($_POST['zona']);
  if($Privilegio=="Administrador"){
    $Privilegio=0;
  }elseif ($Privilegio=="Punto de venta") {
    $Privilegio=1;
  }elseif($Privilegio=="Re-vendedor"){
    $Privilegio=2;
  }
  /* =========================================================== */
  //Insertar datos en la DB
  $link->query("INSERT INTO usuarios(usuario,pass,nombre,priv,activo,des,creador,zona,fecha_c) VALUES('$Usuario','$Pass','$Nombre','$Privilegio',0,'$Des','".$_SESSION['Nombre']."','$Zona','".date('Y-m-d H:i:s')."')");
  if($link->error){
    echo $link->error;
  }else{
    //Mostrar modal agregado correctamente
    echo "<script>swal('¡Exito!', 'Se añadió correctamente el usuario.', 'success');</script>";
  }
  /* =========================================================== */

}if(isset($_POST['Eliminar'])){
  /* =====================Consulta DB=========================== */
  mysqli_query($link,"DELETE FROM usuarios WHERE id='$_POST[Eliminar]'");
  //Mostrar modal eliminar
  echo "<script>swal('¡Exito!', 'Se eliminó correctamente al usuario.', 'success');</script>";
  /* =========================================================== */
}if(isset($_POST['ModiModal1'])){
//Consulta DB
  $QueryModal=mysqli_query($link,"SELECT * FROM usuarios WHERE id='$_POST[ModiModal]'");
  $RowModal=mysqli_fetch_array($QueryModal);
//Mostrar modal
  echo "<body onLoad=$('#myModalModi').modal('show')>";
}
if(isset($_POST['Modificar'])){
//Datos POST
  $Nombre=mysqli_real_escape_string($link,$_POST['NombreU']);
  $Usuario=mysqli_real_escape_string($link,$_POST['Usuario']);
  $Pass=mysqli_real_escape_string($link,$_POST['Pass']);
  $Privilegio=mysqli_real_escape_string($link,$_POST['Priv']);
  $Plan=$link->real_escape_string($_POST['Plan']);
  $Activo=$link->real_escape_string($_POST['activo']);
  $Des=$link->real_escape_string($_POST['des']);
  $Perfil=$link->real_escape_string($_POST['perfil']);
  if($Pass==$_POST['PassAC']){
    $Pass=$Pass;
  }else{
    $Pass=md5($Pass);
  }
  if($Privilegio=="Administrador"){
    $Privilegio=0;
  }elseif ($Privilegio=="Punto de venta") {
    $Privilegio=1;
  }elseif($Privilegio=="Re-vendedor"){
    $Privilegio=2;
  }
  //Actualizar datos
  mysqli_query($link,"UPDATE usuarios SET usuario='$Usuario',pass='$Pass',nombre='$Nombre',priv='$Privilegio',plan='$Plan',activo='$Activo',des='$Des',perfil='$Perfil' WHERE id='$_POST[Modificar]'");
  //Mostrar modal
  echo "<script>swal('¡Exito!', 'Se modificó correctamente el usuario.', 'success');</script>";
}
/* ======================Consulta DB-usuarios===================== */
if($_SESSION['Priv']==0){
  $ConsultaUsuarios=mysqli_query($link,"SELECT * FROM usuarios");
  $RowUsuarios=mysqli_fetch_array($ConsultaUsuarios);
}else{
  $ConsultaUsuarios=mysqli_query($link,"SELECT * FROM usuarios WHERE creador='".$_SESSION['Nombre']."'");
  $RowUsuarios=mysqli_fetch_array($ConsultaUsuarios);
}
?>

<!-- Modal -->
<div class="modal fade" id="myModalModi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modificar el vendedor/sucursal <b><?=$RowModal['nombre']?></b></h4>
      </div>
      <div class="modal-body">
        <form id="modal-form" action="" method="post">
         <div class="form-group">
          <label for="recipient-name" class="control-label">Nombre Sucursal/Vendedor: *</label>
          <input type="text" class="form-control" required="required" value="<?=$RowModal['nombre']?>" name="NombreU">
        </div>
        <div class="form-group">
          <label for="recipient-name" class="control-label">Usuario de la cuenta: *</label>
          <input type="text" class="form-control" required="required" value="<?=$RowModal['usuario']?>" name="Usuario">
        </div>
        <div class="form-group">
          <label for="recipient-name" class="control-label">Contraseña de la cuenta: *</label>
          <input type="password" class="form-control" required="required" value="<?=$RowModal['pass']?>" name="Pass">
        </div>
        <div class="form-group">
          <label for="recipient-name" class="control-label">Privilegio de la cuenta: *</label>
          <select class="form-control" name="Priv">
            <option value="Administrador" <?=($RowModal['priv']=='0')?'selected':'';?> >Administrador</option>
            <option value="Punto de venta" <?=($RowModal['priv']=='1')?'selected':'';?> >Punto de venta</option>
          </select>
        </div>
        <div class="form-group">
          <label for="recipient-name" class="control-label">Suspendido: *</label>
          <select class="form-control" name="activo">
            <option value="0" <?=($RowModal['activo']=='0')?'selected':'';?> >No</option>
            <option value="1" <?=($RowModal['activo']=='1')?'selected':'';?> >Si</option>
          </select>
        </div>
        <div class="form-group">
          <label for="recipient-name" class="control-label">Descuento: *</label>
          <select class="form-control" name="des">
            <option value="90" <?=($RowModal['des']=='90')?'selected':'';?> >90%</option>
            <option value="80" <?=($RowModal['des']=='80')?'selected':'';?> >80%</option>
            <option value="70" <?=($RowModal['des']=='70')?'selected':'';?> >70%</option>
            <option value="60" <?=($RowModal['des']=='60')?'selected':'';?> >60%</option>
            <option value="50" <?=($RowModal['des']=='50')?'selected':'';?> >50%</option>
            <option value="40" <?=($RowModal['des']=='40')?'selected':'';?> >40%</option>
            <option value="30" <?=($RowModal['des']=='30')?'selected':'';?> >30%</option>
            <option value="20" <?=($RowModal['des']=='20')?'selected':'';?> >20%</option>
            <option value="10" <?=($RowModal['des']=='10')?'selected':'';?> >10%</option>
            <option value="9" <?=($RowModal['des']=='9')?'selected':'';?> >9%</option>
            <option value="8" <?=($RowModal['des']=='8')?'selected':'';?> >8%</option>
            <option value="7" <?=($RowModal['des']=='7')?'selected':'';?> >7%</option>
            <option value="6" <?=($RowModal['des']=='6')?'selected':'';?> >6%</option>
            <option value="5" <?=($RowModal['des']=='5')?'selected':'';?> >5%</option>
            <option value="4" <?=($RowModal['des']=='4')?'selected':'';?> >4%</option>
            <option value="3" <?=($RowModal['des']=='3')?'selected':'';?> >3%</option>
            <option value="2" <?=($RowModal['des']=='2')?'selected':'';?> >2%</option>
            <option value="1" <?=($RowModal['des']=='1')?'selected':'';?> >1%</option>
            <option value="0" <?=($RowModal['des']=='0')?'selected':'';?> >0%</option>
          </select>
        </div>
        <br>
        <div class="form-group">
          <label for="recipient-name" class="control-label">Zona: *</label>
          <select id="zona" name="zona" class="form-control">
            <?php
            $QueryZonas=$link->query("SELECT * FROM zonas ORDER BY id DESC");
            $RowZonas=$QueryZonas->fetch_array();
            do
            {
              ?>
              <option value="<?php echo $RowZonas['nombre']?>">
                <?php echo $RowZonas['nombre']; ?>
              </option>
              <?php
            }while ($RowZonas = $QueryZonas->fetch_assoc()) ?>
          </select>
        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="text-right">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <input type="hidden" name="PassAC" value="<?= $RowModal['pass']; ?>"/>
          <button type="submit" class="btn btn-success" value="<?= $RowModal['id']; ?>" name="Modificar" value="Sign up">Modificar usuario/vendedor</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>

<!-- Tabla de usuarios -->
<div class="card">
  <div class="card-header">
    <div class="card-title">Usuarios</div>
  </div>
  <div class="card-body">
    <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-outline-success"><i class="fa fa-plus-circle"></i> Agregar nueva sucursal</a>
    <br><br>
    <div class="table-responsive">
      <form action="" method="POST">
        <table id="example" class="table table-striped table-bordered text-nowrap w-100">
          <thead>
            <tr>
              <th>Nombre Sucursal/Vendedor</th>
              <th>Usuario</th>
              <th>Privilegio</th>
              <th>Suspendido</th>
              <th>Acción</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach( $ConsultaUsuarios as $RowUsuarios => $field ) : ?> <!-- Mulai loop -->
            <tr class="text-besar">
              <td><?php echo $field['nombre']; ?></td>
              <td><?php echo $field['usuario']; ?></td>
              <td><?php if($field['priv']==1){
                echo "Punto de venta";
              }elseif($field['priv']==2){
                echo "Re-vendedor";
              }else{
                echo "Administrador";
              }
              ?></td>
              <td align="center"><?php if($field['activo']==1){
                echo "<b><div style='color:red';>Si</div></b>";
              }else{
                echo "No";
              }
              ?></td>
              <td align="center">
                <button type="submit" name="ModiModal" value="<?=$field['id'];?>" class="btn btn-app btn-primary mr-2 mt-1 mb-1"><i class="fa fa-edit"></i> Editar</a></button>
                <button type="submit" name="Eliminar" value="<?=$field['id'];?>" class="btn btn-app btn-danger mr-2 mt-1 mb-1"><i class="fa fa-trash"></i> Eliminar</a></button>
              </td>
            </tr>
            <?php endforeach; ?> <!-- Selesai loop -->
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nueva sucursal</h4>
      </div>
      <div class="modal-body">
        <form id="modal-form" action="" method="post">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Nombre Sucursal/Vendedor: *</label>
            <input type="text" class="form-control" required="required" name="NombreU">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Usuario de la cuenta: *</label>
            <input type="text" class="form-control" required="required" name="Usuario">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Contraseña de la cuenta: *</label>
            <input type="password" class="form-control" required="required" name="Pass">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Privilegio de la cuenta: *</label>
            <select class="form-control" name="Priv">
              <option>Administrador</option>
              <option>Punto de venta</option>
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Descuento: *</label>
            <select class="form-control" name="des">
              <option value="90">90%</option>
              <option value="80">80%</option>
              <option value="70">70%</option>
              <option value="60">60%</option>
              <option value="50">50%</option>
              <option value="40">40%</option>
              <option value="30">30%</option>
              <option value="20">20%</option>
              <option value="10">10%</option>
              <option value="9">9%</option>
              <option value="8">8%</option>
              <option value="7">7%</option>
              <option value="6">6%</option>
              <option value="5">5%</option>
              <option value="4">4%</option>
              <option value="3">3%</option>
              <option value="2">2%</option>
              <option value="1">1%</option>
              <option value="0">0%</option>
            </select>
            <br>
            <div class="form-group">
              <label for="recipient-name" class="control-label">Zona: *</label>
              <select id="zona" name="zona" class="form-control">
                <?php
                $QueryZonas=$link->query("SELECT * FROM zonas ORDER BY id DESC");
                $RowZonas=$QueryZonas->fetch_array();
                do
                {
                  ?>
                  <option value="<?php echo $RowZonas['nombre']?>">
                    <?php echo $RowZonas['nombre']; ?>
                  </option>
                  <?php
                }while ($RowZonas = $QueryZonas->fetch_assoc()) ?>
              </select>
            </div>
          </div>
          <div class="text-right">
            <br>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-success" name="Agregar">Agregar sucursal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
