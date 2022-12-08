<?php
include('../config/config.php'); /* LLAMAMOS CONFIG DE URLS */
include('../config/database.php'); /* CONEXION A LA BD */


class trabajador{
    public $conexion; /* LLAMO LA CONEXION DE MI BASE DE DATOS */

    function __construct(){
        $db= new Database(); /* LA CONEXION A LA BD SIEMPRE SE RENUEVE O ESTE EN LINEA */
        $this->conexion = $db->connectToDatabase();
    }

    function save($params){
        $nombre= $params['nombre']; 
        $apellidos= $params['apellidos'];
        $email = $params['email'];
        $enfermedades = $params['enfermedades'];
        $duracionesdeseccion = $params['duracionesdeseccion'];
        $imagen = $params['imagen'];
        $fecha = $params['fecha'];

        $insert= "INSERT INTO trabajadores VALUES (NULL, '$nombre', '$apellidos', '$email', '$enfermedades', '$duracionesdeseccion', '$imagen', '$fecha')"; 

        return mysqli_query($this->conexion, $insert); 
    }

  function getAll(){
        $basededatos= "SELECT * FROM trabajadores";
        return mysqli_query($this->conexion, $basededatos);
    }
   
    function getOne($id){
        $sql = "SELECT * FROM trabajadores WHERE id = $id";
        return mysqli_query($this->conexion, $sql);
      }
    function update($params){
      $nombre= $params['nombre']; 
      $apellidos= $params['apellidos'];
      $email = $params['email'];
      $enfermedades = $params['enfermedades'];
      $duracionesdeseccion = $params['duracionesdeseccion'];
      $imagen = $params['imagen'];
      $fecha = $params['fecha'];
        $id = $params['id'];
  
        $update = " UPDATE trabajadores SET nombre='$nombre', apellidos='$apellidos', email='$email', enfermedades='$enfermedades', duracionesdeseccion='$duracionesdeseccion', imagen='$imagen', fecha='$fecha' WHERE id = $id";
        return mysqli_query($this->conexion, $update);
      }
  
    function delete($id){
        $eliminar= "DELETE FROM trabajadores WHERE id = $id"; 
        return mysqli_query($this->conexion, $eliminar);
    }
 
}



?>