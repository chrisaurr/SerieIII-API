<?php

require 'flight/Flight.php';

Flight::register('db', 'PDO', array('mysql:host=localhost;dbname=control','root',''));

Flight::route('/', function () {
    echo 'hello world!';
});

//Usuarios
Flight::route('POST /agregar', function () {
    $nombre = (Flight::request()->data->nombre);
    
    $sql="INSERT INTO `usuarios`(`nombre`) VALUES (?)";

    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $nombre);
    $sentencia->execute();

    Flight::jsonp("Usuario agregado");
});

Flight::route('GET /user', function () {
    $sentencia = Flight::db()->prepare("SELECT * FROM `usuarios`");
    $sentencia->execute();
    $datos = $sentencia->fetchAll();

    Flight::json($datos);
});

Flight::route('PUT /user', function () {
    $nombre = (Flight::request()->data->nombre);
    $id = (Flight::request()->data->id);

    
    $sql="UPDATE `usuarios` SET `nombre`=? WHERE id = ?";

    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $nombre);
    $sentencia->bindParam(2, $id);
    $sentencia->execute();

    Flight::jsonp("Usuario modificado");
});

Flight::route('DELETE /user', function () {
    $id = (Flight::request()->data->id);

    $sql="DELETE FROM `usuarios` WHERE id = ?";

    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $id);

    $sentencia->execute();

    Flight::jsonp("Usuario eliminado de favoritos");
});

//Tareas
Flight::route('POST /homework', function () {
    $descripcion = (Flight::request()->data->descripcion);
    $ponderacion = (Flight::request()->data->ponderacion);
    $iduser = (Flight::request()->data->iduser);
    
    $sql="INSERT INTO `tareas`(`descripcion`, `ponderacion`, `idUser`) VALUES (?,?,?)";

    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $descripcion);
    $sentencia->bindParam(2, $ponderacion);
    $sentencia->bindParam(3, $iduser);
    $sentencia->execute();

    Flight::jsonp("tarea agregada");
});

Flight::route('GET /homework/@idUser', function ($idUser) {
    $sentencia = Flight::db()->prepare("SELECT * FROM `tareas` WHERE idUser=?");
    $sentencia->bindParam(1, $idUser);
    $sentencia->execute();
    $datos = $sentencia->fetchAll();

    Flight::json($datos);
});

Flight::route('PUT /homework', function () {
    $descripcion = (Flight::request()->data->descripcion);
    $ponderacion = (Flight::request()->data->ponderacion);
    $id = (Flight::request()->data->id);

    
    $sql="UPDATE `tareas` SET `descripcion`=?, `ponderacion`=? WHERE id = ?";

    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $descripcion);
    $sentencia->bindParam(2, $ponderacion);
    $sentencia->bindParam(3, $id);
    $sentencia->execute();

    Flight::jsonp("tarea modificado");
});

Flight::route('DELETE /homework', function () {
    $id = (Flight::request()->data->id);

    $sql="DELETE FROM `tareas` WHERE id = ?";

    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $id);

    $sentencia->execute();

    Flight::jsonp("Usuario eliminado de favoritos");
});

//Proyectos
Flight::route('POST /project', function () {
    $descripcion = (Flight::request()->data->descripcion);
    $ponderacion = (Flight::request()->data->ponderacion);
    $iduser = (Flight::request()->data->iduser);
    
    $sql="INSERT INTO `proyectos`(`descripcion`, `ponderacion`, `idUser`) VALUES (?,?,?)";

    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $descripcion);
    $sentencia->bindParam(2, $ponderacion);
    $sentencia->bindParam(3, $iduser);
    $sentencia->execute();

    Flight::jsonp("proyecto agregado");
});

Flight::route('GET /project/@idUser', function ($idUser) {
    $sentencia = Flight::db()->prepare("SELECT * FROM `proyectos` WHERE idUser=?");
    $sentencia->bindParam(1, $idUser);
    $sentencia->execute();
    $datos = $sentencia->fetchAll();

    Flight::json($datos);
});

Flight::route('PUT /project', function () {
    $descripcion = (Flight::request()->data->descripcion);
    $ponderacion = (Flight::request()->data->ponderacion);
    $id = (Flight::request()->data->id);

    
    $sql="UPDATE `proyectos` SET `descripcion`=?, `ponderacion`=? WHERE id = ?";

    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $descripcion);
    $sentencia->bindParam(2, $ponderacion);
    $sentencia->bindParam(3, $id);
    $sentencia->execute();

    Flight::jsonp("proyecto modificado");
});

Flight::route('DELETE /project', function () {
    $id = (Flight::request()->data->id);

    $sql="DELETE FROM `proyectos` WHERE id = ?";

    $sentencia = Flight::db()->prepare($sql);
    $sentencia->bindParam(1, $id);

    $sentencia->execute();

    Flight::jsonp("Usuario eliminado de favoritos");
});



Flight::start();
