<?php
include('../config/config.php');
include('trabajador.php');
$p = new trabajador();
$data = mysqli_fetch_object($p->getOne($_GET['id']));
$date = new DateTime($data->fecha);

if (isset($_POST) && !empty($_POST)){
  $_POST['imagen'] = $data->imagen;
  if ($_FILES['imagen']['name'] !== ''){
    $_POST['imagen'] = saveImage($_FILES);
  }
  $update = $p->update($_POST);
  if ($update){
    $error = '<div class="alert alert-success" role="alert">Modificado correctamente</div>';
  }else{
    $error = '<div class="alert alert-danger" role="alert" > Error al modificar  </div>';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<?php include('../menu.php') ?>

<?php
    if (isset($error)){
      echo $error;
    }
    ?>
<!-- CREAN FORMULARIO -->
<form method="POST" enctype="multipart/form-data" class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Nombres</label>
    <input type="text" name="nombre" id="nombre" value="<?= $data->nombre ?>"  class="form-control" >
    <input type="hidden" name="id" id="id" value="<?= $data->id ?>" />
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Apellidos</label>
    <input type="text" name="apellidos" id="apellidos"  class="form-control" value="<?= $data->apellidos ?>" >
  </div>
  <div class="col-6">
    <label for="inputAddress" class="form-label">Correo</label>
    <input type="email" name="email" id="email" class="form-control"  value="<?= $data->email ?>" >
  </div>
  <div class="col-6">
  <label for="inputAddress" class="form-label">Enfermedades</label>
    <textarea name="enfermedades" id="enfermedades" placeholder=" enfermedades "class="form-control"> <?= $data->enfermedades ?> </textarea>
  </div>
  <div class="col-6">
    <label for="inputAddress" class="form-label">Duracion sesion</label>
    <input type="text" name="duracionesdeseccion" id="duracionesdeseccion" class="form-control" value="<?= $data->duracionesdeseccion ?>"   >
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Imagen</label>
    <input type="file" name="imagen" id="imagen" class="form-control">
  </div>
  <div class="col-6">
    <label for="inputAddress" class="form-label">Fecha</label>
    <input type="datetime-local" name="fecha" id="fecha" class="form-control" value="<?= $date->format('Y-m-d\TH:i') ?>"class="form-control" >
  </div>
  <div class="col-12">
    <button  class="btn btn-primary">Modificar</button>
  </div>
</form>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>