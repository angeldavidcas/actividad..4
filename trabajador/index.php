<?php
include('../config/config.php'); /* Conexion de la config */
include('trabajador.php'); /* Conexion de las recetas */

$p= new trabajador(); /* Llamo toda la clase que tienes mis recetas o funciones */
$todosRegistros= $p->getAll(); /* Traigame la funcion ver todos los usuarios */

if(isset($_GET['id']) && !empty($_GET['id'])){
    $borrar= $p->delete($_GET['id']);

    if($borrar){ /* SI SE BORRA */
        header('Location'. ROOT . 'trabajador/index.php'); /* QUE SE ACTUALIZA LISTA */
    }else{ /* SINO SE BORRA QUE ME MUESTRE QUE HUBO UN ERROR */
        $mensaje= "<div class='alert-danger' rol='alert'>Error al eleminar </div>";
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
    <?php include('../menu.php'); ?>

    <div class="container">
        <h3>Lista de pacientes</h3>

        <div class="row">
            <?php
            while ($usuarios= mysqli_fetch_object($todosRegistros)){
                echo "<div class='col-6'>";
                echo "<div class='border border-info p-2'>";
                echo "<h5><img src='".ROOT."/images/$usuarios->imagen' width='50' height ='50' /> Nombre: $usuarios->nombre $usuarios->apellidos  </h5>";
                echo "<p><b>Correo:</b> $usuarios->email 
                <br>
                <b> Enfermedades: </b>  $usuarios->enfermedades
                </p>";
                echo " <p> <b>Fecha:</b> ".date("D", strtotime($usuarios->fecha)) . " " . date("d-M-Y H:i", strtotime($usuarios->fecha)). " </p> ";

                echo "<div class='center'> <a class='btn btn-success' href='". ROOT ."/trabajador/edit.php?id=$usuarios->id' >Modificar</a> - <a class='btn btn-danger' href='". ROOT ."/trabajador/index.php?id=$usuarios->id' >Eliminar</a> </div>";

                echo "</div>";
                echo "</div>";
            }

            ?>

        </div>
    </div>
    


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>